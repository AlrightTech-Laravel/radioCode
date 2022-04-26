<x-dashboard-layout>
    <x-slot name="pageTitle">All Faqs</x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.faq.index') }}">Faqs</a></li>
        <li class="breadcrumb-item active">All</li>
    </x-slot>

    <x-slot name="scripts">
        <script>
            $(document).ready(function () {
                $('#allFaqs').DataTable();
            })
        </script>
    </x-slot>

    <div>
        <div class="card">
            <div class="card-body">
                <table id="allFaqs" class="table table-striped table-responsive-lg" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr #</th>
                            <th>Type</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($faqs as $faq)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $faq->type_text }}</td>
                                <td>{{ $faq->title }}</td>
                                <td>{{ Str::substr($faq->description, 0, 120) }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Faq actions">
                                        <button class="btn btn-info" type="button" data-toggle="modal" data-target="#viewDetail_{{$faq->id}}">View</button>
                                        <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteInstantCode_{{$faq->id}}">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="viewDetail_{{$faq->id}}" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
                                <div class="modal-dialog modal-info" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">FAQ Details</h4>
                                                <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="text-muted">{{ $faq->type_text }}</div>
                                            <h4>{{ $faq->title }}</h4>
                                            <div><p>{!! str_replace("\r\n", '</p><p>', $faq->description) !!}</p></div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteInstantCode_{{$faq->id}}" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
                                <div class="modal-dialog modal-danger" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.faq.destroy', $faq) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-header">
                                                <h4 class="modal-title">Are you sure?</h4>
                                                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete the faq with question <strong>{{ $faq->title }}</strong>.</p>
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
