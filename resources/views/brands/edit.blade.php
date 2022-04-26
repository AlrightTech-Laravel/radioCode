<x-dashboard-layout>
    <x-slot name="pageTitle">All Manufacturers</x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.manufacturer.index') }}">Manufacturers</a></li>
        <li class="breadcrumb-item active">All</li>
    </x-slot>

    <div>
        <div class="card">
            <form action="{{ route('admin.manufacturer.ManufacturerBrandUpdate', $brand->id) }}"  enctype="multipart/form-data"method="POST">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Update Brand</h4>
                        <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Brand Name</label>
                            <input class="form-control @error('brand') is-invalid @enderror" id="name" name="name" type="text" placeholder="Enter Brand name" value="{{ $brand->name }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="target">Target</label>
                            <select class="form-control" name="target" id="targetsList">
                                @foreach ($targets as $target)
                                    <option value="{{ $target->target }}" @if ($target->target == $brand->target) selected @endif>{{ ucfirst($target->target) }}</option>
                                @endforeach
                            </select>
                            @error('target')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Brand Logo</label>
                            <div class="input-group">
                                <img src="{{ $brand->logo_url }}" width="100">
                            </div>
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
                                        name="logo" accept="image/png,image/jpg,image/jpeg">
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-info" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-dashboard-layout>
