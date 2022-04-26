<x-dashboard-layout>
    <x-slot name="pageTitle">All chooses</x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.choose.index') }}">Chooses</a></li>
        <li class="breadcrumb-item active">All</li>
    </x-slot>

    <x-slot name="scripts">
        <script>
            $(document).ready(function () {
                $('#allchooses').DataTable();
            })
        </script>
    </x-slot>

    <div>
        <div class="card">
            <div class="card-body">
                <table id="allchooses" class="table table-striped table-responsive-lg" style="width:100%">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chooses as $choose)
                            <tr>
                            <td>
              					<a href="{{ asset('Uploads' .'/'.$choose->image) }}" class="entr_prof_pc">
              					<img src="{{ url('Uploads/'.$choose->image) }}" class="img-circle" style="height: 70px; width: 70px;" width="100px">
              					<a class="fa fa-download" href="{{$choose->image ? asset('Uploads' .'/'.$choose->image) : ''}}" download></a>
              				</td>
                                <td>{{ $choose->title }}</td>
                                <td>{{ Str::substr($choose->description, 0, 120) }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="choose actions">
                                        <button class="btn btn-info" type="button" data-toggle="modal" data-target="#viewDetail_{{$choose->id}}">View</button>
                                        <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteInstantCode_{{$choose->id}}">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="viewDetail_{{$choose->id}}" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
                                <div class="modal-dialog modal-info" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">choose Details</h4>
                                                <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="text-muted">{{ $choose->type_text }}</div>
                                            <h4>{{ $choose->title }}</h4>
                                            <div><p>{!! str_replace("\r\n", '</p><p>', $choose->description) !!}</p></div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteInstantCode_{{$choose->id}}" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
                                <div class="modal-dialog modal-danger" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.choose.destroy', $choose) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-header">
                                                <h4 class="modal-title">Are you sure?</h4>
                                                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete the choose with question <strong>{{ $choose->title }}</strong>.</p>
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
