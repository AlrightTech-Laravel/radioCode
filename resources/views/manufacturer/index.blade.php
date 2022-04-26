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
            <div class="card-body">
                <table id="allManufacturers" class="table table-striped table-responsive-lg" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr #</th>
                            <th>Logo</th>
                            <th>Brand</th>
                            <th>Title</th>
                            <th>URI</th>
                            <th>Price</th>
                            <th>Delivery Time</th>
                            <th>Serials</th>
                            <th>Popular</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($manufacturers as $manufacturer)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <div class="c-avatar">
                                        <img src="{{ $manufacturer->image_url }}" alt="{{ $manufacturer->title }}'s Image" class="c-avatar-img">
                                    </div>
                                </td>
                                <td>{{ $manufacturer->brand->name }}</td>
                                <td>{{ $manufacturer->title }}</td>
                                <td>{{ $manufacturer->slug }}</td>
                                <td>{{ $manufacturer->price }}</td>
                                <td>{{ $manufacturer->delivery_time ?? 'NA' }}</td>
                                <td>{{ $manufacturer->serials->count() }}</td>
                                <td>{{ $manufacturer->popular == 1 ? 'Yes' : 'No' }}</td>
                                <td style="font-size: 1rem;" data-order="{{ $manufacturer->status }}">
                                    @php
                                        $class_name = 'badge-info';
                                        switch ($manufacturer->status) {
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
                                    <span class="badge {{ $class_name }}">{{ ucfirst($manufacturer->status_text) }}</span>
                                </td>

                                <td>
                                    <div class="btn-group" role="group" aria-label="Manufacturer actions">
                                        <a class="btn btn-primary" href="#">View</a>
                                        <a class="btn btn-info" href="{{ route('admin.manufacturer.edit', $manufacturer) }}">Edit</a>
                                        <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteManufacturer_{{$manufacturer->id}}">Delete</button>
                                        <a class="btn btn-dark" href="{{ route('admin.manufacturer.ManufacturerSerials', $manufacturer->id)}}">Add Serial</a>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="deleteManufacturer_{{$manufacturer->id}}" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
                                <div class="modal-dialog modal-danger" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.manufacturer.destroy', $manufacturer) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="status" value="1">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Are you sure?</h4>
                                                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete the manufacturer<strong>{{ $manufacturer->title }}</strong>.</p>
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
