<?php

namespace App\Http\Controllers;

use App\Models\InstantCode;
use App\Models\Manufacturer;
use App\Models\ManufacturerCategory;
use App\Models\Order;
use App\Models\RadioSerialNumber;
use App\Models\Serials;
use Illuminate\Http\Request;
use Spatie\Regex\Regex;

class RadioCodeOrderController extends Controller {
    // public function show(Manufacturer $manufacturer) {
    //     $data = [
    //         'manufacturer' => $manufacturer,
    //     ];

    //     return view('radio-code-order.show', $data);
    // }
    public function show(ManufacturerCategory $brand) {
        $data = [
            'manufacturer' => Manufacturer::where('category_id', $brand->id)->with(['brand'])->latest()->get(),
            'brand' => ManufacturerCategory::where('id', $brand->id)->first(),
            'popular' => Manufacturer::where('popular', 1)->get(),
        ];
        return view('website.getRadioCode', $data);
    }
    public function showPopular(Manufacturer $manufacturer) {
        $data = [
            'manufacturer' => Manufacturer::where('id', $manufacturer->id)->with(['brand'])->latest()->get(),
            'brand' => ManufacturerCategory::where('id', $manufacturer->category_id)->first(),
        ];
        return view('website.getRadioCode', $data);
    }
    public function viewManufacturer(Manufacturer $manufacturer) {
        $data = [
            'manufacturer' => $manufacturer,
        ];
        return view('website.viewManufacturer', $data);
    }

    public function getSerialInfo(Request $request) {
        if($request->has('serial')){
            $serial = Serials::where('serial_number', $request->get('serial'))->with('manufacturer')->first();
        }else{
            $serial = Serials::where('serial_number', $request->serial_number)->with('manufacturer')->first();
        }
        if(!$serial){
            return redirect()->back()->withErrorMessage('Serial number not found.');
        }
        $data = [
            'manufacturer' => $serial->manufacturer,
            'serial' => $serial,
        ];
        return view('website.placeOrder', $data);
    }
    public function place_order(Manufacturer $manufacturer) {
        $data = [
            'manufacturer' => $manufacturer,
        ];

        return view('website.placeOrder1', $data);
    }

    public function store_order(Request $request, Manufacturer $manufacturer) {
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'serial_number' => ['nullable', 'string'],
            'device_number' => 'sometimes',
            'part_number' => 'sometimes',
            'model_number' => 'sometimes',
        ]);

        $required_fields = [];
        $serial = Serials::where('serial_number', $request->serial_number)->where('manufacturer_id', $manufacturer->id)->first();
        if (is_iterable($serial)){
        foreach ($serial->required_fields as $item) {
            $required_fields[$item] = $request->{$item};
        }
    }

        $order_data = [
            'manufacturer_id' => $manufacturer->id,
            'email' => $request->email,
            'charge_id' => 'CK_123456789',
            'method' => 'stripe',
            'serial_number' => $request->serial_number,
            'required_fields' => $required_fields,
            'price' => $manufacturer->price,
            'discount' => 0,
            'charged_price' => $manufacturer->price,
            'payment_status' => 2,
            'status' => 1,
        ];

        $instant_code = InstantCode::where('serial_number', $request->serial_number)->first();

        if ($instant_code) {
            $order_data['radio_code'] = $instant_code->radio_code;
        }

        $order = Order::create($order_data);
        if ($order) {
            return redirect()->route('radio-code-order.order-submitted', $order)->withSuccessMessage('Your order has been submitted successfully!');
        }
        abort(505);
    }

    public function order_submitted(Order $order) {
        $data = [
            'order' => $order,
        ];
        return view('website.orderSubmitted', $data);
    }
    public function get_required_fields($id) {
        $data = [
            'manufacturer' => Manufacturer::where('id', $id)->first(),
        ];
        return $data;
    }
    public function getOrderDirect(Request $request) {
        $request->validate([
            // 'email' => ['required', 'email', 'max:255'],
            'serial_number' => ['nullable', 'string'],
            'manufacturer_id' => 'required',
            'device_number' => 'sometimes',
            'part_number' => 'sometimes',
            'model_number' => 'sometimes',
        ]);

        $required_fields = [];
        $serial = Serials::where('serial_number', $request->serial_number)->where('manufacturer_id', $request->manufacturer_id)->first();
        $manufacturer = Manufacturer::where('id', $request->manufacturer_id)->first();
        foreach ($manufacturer->required_fields as $item) {
            $required_fields[$item] = $request->{$item};
        }

        $order_data = [
            'manufacturer_id' => $manufacturer->id,
            'email' => $request->email,
            'charge_id' => 'CK_123456789',
            'method' => 'stripe',
            'serial_number' => $request->serial_number,
            'required_fields' => $required_fields,
            'price' => $manufacturer->price,
            'discount' => 0,
            'charged_price' => $manufacturer->price,
            'payment_status' => 2,
            'status' => 1,
        ];

        $instant_code = InstantCode::where('serial_number', $request->serial_number)->first();

        if ($instant_code) {
            $order_data['radio_code'] = $instant_code->radio_code;
        }

        $order = Order::create($order_data);
        if ($order) {
            return redirect()->route('radio-code-order.order-submitted', $order)->withSuccessMessage('Your order has been submitted successfully!');
        }
        abort(505);
    }
    public function getContactInfo(Request $request) {
        $request->validate([
            'serial_number' => ['nullable', 'string'],
            'manufacturer_id' => 'required',
            'device_number' => 'sometimes',
            'part_number' => 'sometimes',
            'model_number' => 'sometimes',
            'date' => 'sometimes',
            'security_code' => 'sometimes',
            'vin_number' => 'sometimes',
        ]);
        $match = false;
        $is_serial = null;
        $instant_radio_code = null;
        $manufacturer = Manufacturer::where('id', $request->manufacturer_id)->with('serials')->first();
        foreach ($manufacturer->serials as $serial) {
            $match = Regex::match($serial->regex, $request->serial_number)->hasMatch();
            if ($match == true) {
                $is_serial = $serial;
                $instant_radio_code = RadioSerialNumber::where('serial_number', $request->serial_number)
                    ->where('target', $manufacturer->target)
                    ->first();
                break;
            }
        }
        if ($match == false) {
            $data['serials'] = [
                'serials' => $manufacturer->serials,
            ];
            return $data['serials'];
        }
        // $free_code = RadioSerialNumber::where('serial_number', $request->serial_number)->first();
        $data = [
            'serial' => $request->serial_number,
            'is_serial' => $is_serial,
            'manufacturer' => $manufacturer,
            'device_number' => $request->device_number ?? null,
            'part_number' => $request->part_number ?? null,
            'model_number' => $request->model_number ?? null,
            'date' => $request->date ?? null,
            'security_code' => $request->security_code ?? null,
            'vin_number' => $request->vin_number ?? null,
            'instant_radio_code' => $instant_radio_code != null ? $instant_radio_code : null,
        ];
        if ($request->ajax()) {
            return $data;
        }
        return view('website.checkoutPage', $data);
    }
}
