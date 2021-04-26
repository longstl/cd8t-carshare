@extends('web.layout.master')
@section('title')
        Request Detail | Car Share
@endsection
@section('content')
        <div class="container_content">
            <div class="content">
                <h1 class="text-dark">Request detail</h1><br>
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
                            <td>Estimated travel time</td>
                            <td>12 mins</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Amount of people</td>
                            <td>7 people</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="btn_container">

                        <button class="btn btn-primary">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
@endsection

