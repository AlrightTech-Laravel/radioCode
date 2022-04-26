<x-dashboard-layout>
    <x-slot name="pageTitle">All Manufacturers</x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.manufacturer.index') }}">Manufacturers</a></li>
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
            <form action="{{ route('admin.manufacturer.ManufacturerBrandsCreate') }}"  enctype="multipart/form-data"method="POST">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Create New Brand</h4>
                        <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Brand Name</label>
                            <input class="form-control @error('brand') is-invalid @enderror" id="name" name="name" type="text" placeholder="Enter Brand name" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Brand Logo</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icofont-photobucket"></i></span>
                                </div>
                                <div class="custom-file">
                                    <input type="file"
                                        class="custom-file-input @error('logo') is-invalid @enderror" id="logo"
                                        name="logo" accept="image/png,image/jpg,image/jpeg" required>
                                    <label class="custom-file-label" for="logo">Select Logo file</label>
                                </div>
                            </div>
                            <div class="text-muted">
                                <small>Acceptable image types are jpeg, jpg and png.</small>
                            </div>
                            <script>
                                const logo = document.getElementById('logo');
                                logo.addEventListener('change', e => {
                                    if (logo.files.length > 0) {
                                        const logoFile = logo.files[0];
                                        const accepted_types = ['image/png', 'image/jpg', 'image/jpeg'];
                                        document.querySelector('input[name="logo"] + label').innerHTML = logoFile.name;

                                        if (!accepted_types.includes(logoFile.type)) {
                                            document.getElementById('logoFileTypeError').style.display = 'block';
                                            document.getElementById('logoFileTypeError').innerHTML = "Only image files are acceptable";
                                            document.getElementById('submitBtn').setAttribute('disabled', true);
                                        } else {
                                            document.getElementById('logoFileTypeError').style.display = 'none';
                                            document.getElementById('logoFileTypeError').innerHTML = "";
                                            document.getElementById('submitBtn').removeAttribute('disabled');
                                        }
                                    }
                                });
                            </script>
                            <div class="text-danger" id="logoFileTypeError">
                                @error('logo')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="target">Target</label>
                            <select class="form-control" name="target" id="targetsList">
                                @foreach ($targets as $target)
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
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
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
                            <th>Name</th>
                            <th>Logo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>
                                    <div class="c-avatar">
                                        <img src="{{ $brand->logo_url }}" alt="{{ $brand->name }}'s Logo" class="c-avatar-img">
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Manufacturer actions">
                                        <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteManufacturer_{{$brand->id}}">Delete</button>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Manufacturer actions">
                                        <button class="btn btn-secondary" type="button"><a href="{{route('admin.manufacturer.ManufacturerBrandEdit', $brand->id)}}">Edit</a></button>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="deleteManufacturer_{{$brand->id}}" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
                                <div class="modal-dialog modal-danger" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.manufacturer.ManufacturerBrandsDelete', $brand) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="status" value="1">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Are you sure?</h4>
                                                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete the brand<strong> {{ $brand->name }}</strong>.</p>
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
