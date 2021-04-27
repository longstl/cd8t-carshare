@extends('admin.layout.master')
<link rel="stylesheet" href="{{url('https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css')}}">
<link rel="stylesheet"
      href="{{url('https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css')}}">
@section('title')
    All rides
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if(session()->get('status'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Success!</strong>
                        {{ session()->get( 'status' ) }}
                    </div>
                @endif
                <div class="card-header card-header-primary">
                    <h3 class="card-title " style="display: inline-block;margin-right: 30px">Rides</h3>
                    <form action="#" style="display: inline-block;margin-right: 30px">
                        <div class="form-group no-border">
                            <input type="text" placeholder="Search by keyword"
                                   style="background: none;border: none;color: #9c9b9b">
                            <button type="submit" class="btn btn-default btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                Driver
                            </th>
                            <th>
                                Start time
                            </th>
                            <th>
                                Origin
                            </th>
                            <th>
                                Destination
                            </th>
                            <th>
                                Seats available
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Action
                            </th>

                            </thead>
                            <tbody>
                            @foreach($rides as $ride)
                                <div class="modal fade" id="ConfirmRide{{ $ride->id }}" tabindex="-1"
                                     role="dialog" aria-labelledby="ConfirmRide"
                                     aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <p>Are you sure you want to confirm driver
                                                    <b> {{$ride->car->user->first_name}} {{$ride->car->user->last_name}} </b>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Cancel
                                                </button>
                                                <a href="{{route('setStatus',$ride->id)}}"
                                                   class="btn btn-success">Confirm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <tr>
                                    <td>
                                        {{$ride->car->user->first_name}} {{$ride->car->user->last_name}}
                                    </td>
                                    <td>
                                        {{date('M d, H:i', strtotime($ride->travel_start_time))}}
                                    </td>
                                    <td>
                                        {{$ride->origin_address}}
                                    </td>
                                    <td>
                                        {{$ride->destination_address}}
                                    </td>
                                    <td>
                                        {{$ride->seats_available}}
                                    </td>
                                    <td>
                                        @if($ride->status == \App\Enums\RideStatus::PENDING)
                                            {{\App\Enums\RideStatus::getDescription($ride->status)}}
                                        @endif
                                        @if($ride->status == \App\Enums\RideStatus::CONFIRMED)
                                            {{\App\Enums\RideStatus::getDescription($ride->status)}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($ride->status == \App\Enums\RideStatus::CONFIRMED)
                                            <a href="{{route('findMatch', $ride->id)}}">
                                                <button class="btn btn-warning">Match</button>
                                            </a>
                                        @endif
                                        @if($ride->status == \App\Enums\RideStatus::PENDING)
                                                <a type="button" class="btn btn-success" data-toggle="modal" data-target="#ConfirmRide{{$ride->id}}">Confirm</a>
                                        @endif
                                        <a href="">
                                            <button class="btn btn-danger">Cancel</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endsection

        @section('extraJs')

            <script>
                $('#fillter_by_status').change(function () {
                    // window.location.href = "http://facebook.com"
                })
            </script>
@endsection

