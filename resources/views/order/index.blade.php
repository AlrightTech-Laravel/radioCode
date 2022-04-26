<x-dashboard-layout>
    <x-slot name="pageTitle">All Orders</x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.order.index') }}">Orders</a></li>
        <li class="breadcrumb-item active">All</li>
    </x-slot>

    <x-slot name="scripts">
        <script>
            $(document).ready(function () {
                $('#allOrders').DataTable();
            })
        </script>
    </x-slot>

    <div>
        <div class="card">
            <div class="card-body">
                <table id="allOrders" class="table table-striped table-responsive-lg" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr #</th>
                            <th>Order ID</th>
                            <th>Manufacturer</th>
                            <th>User</th>
                            <th>Serial Number</th>
                            <th>Radio Code</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $order->id }}</td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center">
                                        <div class="c-avatar">
                                            <img src="{{ $order->manufacturer->image_url }}" alt="{{ $order->manufacturer->title }}'s Logo" class="c-avatar-img">
                                        </div>
                                        <div class="ml-2">{{ $order->manufacturer->title }}</div>
                                    </div>
                                </td>
                                <td>
                                    {{ $order->name }}
                                    <div class="text-muted">
                                        {{ $order->email }}
                                    </div>
                                </td>
                                <td>{{ $order->serial_number }}</td>
                                <td>{{ $order->radio_code ?? "NA" }}</td>
                                <td>{{ $order->price }}</td>
                                <td>{{ $order->discount ?? 0 }}%</td>
                                <td style="font-size: 1rem;" data-order="{{ $order->status }}">
                                    @php
                                        $class_name = 'badge-info';
                                        switch ($order->status) {
                                            case 1:
                                                $class_name = 'badge-warning text-white';
                                                break;
                                            case 2:
                                                $class_name = 'badge-success text-white';
                                                break;
                                            case 3:
                                                $class_name = 'badge-danger text-white';
                                                break;
                                            case 4:
                                                $class_name = 'badge-secondary';
                                                break;
                                        }
                                    @endphp
                                    <span class="badge {{ $class_name }}">{{ ucfirst($order->status_text) }}</span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Order actions">
                                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#orderDetails_{{$order->id}}">View</button>
                                        @if(!$order->radio_code)
                                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#sendRadioCode_{{$order->id}}">Send Code</button>
                                        @endif
                                        <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteOrder_{{$order->id}}">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="orderDetails_{{$order->id}}" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
                                <div class="modal-dialog modal-dark" role="document">
                                    <div class="modal-content">
                                        <input type="hidden" name="status" value="1">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Order Details</h4>
                                                <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="#">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label for="name">Order Manufacturer </label>
                                                            <input class="form-control" type="text" disabled value="{{ $order->manufacturer->title }}">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="name">User </label>
                                                            <input class="form-control" type="text" disabled value="{{ $order->email }}}">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="name">Serial Number </label>
                                                            <input class="form-control" type="text" disabled value="{{ $order->serial_number }}">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="name">Radio Code </label>
                                                            <input class="form-control" type="text" disabled value="{{ $order->radio_code ?? 'NA' }}">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="name">Price </label>
                                                            <input class="form-control" type="text" disabled value="{{ $order->price }}">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="name">Required Details </label>
                                                            @foreach($order->required_fields as $key => $each)
                                                            <div class="form-group col-md-12">
                                                                <label for="name">{{ ucwords(str_replace('_', ' ', $key)) }} </label>
                                                                <input class="form-control" type="text" disabled value="{{ $each }}">
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="sendRadioCode_{{$order->id}}" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
                                <div class="modal-dialog modal-primary" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.order.send_code', $order) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="1">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Send Radio Code</h4>
                                                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="radio_code">Radio Code</label>
                                                    <input class="form-control @error('radio_code') is-invalid @enderror" id="radio_code" name="radio_code" type="text" placeholder="Enter the radio code" value="{{ old('radio_code') }}">
                                                    @error('radio_code')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                                <button class="btn btn-success" type="submit">Send Code</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteOrder_{{$order->id}}" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
                                <div class="modal-dialog modal-danger" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.order.destroy', $order) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="status" value="1">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Are you sure?</h4>
                                                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete the order with id <strong>{{ $order->id }}</strong>.</p>
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
