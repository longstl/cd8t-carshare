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
                    <h4>Ride detail</h4>
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
                        <td><h5 style="margin: 0!important;">Estimated distance</h5></td>
                        <td>{{$data_ride->distance}} </td>
                        </tr>
                        <tr>
                            <td><h5 style="margin: 0!important;">Number of available seats</h5></td>
                            <td>{{$data_ride->seats_available}}</td>
                        </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-primary">Cancel</button>
                </div><!-- .postcontent end -->
            </div>
        </div>
        </section>
@endsection

