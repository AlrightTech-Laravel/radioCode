<x-dashboard-layout>
    <x-slot name="pageTitle">Create FAQ</x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.faq.index') }}">FAQ</a></li>
        <li class="breadcrumb-item active">Create</li>
    </x-slot>

    <x-slot name="scripts">
        <script>
            $(document).ready(function(){
                new SlimSelect({
                    select: '#type',
                    placeholder: "Please select the type of this FAQ.",
                });
            });
        </script>
    </x-slot>

    <div>
        <div class="card" style="max-width: 1024px; margin: 0 auto;">
            <form action="{{ route('admin.faq.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card-header"><strong>Create FAQ</strong></div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="title">Title</label>
                            <input class="form-control @error('title') is-invalid @enderror" id="title" name="title" type="text" placeholder="Enter serial number to match against" value="{{ old('title') }}">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="type">Type</label>
                            <select name="type" id="type">
                                @foreach (\App\Models\Faq::$types as $key => $value)
                                    <option value="{{ $key }}" @if($key == old('type')) selected @endif>{{ ucfirst($value) }}</option>
                                @endforeach
                            </select>
                            @error('type')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="10" class="form-control @error('description') is-invalid @enderror" placeholder="Enter the description for the FAQ">{{ old('description') }}</textarea>
                            @error('description')
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
    </div>
</x-dashboard-layout>
