<x-website-layout>
    <x-slot name="pageTitle">Radio Code | {{ $manufacturer->title }} | {{ config('app.name') }}</x-slot>
    <section class="hero">
        <div class="container">
            <form action="{{ route('radio-code-order.place-order', $manufacturer) }}"  class="manufacturer-serial-num-form">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <div class="title">
                                <h2>{{ $manufacturer->title }} Radio Code Unlock</h2>
                            </div>
                            <label for="serial_number">Enter Serial Number</label>
                            <div class="input-field">
                                <input type="text" class="form-control"
                                    placeholder="Enter serial or vehicle manufacturer e.g. M123456" id="serial_number"
                                    name="serial_number" required>
                                @error('serail_number')
                                    <div class="text-danger text-xsmall">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="button-section mt-4">
                                <a href="{{ route('radio-code-order.place-order', $manufacturer) }}"
                                    class="btn btn-outline-primary">Upload Image</a>
                                <button type="submit" class="btn btn-primary">Get My Radio Code</button>
                            </div>
                            <p class="mt-3 text-lg">You Can Upload Image of backside of car radio. Our Team will Send you the radio code for
                                respetive serial number.</p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <main class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>How to Find Our Audi Serial Number</h3>
                    <div class="manufacturer-description">
                        <p>{{ str_replace('\r\n', "</p><p>", $manufacturer->description) }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ $manufacturer->image_url }}" alt="Radio Code Image" class="img-fluid w-100">
                </div>
            </div>
        </div>
    </main>
</x-website-layout>
