<x-dashboard-layout>
    <x-slot name="pageTitle">Create Manufacturers</x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.manufacturer.index') }}">Manufacturers</a></li>
        <li class="breadcrumb-item active">Create</li>
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
            <form action="{{ route('admin.manufacturer.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card-header"><strong>Create Manufacturer</strong></div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="title">Select Brand</label>
                             <select name="brand_id" class="form-control" id="brand_id" required>
                                <option disabled selected>Select Brand</option>
                                @foreach ($brands as $each)
                                <option value="{{$each->id}}">{{$each->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="title">Title</label>
                            <input class="form-control @error('title') is-invalid @enderror" id="title" name="title" type="text" placeholder="Enter manufacturer name" value="{{ old('title') }}">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="uri">URI</label>
                            <input class="form-control @error('uri') is-invalid @enderror" id="uri" name="uri" type="text" placeholder="Enter name with no space e.g. free-radio" value="{{ old('uri') }}">
                            @error('uri')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="price">Price</label>
                            <input class="form-control @error('price') is-invalid @enderror" id="price" name="price" type="number" min="0.01" step="0.01" placeholder="Enter the radio code price for this manufacturer" value="{{ old('price') }}">
                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{--<div class="form-group col-md-6">
                            <label for="delivery_time">Delivery Time</label>
                            <input class="form-control @error('delivery_time') is-invalid @enderror" id="delivery_time" name="delivery_time" type="text" placeholder="Enter estimated delivery time of radio code" value="{{ old('delivery_time') }}">
                            @error('delivery_time')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>--}}
                    </div>
                    <div class="row">
                        {{--<div class="form-group col-md-6">
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
                        </div>--}}
                        <div class="form-group col-md-12">
                            <label for="name">Image</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icofont-photobucket"></i></span>
                                </div>
                                <div class="custom-file">
                                    <input type="file"
                                        class="custom-file-input @error('image') is-invalid @enderror" id="image"
                                        name="image" accept="image/png,image/jpg,image/jpeg" required>
                                    <label class="custom-file-label" for="image">Select Image file</label>
                                </div>
                            </div>
                            <div class="text-muted">
                                <small>Acceptable image types are jpeg, jpg and png.</small>
                            </div>
                            <script>
                                const image = document.getElementById('image');
                                image.addEventListener('change', e => {
                                    if (image.files.length > 0) {
                                        const imageFile = image.files[0];
                                        const accepted_types = ['image/png', 'image/jpg', 'image/jpeg'];
                                        document.querySelector('input[name="image"] + label').innerHTML = imageFile.name;

                                        if (!accepted_types.includes(imageFile.type)) {
                                            document.getElementById('imageFileTypeError').style.display = 'block';
                                            document.getElementById('imageFileTypeError').innerHTML = "Only image files are acceptable";
                                            document.getElementById('submitBtn').setAttribute('disabled', true);
                                        } else {
                                            document.getElementById('imageFileTypeError').style.display = 'none';
                                            document.getElementById('imageFileTypeError').innerHTML = "";
                                            document.getElementById('submitBtn').removeAttribute('disabled');
                                        }
                                    }
                                });
                            </script>
                            <div class="text-danger" id="imageFileTypeError">
                                @error('image')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="required_fields">Required Fields</label>
                            <select name="required_fields[]" id="requiredFields" multiple>
                                @foreach (\App\Models\Manufacturer::$requiredFields as $key => $value)
                                    <option value="{{ $key }}" @if(in_array($key,old('required_fields') ?? [])) selected @endif>{{ $value }}</option>
                                @endforeach
                            </select>
                            @error('required_fields')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <div class="form-group col-md-3">
                            <label for="delivery_time">Delivery Time</label>
                            <input class="form-control @error('delivery_time') is-invalid @enderror" id="delivery_time" name="delivery_time" type="text" placeholder="Enter estimated delivery time of radio code" value="{{ old('delivery_time') }}">
                            @error('delivery_time')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="delivery_time">Hours</label>
                            <input class="form-control @error('hours') is-invalid @enderror" id="hours" name="hours" type="text" placeholder="Enter estimated hours of radio code Example: 1-24" value="{{ old('hours') }}">
                            @error('hours')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="delivery_time">Sample Serials</label>
                            <input class="form-control @error('sample_serials') is-invalid @enderror" id="sample_serials" name="sample_serials" type="text" placeholder="Enter Sample Serials" value="{{ old('sample_serials') }}">
                            @error('sample_serials')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="is_free" class="custom-control-input" id="customCheck0">
                                <label class="custom-control-label" for="customCheck0">Free Radio Available</label>
                            </div>
                        </div>
                        <div class="form-group col-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="popular" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Make Popular</label>
                            </div>
                        </div>
                        <div class="form-group col-1">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="linked" class="custom-control-input" id="customCheck2">
                                <label class="custom-control-label" for="customCheck2">Make a Linked</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="10" class="form-control" placeholder="Enter the description for the manufacturer page">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="how_it_works">How it Works</label>
                            <textarea name="how_it_works" id="how_it_works" rows="10" class="form-control" placeholder="Enter 'How to Enter Codes'">{{ old('how_it_works') }}</textarea>
                            @error('how_it_works')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
                <div class="card-footer">
                    <button class="btn btn-sm btn-primary" type="submit" id="submitBtn">Create</button>
                </div>
            </form>
        </div>
    </div>
    <script>
            CKEDITOR.replace( 'description' );
            CKEDITOR.replace( 'how_it_works' );
    </script>
</x-dashboard-layout>
