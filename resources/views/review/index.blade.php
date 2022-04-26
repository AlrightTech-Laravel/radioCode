<x-dashboard-layout>
    <x-slot name="pageTitle">All Reviews</x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.instant-code.index') }}">Reviews</a></li>
        <li class="breadcrumb-item active">All</li>
    </x-slot>

    <x-slot name="scripts">
        <script>
            $(document).ready(function () {
                $('#allReviews').DataTable();
            })
        </script>
    </x-slot>

    <div>
        <div class="card">
            <div class="card-body">
                <table id="allReviews" class="table table-striped table-responsive-lg" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr #</th>
                            <th>Manufacturer</th>
                            <th>Name</th>
                            <th>Rating</th>
                            <th>Headline</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $review)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $review->brand->name ?? 'NA' }}</td>
                                <td>{{ $review->name }}</td>
                                <td>{{ $review->rating }}</td>
                                <td>{{ $review->headline }}</td>
                                <td>{{ Str::substr($review->description, 0, 120) }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Review actions">
                                        <button class="btn btn-info" type="button" data-toggle="modal" data-target="#viewDetail_{{$review->id}}">View</button>
                                        @if($review->status == 0)
                                        <a href="{{route('admin.review.approved', $review->id)}}" class="btn btn-success" type="button">Approved</a>
                                        @endif
                                        <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteReview_{{$review->id}}">Reject</button>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="viewDetail_{{$review->id}}" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
                                <div class="modal-dialog modal-info" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Review Details</h4>
                                                <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="text-muted">{{ $review->brand->name ?? '' }}</div>
                                            <br>
                                            <h4>{{ $review->name }}</h4>
                                            <h6>{{ $review->headline }}</h6>
                                            <br>
                                            <div><p>{!! str_replace("\r\n", '</p><p>', $review->description) !!}</p></div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteReview_{{$review->id}}" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
                                <div class="modal-dialog modal-danger" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.review.destroy', $review) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-header">
                                                <h4 class="modal-title">Are you sure?</h4>
                                                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete the review from user <strong>{{ $review->name }}</strong>.</p>
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
