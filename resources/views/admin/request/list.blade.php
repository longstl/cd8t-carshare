@extends('admin.layout.master')

@section('title')
    List Request
@endsection

@section('content')
             <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h3 class="card-title " style="margin-right: 30px;display: inline-block">Options</h3>
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
                                            <h3>Order by</h3>
                                        </th>
                                        <th>
                                            <h3>Pick Up Address</h3>
                                        </th>
                                        <th>
                                            <h3>Destination Address</h3>
                                        </th>
                                        <th>
                                            <h3>Time</h3>
                                        </th>
                                        <th>
                                            <h3>Seats Occupy</h3>
                                        </th>



                                        <th>
                                            <h3>Price</h3>
                                        </th>
                                        <th>
                                            <h3>Status</h3>
                                        </th>
                                        <th>
                                            <h3>Action</h3>
                                        </th>

                                        </thead>
                                        @foreach($list_request as $request)
                                        <tbody>
                                        <tr>
                                            <td>
                                                <h4>{{$request->user->first_name}} {{$request->user->last_name}}</h4>
                                            </td>
                                            <td>
                                                <h4>{{$request->pickup_address}}</h4>
                                            </td>
                                            <td>
                                                <h4>{{$request->destination_address}}</h4>
                                            </td>
                                            <td>
                                                <h4>{{date('H:i', strtotime($request->desired_pickup_time))}}
                                                   </h4>
                                            </td>

                                            <td>
                                                <h4>{{$request->seats_occupy}}</h4>
                                            </td>
                                            <td>

                                                <h4>{{$request->price}}
                                                    </h4>
                                            </td>
                                            <td>
                                                <h4>{{\App\Enums\RideRequestStatus::getDescription($request->status)}}</h4>
                                            </td>
                                            <td>
                                                <a href=""><button class="btn btn-success">Edit</button></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>      
@endsection
