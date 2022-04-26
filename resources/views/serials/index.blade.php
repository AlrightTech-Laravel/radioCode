<x-dashboard-layout>
    <x-slot name="pageTitle">All Manufacturers</x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.manufacturer.index') }}">Manufacturers</a></li>
        <li class="breadcrumb-item active">Serials</li>
    </x-slot>

    <x-slot name="scripts">
        <script>
            $(document).ready(function () {
                $('#allManufacturers').DataTable();
            })
        </script>
    </x-slot>
     <x-slot name="scripts">
        <script>
            $(document).ready(function(){
                new SlimSelect({
                    select: '#requiredFields',
                    placeholder: "Please select the required fields for radio code order of this manufacturer.",
                });
            });
        </script>
    </x-slot>

    <div>
        <div class="card">
            <form action="{{ route('admin.manufacturer.ManufacturerSerialCreate') }}"  enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Create New Serial</h4>
                        <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="name">Regex</label>
                            <input class="form-control @error('regex') is-invalid @enderror" id="regex" name="regex" type="text" placeholder="Enter Regex" value="{{ old('regex') }}">
                            <input name="manufacturer_id" value="{{$manufacturer_id}}" type="hidden">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name">Regex Partials</label>
                            <input class="form-control @error('regex_partial') is-invalid @enderror" id="regex_partial" name="regex_partial" type="text" placeholder="Enter Regex Partial" value="{{ old('regex_partial') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name">Serial Number</label>
                            <input class="form-control @error('serial_number') is-invalid @enderror" id="serial_number" name="serial_number" type="text" placeholder="Enter Serial Number" value="{{ old('serial_number') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name">Time</label>
                            <input class="form-control @error('time') is-invalid @enderror" id="time" name="time" type="text" placeholder="Enter Time" value="{{ old('time') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name">Timing Message</label>
                            <input class="form-control @error('timing_msg') is-invalid @enderror" id="timing_msg" name="timing_msg" type="text" placeholder="Enter Timing Message" value="{{ old('timing_msg') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name">Price</label>
                            <input class="form-control @error('price') is-invalid @enderror" id="price" name="price" type="text" placeholder="Enter Price" value="{{ old('price') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info" type="submit">Create</button>
                </div>
            </form>
        </div>
        <div class="card">
            <div class="card-body">
                <table id="allManufacturers" class="table table-striped table-responsive-lg" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr #</th>
                            <th>Regex</th>
                            <th>Regex Partail</th>
                            <th>Serial Number</th>
                            <th>Timing</th>
                            <th>Timing Message</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($serials as $serial)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $serial->regex }}</td>
                                <td>{{ $serial->regex_partial }}</td>
                                <td>{{ $serial->serial_number }}</td>
                                <td>{{ $serial->time }}</td>
                                <td>{{ $serial->timing_msg }}</td>
                                <td>{{ $serial->price }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Manufacturer actions">
                                        <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteManufacturer_{{$manufacturer_id}}">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="deleteManufacturer_{{$manufacturer_id}}" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
                                <div class="modal-dialog modal-danger" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.manufacturer.ManufacturerSerialDelete', $serial->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="status" value="1">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Are you sure?</h4>
                                                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete the brand<strong> {{ $serial->serial_number }}</strong>.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                                <button class="btn btn-danger" type="submit">Confirm Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-dashboard-layout>
