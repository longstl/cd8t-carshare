<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .table > tbody > tr > td {
            padding: 13px!important;
        }
    </style>
@include('web.layout.Style')
    <title>Request Detail | Car Share</title>
</head>
<body>
@include('web.layout.header')
<div id="wrapper" class="clearfix">
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <!-- Post Content
                ============================================= -->
                <div class="postcontent nobottommargin clearfix" style="margin: auto!important; float: none;">
                    <h4>Request detail</h4>
                    <table class="table" style="margin-bottom: 0 !important;">
                        <tbody>
                        <tr>
                            <td><h5 style="margin: 0!important;">Origin</h5></td>
                            <td>{{ $data_request->pickup_address}}</td>
                        </tr>
                        <tr>
                            <td><h5 style="margin: 0!important;">Destination</h5></td>
                            <td>{{ $data_request->destination_address}}</td>
                        </tr>
                        <tr>
                            <td><h5 style="margin: 0!important;">Start time</h5></td>
                            <td>{{ $data_request->desired_pickup_time}}</td>
                        </tr>
                        <tr>
                            <td><h5 style="margin: 0!important;">Estimated distance</h5></td>
                            <td>null</td>
                        </tr>
                        <tr>
                            <td><h5 style="margin: 0!important;">Estimated travel time</h5></td>
                            <td>{{ $data_request->pickup_time}}</td>
                        </tr>
                        <tr>
                            <td><h5 style="margin: 0!important;">Amount of people</h5></td>
                            <td>{{ $data_request->seats_occupy}}</td>
                        </tr>
                        <tr>
                            <td><h5 style="margin: 0!important;">Price</h5></td>
                            <td>{{ $data_request->price }}</td>
                        </tr>
                        </tbody>

                    </table>
                    <div class="line" style="margin: 0 0 20px 0;"></div>
                    <button class="btn btn-primary">Cancel</button>
                </div><!-- .postcontent end -->
            </div>
        </div>
    </section>
    @include('web.layout.footer')
</div>
@include('web.layout.script')

</body>
</html>
