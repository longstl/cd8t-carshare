<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"><meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('web.layout.Style')
    <style>
        .table > tbody > tr > td {
            padding: 13px!important;
        }
    </style>
    <title>Ride Details | Car Share</title>
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
                    <h4>Ride detail</h4>
                    <table class="table" style="margin-bottom: 0 !important;">
                        <thead>
                        </thead>
                        <tbody>
                        <tr>
                            <td><h5 style="margin: 0!important;">Origin</h5></td>
                            <td>182 Hoa Bằng, Yên Hoà, Cầu Giấy, Hà Nội, Vietnam</td>
                        </tr>
                        <tr>
                            <td><h5 style="margin: 0!important;">Destination</h5></td>
                            <td>458 Minh Khai, Vĩnh Phú, Hai Bà Trưng, Hà Nội, Vietnam</td>
                        </tr>
                        <tr>
                            <td><h5 style="margin: 0!important;">Start time</h5></td>
                            <td>12/12/2021 , 15h30p</td>
                        </tr>
                        <h5>
                            <td><h5 style="margin: 0!important;">Estimated distance</h5></td>
                            <td>3.5 km</td>
                            </tr>
                            <tr>
                                <td><h5 style="margin: 0!important;">Number of available seats</h5></td>
                                <td>7 people</td>
                            </tr>
                            <tr>
                                <td><h5 style="margin: 0!important;">Estimated travel time</h5></td>
                                <td>12 mins</td>
                            </tr>
                            <tr>
                                <td><h5 style="margin: 0!important;">Smoking allowed in the car</h5></td>
                                <td>No</td>
                            </tr>
                            <td><h5 style="margin: 0!important;">Music preferences</h5></td>
                            <td>Yes</td>
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
