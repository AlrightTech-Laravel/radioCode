<x-website-layout>
    <x-slot name="pageTitle">Order Details | {{ $order->manufacturer->title }} | {{ config('app.name') }}</x-slot>
    <div class="no-hero">
        <div class="container">
            <div class="code-available">
                <div class="card">
                    <div class="card-header d-flex justify-content-center align-items-center">
                        <h2>Congratulations</h2>
                    </div>
                    <div class="card-body">
                        <div class="serial">
                            <p>Your order has been submitted!</p>
                        </div>
                        @if($order->radio_code)
                            <div>
                                <p>Your instant radio code is ready.</p>
                                <input type="text" class="form-control mx-auto" value="{{ $order->radio_code }}" readonly>
                            </div>
                        @else
                            <div>
                                <p>Your order has been submitted and will be reviews buy our staff. After your radio code has been decoded, you will recieve an email on you provided email address containing your radio code.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-website-layout>
