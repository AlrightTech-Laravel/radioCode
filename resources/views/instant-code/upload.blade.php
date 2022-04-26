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
        <form action="{{ route('admin.instant-code.UploadStoreNewRadioSerial')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-header"><strong>Upload Radio Serial</strong></div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="radio_code">Target</label>
                        <input class="form-control @error('target') is-invalid @enderror" id="target" name="target" type="text" placeholder="Enter the new Target" value="{{ old('target') }}">
                        @error('target')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Excel Sheet</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="icofont-photobucket"></i></span>
                            </div>
                            <div class="custom-file">
                                <input type="file"
                                    class="custom-file-input @error('excel') is-invalid @enderror" id="logo"
                                    name="excel" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                                <label class="custom-file-label" for="logo">Select excel file</label>
                            </div>
                        </div>
                        <div class="text-muted">
                            <small>Acceptable Excel sheets types are xls, csv</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit" id="submitBtn">Create</button>
            </div>
        </form>
    </div>
</x-dashboard-layout>
