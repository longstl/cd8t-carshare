
@extends('admin.layout.master')

@section('title')
    All rides
@endsection

@section('content')

              <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h3 class="card-title " style="display: inline-block;margin-right: 30px">Rides</h3>
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
                                        <tr>
                                            <td>
                                                {{$ride->car->user->first_name}} {{$ride->car->user->last_name}}
                                            </td>
                                            <td>
                                                {{date('H:i', strtotime($ride->travel_start_time))}}
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
                                                {{\App\Enums\RideStatus::getDescription($ride->status)}}
                                            </td>
                                            <td>
                                                <a href="{{route('findMatch', $ride->id)}}"><button class="btn btn-warning">Match</button></a>
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
                @endsection

@section('extraJs')
<script>
    $('#fillter_by_status').change(function (){
        // window.location.href = "http://facebook.com"
    })
</script>
@endsection

