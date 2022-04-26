<x-dashboard-layout>
    <x-slot name="pageTitle">All Instant Codes</x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.instant-code.index') }}">Instant Codes</a></li>
        <li class="breadcrumb-item active">All</li>
    </x-slot>

    <x-slot name="scripts">
        <script>
            $(document).ready(function () {
                $('#allManufacturers').DataTable();
            })
        </script>
    </x-slot>

    <div>
    <div class="card">
            <form action="{{ route('admin.instant-code.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add Radio Serial</h4>
                        <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Serial Number</label>
                            <input class="form-control @error('brand') is-invalid @enderror" id="serial" name="serial" type="text" placeholder="Enter Serial Number" value="{{ old('serial') }}">
                            @error('serial')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Radio Code</label>
                            <input class="form-control @error('brand') is-invalid @enderror" id="radio_code" name="radio_code" type="text" placeholder="Enter Radio Code" value="{{ old('radio_code') }}">
                            @error('radio_code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="target">Target</label>
                            <select class="form-control" name="target" id="targetsList">
                                @foreach ($manufacturers as $target)
                                    <option value="{{ $target->target }}">{{ ucfirst($target->target) }}</option>
                                @endforeach
                            </select>
                            @error('target')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info" type="submit">Add</button>
                    <a href="{{route('admin.instant-code.CreateNewRadioSerial')}}" class="btn btn-light">Create Radio Serial</a>
                    <a href="{{route('admin.instant-code.UploadNewRadioSerial')}}" class="btn btn-stack-overflow">Upload Excel</a>
                </div>
            </form>
        </div>
        <div class="card">
            <div class="card-body">
                <table id="allManufacturers" class="table table-striped table-responsive-lg" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr #</th>
                            <th>Target</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($manufacturers as $manufacturer)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $manufacturer->target }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Manufacturer actions">
                                        <a class="btn btn-info" href="{{ route('admin.instant-code.show', $manufacturer->target) }}">View Codes</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-dashboard-layout>
