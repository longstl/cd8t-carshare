@extends('web.layout.master')

@section('title')
    Ride Details
@endsection
@section('content')
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <!-- Post Content
                ============================================= -->
                <div class="postcontent nobottommargin clearfix" style="margin: auto!important; float: none;">
                    @if(session('created'))
                        <h2>Your ride has been created!</h2>
                        <h3>We will notify you when your ride is booked</h3>
                    @elseif(session('canceled'))
                        <h2>Your ride has been canceled.</h2>
                    @else
                        <h2>Ride detail</h2>
                    @endif
                    <table class="table" style="margin-bottom: 0 !important;">
                        <thead>
                        </thead>
                        <tbody>
                        <tr>
                            <td><h5 style="margin: 0!important;">Origin</h5></td>
                            <td>{{$data_ride->origin_address}}</td>
                        </tr>
                        <tr>
                            <td><h5 style="margin: 0!important;">Destination</h5></td>
                            <td>{{$data_ride->destination_address}}</td>
                        </tr>
                        <tr>
                            <td><h5 style="margin: 0!important;">Start time</h5></td>
                            <td>{{$data_ride->travel_start_time}}</td>
                        </tr>
                        <tr>
                            <td><h5 style="margin: 0!important;">Estimated distance</h5></td>
                            <td>{{convertMetersToText($data_ride->distance)}} </td>
                        </tr>
                        <tr>
                            <td><h5 style="margin: 0!important;">Seats available</h5></td>
                            <td>{{$data_ride->seats_available}}</td>
                        </tr>
                        <tr>
                            <td><h5 style="margin: 0!important;">Amount to collect from riders</h5></td>
                            <td>${{$data_ride->price_total}}</td>
                        </tr>
                        <tr>
                            <td><h5 style="margin: 0!important;">Status</h5></td>
                            <td>{{\App\Enums\RideStatus::getDescription($data_ride->status)}}</td>
                        </tr>
                        </tbody>
                    </table>
                        @if($data_ride->status != \App\Enums\RideStatus::CANCELED && $data_ride->status != \App\Enums\RideStatus::COMPLETED)
                            <a href="{{route('cancelRide', $data_ride->id)}}">
                                <button class="btn btn-danger" style="margin-top:20px;">Cancel Ride</button>
                            </a>
                        @endif
                </div>
            </div>
        </div>
    </section>
@endsection

