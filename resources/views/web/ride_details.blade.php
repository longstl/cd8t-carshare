<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"><meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('web.layout.Style')
    <title>Ride Details | Car Share</title>
</head>
<body>
@include('web.layout.header')
<div >
    <div class="container_content">
        <div class="content">
            <h1 class="text-dark">Rider detail</h1><br>
            <div class="col-12 col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Names of fields</th>
                        <th scope="col">Values</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Origin</td>
                        <td>182 Hoa Bằng, Yên Hoà, Cầu Giấy, Hà Nội, Vietnam</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Destination</td>
                        <td>458 Minh Khai, Vĩnh Phú, Hai Bà Trưng, Hà Nội, Vietnam</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Start time</td>
                        <td>12/12/2021 , 15h30p</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Estimated distance</td>
                        <td>3.5 km</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Number of available seats</td>
                        <td>3 seats</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Estimated travel time</td>
                        <td>12 mins</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Model rider</td>
                        <td>mẫu xe gì đó</td>
                    </tr>
                    </tbody>
                </table>
                <div class="btn_container">
                    <button class="btn btn-primary">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    @include('web.layout.footer')
</div>

@include('web.layout.script')
</body>
</html>
