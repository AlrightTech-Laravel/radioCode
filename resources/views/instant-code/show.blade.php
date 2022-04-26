<x-dashboard-layout>
    <x-slot name="pageTitle">All {{ ucfirst($manufacturer[0]->target) }} Instant Codes</x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.instant-code.index') }}">Instant Codes</a></li>
        <li class="breadcrumb-item active">{{ ucfirst($manufacturer[0]->target) }} Instant Codes</li>
    </x-slot>

<style>
    .relative svg{
        display:none
    }
    nav div{
        margin-top: 0.5rem !important
    }
</style>

    <div>
        <div class="card">
            <div class="card-body">
                <table id="allInstantCodes" class="table table-striped table-responsive-lg mt-5" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr #</th>
                            <th>Target</th>
                            <th>Serial Number</th>
                            <th>Radio Code</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($manufacturer as $instant_code)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $instant_code->target }}</td>
                                <td>{{ $instant_code->serial_number }}</td>
                                <td>{{ $instant_code->radio_code }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Instant Code actions">
                                        <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteInstantCode_{{$instant_code->id}}">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="deleteInstantCode_{{$instant_code->id}}" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
                                <div class="modal-dialog modal-danger" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.instant-code.destroy', $manufacturer[0]->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-header">
                                                <h4 class="modal-title">Are you sure?</h4>
                                                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete the radio code with serial number <strong>{{ $instant_code->serial_number }}</strong> for manufacturer <strong>{{ $manufacturer[0]->target }}</strong>.</p>
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
                        {{$manufacturer->links()}}
                </table>
            </div>
        </div>
    </div>
</x-dashboard-layout>
