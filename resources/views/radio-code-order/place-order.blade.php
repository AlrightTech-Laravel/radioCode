<x-website-layout>
    <x-slot name="pageTitle">Place Order | {{ $manufacturer->title }} | {{ config('app.name') }}</x-slot>
    <div class="no-hero">
        <div class="container">
            <form class="code-available" action="{{ route('radio-code-order.store-order', $manufacturer) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header d-flex justify-content-center align-items-center">
                        <div class="tick">
                            <i class="icofont-check-circled"></i>
                        </div>
                        <h2>Radio Code Avalible</h2>
                    </div>
                    <div class="card-body">
                        <div class="serial">
                            @if(request()->input('serial_number'))
                                <p><span>Serial No: </span>{{ request()->input('serial_number') }}</p>
                                <input type="hidden" name="serial_number" value="{{ request()->input('serial_number') }}">
                            @endif
                            <p><span>Price: </span>${{ $manufacturer->price }}</p>
                            <p><span>Delivery Time: </span>{{ $manufacturer->delivery_time }}</p>
                        </div>
                        <div class="form-group">
                            <label for="name">Enter Your Name:</label>
                            <input type="name" name="name" id="name" class="form-control" placeholder="John Doe" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Enter Your Email Addres:</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="john@gmail.com" required>
                            <small id="emailHelpBlock" class="form-text text-muted">
                                Enter the email on which you will recieve your decoded code.
                            </small>
                        </div>

                        @if ($manufacturer->required_fields)
                            @foreach ($manufacturer->required_fields as $field)
                            @php
                                $label = \App\Models\Manufacturer::$requiredFields[$field];
                            @endphp
                                <div class="form-group">
                                    <label for="{{ $field }}">Enter {{ $label }}:</label>
                                    <input type="text" name="{{ $field }}" id="{{ $field }}" class="form-control" placeholder="Enter here" required>
                                </div>
                            @endforeach
                        @endif

                        @if(!request()->input('serial_number'))
                        <div class="form-group">
                            <label for="image">Reference Image</label>
                            <input type="file" name="reference_image" id="reference_image" accept="image/png,image/jpeg,image/jpg" required>
                        </div>
                        @endif

                        <button type="submit" class="btn btn-primary px-3">Place Order</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-website-layout>
