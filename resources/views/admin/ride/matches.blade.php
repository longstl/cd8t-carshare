@extends('admin.layout.master')

@section('title')
    Matches for Ride {{$ride->id}}
@endsection

@section('content')
             <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h3 class="card-title " style="margin-right: 30px;display: inline-block">Found {{sizeof($requests)}} matches</h3>
                                <form action="#" style="display: inline-block">
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
                                            User
                                        </th>
                                        <th>
                                            Pickup address
                                        </th>
                                        <th>
                                            Destination address
                                        </th>
                                        <th>
                                            Pickup time
                                        </th>
                                        <th>
                                            Seats occupy
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                        </thead>
                                        @foreach($requests as $request)
                                        <tbody>
                                        <tr>
                                            <td>
                                                {{$request->user->first_name}} {{$request->user->last_name}}
                                            </td>
                                            <td>
                                                {{$request->pickup_address}}<br>
                                                ({{$request->origin_difference}}m from last pickup point)
                                            </td>
                                            <td>
                                                {{$request->destination_address}}<br>
                                                ({{$request->destination_difference}}m from ride's destination)
                                            </td>
                                            <td>
                                                Desired: {{date('H:i', strtotime($request->desired_pickup_time))}}<br>
                                                Estimated: <strong>{{date('H:i', strtotime($request->pickup_time))}}</strong> ({{$request->pickup_time_difference_text}} difference)
                                            </td>
                                            <td>
                                                {{$request->seats_occupy}}
                                            </td>
                                            <td>
                                                <a href="{{route('setMatch', [$ride->id, $request->id, $request->duration])}}"><button class="btn btn-success">Match</button></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
@endsection
