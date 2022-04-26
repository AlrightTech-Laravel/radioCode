<x-dashboard-layout>
    <x-slot name="pageTitle">Create Radio Code</x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.instant-code.index') }}">Instant Code</a></li>
        <li class="breadcrumb-item active">Create</li>
    </x-slot>

    <x-slot name="scripts">
        <script>
            $(document).ready(function(){
                new SlimSelect({
                    select: '#manufacturerList',
                    placeholder: "Please select the manufacturer of this radio code.",
                });
            });
        </script>
    </x-slot>

    <div class="card">
        <form action="{{ route('admin.instant-code.StoreNewRadioSerial')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-header"><strong>Create Radio Serial</strong></div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="serial_number">Serial Number</label>
                        <input class="form-control @error('serial_number') is-invalid @enderror" id="serial_number" name="serial_number" type="text" placeholder="Enter serial number to match against" value="{{ old('serial_number') }}">
                        @error('serial_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="radio_code">Radio Code</label>
                        <input class="form-control @error('radio_code') is-invalid @enderror" id="radio_code" name="radio_code" type="text" placeholder="Enter the radio code for the serial number" value="{{ old('radio_code') }}">
                        @error('radio_code')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="radio_code">Target</label>
                        <input class="form-control @error('target') is-invalid @enderror" id="target" name="target" type="text" placeholder="Enter the new Target" value="{{ old('target') }}">
                        @error('target')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit" id="submitBtn">Create</button>
            </div>
        </form>
    </div>
</x-dashboard-layout>
