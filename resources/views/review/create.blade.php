<x-dashboard-layout>
    <x-slot name="pageTitle">Create Review</x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.review.index') }}">Review</a></li>
        <li class="breadcrumb-item active">Create</li>
    </x-slot>

    <x-slot name="scripts">
        <script>
            $(document).ready(function(){
                new SlimSelect({
                    select: '#manufacturerList',
                    placeholder: "Please select the manufacturer to attach the review with.",
                });
            });
        </script>
    </x-slot>

    <div>
        <div class="card" style="max-width: 1024px; margin: 0 auto;">
            <form action="{{ route('admin.review.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card-header"><strong>Create Review</strong></div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="manufacturer">Manufacturer</label>
                            <select name="manufacturer" id="manufacturerList">
                                @foreach ($manufacturers as $manufacturer)
                                    <option value="{{ $manufacturer->id }}" @if($manufacturer->id == old('manufacturer')) selected @endif>{{ ucfirst($manufacturer->title) }}</option>
                                @endforeach
                            </select>
                            @error('manufacturer')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="Enter the user name for the review" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="description">Review Description</label>
                            <textarea name="description" id="description" rows="10" class="form-control @error('description') is-invalid @enderror" placeholder="Enter the description for the Review">{{ old('description') }}</textarea>
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
