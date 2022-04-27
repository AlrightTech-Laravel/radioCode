<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Choose;
use App\Models\Manufacturer;
use App\Models\ManufacturerCategory;
use App\Models\Order;
use App\Models\Serials;
use App\Models\RadioSerialNumber;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;

class WebsiteController extends Controller {
    public function home() {
        $reviews = Review::where('status', 1)->with('brand')->get();
        return view('website.index', compact('reviews'));
        // return view('home');
    }

    public function fordRadioCodes() {
        $brands = ManufacturerCategory::all();
        $chooses = Choose::all();
        $faqs = Faq::all();
        $serials = Serials::all();
        return view('website.online-ford-radio-codes', compact('brands', 'chooses', 'faqs', 'serials'));
    }

    public function brandsList() {
        $brands = ManufacturerCategory::all();
        return view('website.online-car-radio-codes', compact('brands'));
    }
    public function manufacturers() {
        $data = [
            'manufacturers' => Manufacturer::orderBy('title')->get(),
        ];

        return view('manufacturer-list', $data);
    }

    public function contact() {
        return view('website.contactUs');
    }

    public function post_contact(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'email', 'min:10', 'max:255'],
            'subject' => ['required', 'string', 'min:2', 'max:255'],
            'message' => ['required', 'string', 'min:10', 'max:1000'],
        ]);
        try {
            \Mail::send('emails/contact',
                array(
                    'name' => $request->name,
                    'email' => $request->email,
                    'subject' => $request->subject,
                    'description' => json_encode($request->message),
                    'logo_url' => env('APP_URL') . '/img/logo-w.png',
                ), function ($message) use ($request) {
                    $message->from($request->email, 'Radio Code');
                    $message->to(env('MAIL_USERNAME'))->subject
                        ($request->subject);
                });
            return redirect()->back()->withErrorMessage('Message Sent Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrorMessage('Couldn\'t send your message. Please try again.');
        }
    }
    public function faqs() {
        $faqs = Faq::all();
        return view("website.faq's", compact('faqs'));
    }
    public function create_order(Request $request) {
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'serial_number' => ['nullable', 'string'],
            'device_number' => 'sometimes',
            'part_number' => 'sometimes',
            'model_number' => 'sometimes',
            'instant_radio_code' => 'sometimes',
            'amount' => 'sometimes',
        ]);
        $required_fields = [];
        $instant_radio_code = null;
        $manufacturer = Manufacturer::where('id', $request->manufacturer_id)->first();
        if ($manufacturer->required_fields != null) {
            foreach ($manufacturer->required_fields as $item) {
                $required_fields[$item] = $request->{$item};
            }
        }
        if ($request->instant_radio_code) {
            $instant_radio_code = RadioSerialNumber::where('serial_number', $request->instant_radio_code)
                ->where('target', $manufacturer->target)
                ->first();
        }
        $order_data = [
            'manufacturer_id' => $manufacturer->id,
            'email' => $request->email,
            'method' => 'stripe',
            'serial_number' => $request->serial,
            'price' => $request->amount,
            'required_fields' => $required_fields != [] ? $required_fields : null,
            'discount' => 0,
            'charged_price' => $request->amount,
            'payment_status' => 1,
            'status' => 1,
            'radio_code' => $instant_radio_code != null ? $instant_radio_code->serial_number : null,
        ];

        $order = Order::create($order_data);
        if ($order) {
            if ($manufacturer->is_free_radio == 0) {
                $order = Order::where('id', $order->id)->first();
                Stripe::setApiKey('sk_test_W1n3Kb4Y4qQYqX9snc4TJBnL');

                // $description = $slug->target . '-' . $checkout->serial_number . '-' . $checkout->token;
                $description = $order->email . '-' . $order->serial;
                $finalprice = $order->price * 100;

                $session = \Stripe\Checkout\Session::create([
                    'customer_email' => $order->email,
                    'payment_method_types' => ['card'],
                    'line_items' => [[
                        'name' => 'getmyradiocodes.co.uk',
                        'description' => $description,
                        'images' => ['https://onlineradiocode.com/res/img/stripe_img.png'],
                        'amount' => intval($finalprice),
                        'currency' => 'GBP',
                        'quantity' => 1,
                    ]],
                    'success_url' => url('stripe/payment/success?item_id=' . base64_encode($order->id)) . '&token=' . $order->serial,
                    'cancel_url' => url('stripe/payment/cancel'),
                ]);
                $data['session_id'] = $session['id'];
                return view('website.stripe_charge', $data);
            } else {
                return view('website.checkoutAfterOrder', compact('order'));
            }
        }

    }

    public function create_checkout_session(Request $request) {
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'order' => ['required'],
        ]);

        $order = Order::where('id', $request->order)->first();
        Stripe::setApiKey('sk_test_W1n3Kb4Y4qQYqX9snc4TJBnL');

        // $description = $slug->target . '-' . $checkout->serial_number . '-' . $checkout->token;
        $description = $order->email . '-' . $order->serial;
        $finalprice = $order->price * 100;

        $session = \Stripe\Checkout\Session::create([
            'customer_email' => $request->email,
            'payment_method_types' => ['card'],
            'line_items' => [[
                'name' => 'getmyradiocodes.co.uk',
                'description' => $description,
                'images' => ['https://onlineradiocode.com/res/img/stripe_img.png'],
                'amount' => intval($finalprice),
                'currency' => 'GBP',
                'quantity' => 1,
            ]],
            'success_url' => url('stripe/payment/success?item_id=' . base64_encode($order->id)) . '&token=' . $request->serial,
            'cancel_url' => url('stripe/payment/cancel'),
        ]);
        $data['session_id'] = $session['id'];
        return view('website.stripe_charge', $data);

    }
    public function stripe_success(Request $request) {
        if (!empty($request->item_id)) {
            $item_id = base64_decode($request->item_id);
            $order = Order::find($item_id);

            if (!empty($order)) {
                $order->payment_status = 2;
                $order->status = 2;
                $order->update();
                return redirect()->route('radio-code-order.order-submitted', $order)->withSuccessMessage('Your order has been submitted successfully!');
            } else {
                return redirect(url(''));
            }
        } else {
            return redirect(url(''));
        }
    }
    public function stripe_cancel() {
        dd('cancel');
    }
    public function submitReview(Request $request) {
        $review = new Review();
        $review->rating = $request->rating;
        $review->name = $request->name;
        $review->headline = $request->headline;
        $review->description = $request->message;
        $review->radio_code = $request->manufacturer;
        $review->save();
        return "Review Added!";
    }

}
