@extends('admin.layout.master')

@section('title')
    Ride List
@endsection

@section('content')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h3 class="card-title " style="display: inline-block;margin-right: 30px">Orders</h3>
                                    <form action="#" style="display: inline-block;margin-right: 30px">
                                        <div class="form-group no-border">
                                            <input type="text" placeholder="Search by keyword" style="background: none;border: none;color: #9c9b9b">
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
                                                <h3>Driver</h3>
                                            </th>
                                            <th>
                                                <h3>Start time</h3>
                                            </th>
                                            <th>
                                                <h3>Origin</h3>
                                            </th>
                                            <th>
                                                <h3>Destination</h3>
                                            </th>
                                            <th>
                                                <h3>Seats available</h3>
                                            </th>
                                            <th>
                                                <h3>Status</h3>
                                            </th>
                                            <th>
                                                <h3>Action</h3>
                                            </th>

                                            </thead>
                                            <tbody>
                                            @foreach($ride as $ri)
                                                <tr>
                                                    <td>
                                                        <h4> {{$ri->car->user->first_name}} {{$ri->car->user->last_name}}</h4>
                                                    </td>
                                                    <td>
                                                        <h4>{{date('H:i', strtotime($ri->travel_start_time))}}</h4>
                                                    </td>
                                                    <td>
                                                        <h4>{{$ri->origin_address}}</h4>
                                                    </td>
                                                    <td>
                                                        <h4>{{$ri->destination_address}}</h4>
                                                    </td>
                                                    <td>
                                                        <h4>{{$ri->seats_available}}</h4>
                                                    </td>
                                                    <td>
                                                        <h4>{{\App\Enums\RideStatus::getDescription($ri->status)}}</h4>
                                                    </td>
                                                    <td>
                                                        <a href=""><button class="btn btn-warning">Match</button></a>
                                                        <a href=""><button class="btn btn-danger">Cancel</button></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endsection

@section('extraJs')
<script>
    $('#fillter_by_status').change(function (){
        // window.location.href = "http://facebook.com"
    })
</script>
@endsection

