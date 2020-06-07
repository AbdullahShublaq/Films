@extends('layouts.dashboard.app')

@section('content')

    @push('styles')
        <link rel="stylesheet" href="{{asset('dashboard_files/assets/plugins/sweetalert/sweetalert.css')}}"/>
        <link href="{{asset('dashboard_files/assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"
              rel="stylesheet"/>
    @endpush

    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>All Reviews
                        <small class="text-muted">Welcome to Films</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Films</a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Reviews</a></li>
                        <li class="breadcrumb-item active">All Reviews</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card patients-list">
                        <div class="header">
                            <h2><strong>Reviews </strong><span>({{$reviews->total()}})</span></h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('dashboard.reviews.index') }}" method="GET">
                                <div class="row clearfix">
                                    <div class="col-4">
                                        <select name="client" class="form-control z-index show-tick"
                                                data-live-search="true">
                                            <option value="" selected>-All Clients-</option>
                                            @foreach($clients as $client)
                                                <option value="{{$client->id}}" {{request()->client == $client->id ? 'selected' : ''}}>{{$client->username}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select name="film" class="form-control z-index show-tick"
                                                data-live-search="true">
                                            <option value="" selected>-All Films-</option>
                                            @foreach($films as $film)
                                                <option value="{{$film->id}}" {{request()->film == $film->id ? 'selected' : ''}}>{{$film->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button style="margin-top: 10px" type="submit" class="btn btn-primary">Search</button>
                            </form>

                            <div class="tab-content m-t-10">
                                <div class="tab-pane table-responsive active">
                                    <table class="table m-b-0 table-hover">
                                        <thead>
                                        <tr>
                                            <th>Client</th>
                                            <th>Film</th>
                                            <th>Review</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($reviews as $review)
                                            <tr>
                                                <td>
                                                    <a href="{{route('dashboard.clients.index', ['search' => $review->user->username])}}">{{$review->user->username}}</a>
                                                </td>
                                                <td>
                                                    <a href="{{route('dashboard.films.index', ['search' => $review->film->name])}}">{{$review->film->name}}</a>
                                                </td>
                                                <td>
                                                    <button title="show review"
                                                            value="{{$review->review}}"
                                                            class="btn btn-icon btn-neutral btn-icon-mini show_review">
                                                        <i class="zmdi zmdi-reader"></i>
                                                    </button>
                                                </td>
                                                <td>
                                                    @if(auth()->guard('admin')->user()->hasPermission('delete_reviews'))
                                                        <form action="{{ route('dashboard.reviews.destroy', $review) }}"
                                                              method="POST" style="display: inline-block">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit"
                                                                    class="btn btn-icon btn-neutral btn-icon-mini remove_review"
                                                                    title="Delete" value="{{$review->id}}">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <button class="btn btn-icon btn-neutral btn-icon-mini disabled"
                                                                style="cursor: no-drop"
                                                                title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="text-center">
                                                <td colspan="5">There Is No Data...</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{$reviews->appends(request()->query())->links()}}
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="{{asset('dashboard_files/assets/plugins/sweetalert/sweetalert.min.js')}}"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $(".remove_review").click(function (e) {
                    var that = $(this);
                    e.preventDefault();

                    var id = $(this).val();
                    swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this review!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false
                    }, function () {
                        that.closest('form').submit();
                    });
                });

                $(".show_review").click(function () {
                    var review = $(this).val();
                    swal({
                        title: "<spna style='color: #8CD4F5'>Review</span>",
                        text: "<textarea rows='15' class='form-control no-resize' style='background-color: white!important; cursor: auto!important;' readonly>" + review + "</textarea>",
                        html: true
                    });
                });
            });
        </script>
    @endpush

@endsection