

@extends('web.layout.master')
@section('title')
        Request Detail | Car Share
@endsection
@section('content')
     <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <!-- Post Content
                ============================================= -->
                <div class="postcontent nobottommargin clearfix" style="margin: auto!important; float: none;">
                    @if(session('created'))
                        <h2>Your request has been created!</h2>
                        <h3>We will notify you when a match is found</h3>
                    @elseif(session('canceled'))
                        <h2>Your request has been canceled</h2>
                    @else
                        <h2>Request detail</h2>
                    @endif
                    <table class="table" style="margin-bottom: 0 !important;">
                        <tbody>
                        <tr>
                            <td><h5 style="margin: 0!important;">Pickup address</h5></td>
                            <td>{{ $data_request->pickup_address}}</td>
                        </tr>
                        <tr>
                            <td><h5 style="margin: 0!important;">Destination</h5></td>
                            <td>{{ $data_request->destination_address}}</td>
                        </tr>
                        <tr>
                            <td><h5 style="margin: 0!important;">Seats occupy</h5></td>
                            <td>{{ $data_request->seats_occupy}}</td>
                        </tr>
                        @if($data_request->status == \App\Enums\RequestStatus::MATCHED || $data_request->status == \App\Enums\RequestStatus::BOOKED)
                            <tr>
                                <td><h5 style="margin: 0!important;">Pickup time</h5></td>
                                <td>${{ $data_request->pickup_time }}</td>
                            </tr>
                            <tr>
                                <td><h5 style="margin: 0!important;">Price</h5></td>
                                <td>${{ $data_request->price }}</td>
                            </tr>
                        @else
                            <tr>
                                <td><h5 style="margin: 0!important;">Desired pickup time</h5></td>
                                <td>{{ $data_request->desired_pickup_time}}</td>
                            </tr>
                        @endif
                        <tr>
                            <td><h5 style="margin: 0!important;">Status</h5></td>
                            <td>{{ \App\Enums\RequestStatus::getDescription($data_request->status) }}</td>
                        </tr>
                        </tbody>
                    </table>
                        @if($data_request->status != \App\Enums\RequestStatus::CANCELED && $data_request->status != \App\Enums\RequestStatus::COMPLETED)
                            <a href="{{route('cancelRequest', $data_request->id)}}">
                                <button class="btn btn-danger" style="margin-top:20px;">Cancel Request</button>
                            </a>
                        @endif
                </div><!-- .postcontent end -->
            </div>
        </div>
    </section>
@endsection

