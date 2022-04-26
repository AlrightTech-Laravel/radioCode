<x-dashboard-layout>
    <x-slot name="pageTitle">All Users</x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Users</a></li>
        <li class="breadcrumb-item active">All</li>
    </x-slot>

    <x-slot name="scripts">
        <script>
            $(document).ready(function () {
                $('#allUsers').DataTable();
            })
        </script>
    </x-slot>

    <div>
        <div class="card">
            <div class="card-body">
                <table id="allUsers" class="table table-striped table-responsive-lg" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr #</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Last Login</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    {{ $user->phone ?? 'NA' }}
                                </td>
                                <td style="font-size: 1rem;" data-order="{{ $user->status }}">
                                    @php
                                        $class_name = 'badge-info';
                                        switch ($user->status) {
                                            case 0:
                                                $class_name = 'badge-warning text-white';
                                                break;
                                            case 1:
                                                $class_name = 'badge-success text-white';
                                                break;
                                            case 2:
                                                $class_name = 'badge-danger text-white';
                                                break;
                                            case 3:
                                                $class_name = 'badge-secondary';
                                                break;
                                        }
                                    @endphp
                                    <span class="badge {{ $class_name }}">{{ ucfirst($user->status_text) }}</span>
                                </td>
                                @if ($user->last_login_time)
                                    <td data-order="{{ $user->last_login_time->getTimestamp() }}">
                                        {{ $user->last_login_time->format('d M Y h:i A') }}
                                    </td>
                                @else
                                    <td data-order="{{ now()->addDay()->getTimestamp() }}">
                                        NA
                                    </td>
                                @endif
                                {{-- <td>
                                    <div class="btn-group" role="group" aria-label="User actions">
                                        <a class="btn btn-info" href="#">Profile</a>
                                        @if($user->status == 1)
                                            <button class="btn btn-danger" type="button"  data-toggle="modal" data-target="#blockUser_{{$user->id}}">Block</button>
                                        @endif
                                        @if($user->status == 2)
                                            <button class="btn btn-success" type="button"  data-toggle="modal" data-target="#activateUser_{{$user->id}}">Activate</button>
                                        @endif
                                        @if($user->status == 3)
                                            <button class="btn btn-warning" type="button"  data-toggle="modal" data-target="#unBlockUser_{{$user->id}}">Un-block</button>
                                        @endif
                                    </div>
                                    @if($user->status == 0)
                                    <div>
                                        <div class="mt-2 btn-group" role="group" aria-label="Approve or reject user">
                                            <button class="btn btn-success" type="button"  data-toggle="modal" data-target="#activateUser_{{$user->id}}">Approve</button>
                                            <button class="btn btn-danger" type="button"  data-toggle="modal" data-target="#rejectUser_{{$user->id}}">Reject</button>
                                        </div>
                                    </div>
                                    @endif
                                </td> --}}
                            </tr>
                            {{-- <div class="modal fade" id="blockUser_{{$user->id}}" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
                                <div class="modal-dialog modal-danger" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('user.update-status', $user) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="3">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Confirm Block User?</h4>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to block the with name <strong>{{ $user->name}}</strong>.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                                <button class="btn btn-danger" type="submit">Block</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="unBlockUser_{{$user->id}}" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
                                <div class="modal-dialog modal-danger" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('user.update-status', $user) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="1">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Confirm Un-block User?</h4>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to un-block the user with name <strong>{{ $user->name}}</strong>.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                                <button class="btn btn-danger" type="submit">Un-block</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="rejectUser_{{$user->id}}" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
                                <div class="modal-dialog modal-danger" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('user.update-status', $user) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="3">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Confirm reject user?</h4>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to reject the user with name <strong>{{ $user->name}}</strong>.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                                <button class="btn btn-danger" type="submit">Reject</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="activateUser_{{$user->id}}" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
                                <div class="modal-dialog modal-danger" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('user.update-status', $user) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="1">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Are you sure?</h4>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to approve the profile for the user with name <strong>{{ $user->name}}</strong>.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                                @if($user->status == 0)
                                                    <button class="btn btn-danger" type="submit">Approve</button>
                                                @endif
                                                @if($user->status == 2)
                                                    <button class="btn btn-danger" type="submit">Activate</button>
                                                @endif
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-dashboard-layout>
