@extends('web.layout.master')
@section('title')
    User Profile
@endsection
@section('content')
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="row clearfix">

                    <div class="col-md-9">

                        <div class="row clearfix">

                            <div class="col-lg-12">

                                <div class="tabs tabs-alt clearfix" id="tabs-profile">

                                    <ul class="tab-nav clearfix">
                                        <li><a href="#tab-feeds"><i class="icon-rss2"></i> Profile</a></li>
                                        <li><a href="#tab-posts"><i class="icon-pencil2"></i> history Passenger</a></li>
                                        <li><a href="#tab-replies"><i class="icon-reply"></i>history Driver</a></li>
                                        <li><a href="#tab-connections"><i class="icon-users"></i> Your Car</a></li>
                                    </ul>

                                    <div class="tab-container">

                                        <div class="tab-content clearfix" id="tab-feeds">
                                            <div class="row topmargin-sm clearfix">

                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Email</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            thuandz01012002@gmail.com
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Last Name</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            thuan

                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">First Name</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            nguyen
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Phone</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            0929427881
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Driving license number</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            A1211313131
                                                        </div>
                                                    </div>
                                                    <hr>


                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Address</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            HA NOI HOAN KIEM
                                                        </div>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content clearfix" id="tab-posts">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Time:</th>
                                                    <th>Origin</th>
                                                    <th>Destination</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <code>5/23/2016</code>
                                                    </td>
                                                    <td>TP Ho Chi Minh</td>
                                                    <td>Ha Noi</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <code>5/23/2016</code>
                                                    </td>
                                                    <td>Logged in to the Account at 16:33:01</td>
                                                    <td>Logged in to the Account at 16:33:01</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <code>5/22/2016</code>
                                                    </td>
                                                    <td>Logged in to the Account at 09:41:58</td>
                                                    <td>Logged in to the Account at 09:41:58</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <code>5/21/2016</code>
                                                    </td>
                                                    <td>Logged in to the Account at 17:16:32</td>
                                                    <td>Logged in to the Account at 17:16:32</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <code>5/18/2016</code>
                                                    </td>
                                                    <td>Logged in to the Account at 22:53:41</td>
                                                    <td>Logged in to the Account at 22:53:41</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-content clearfix" id="tab-replies">

                                            <div class="clear topmargin-sm"></div>

                                        </div>
                                        <div class="tab-content clearfix" id="tab-connections">

                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th>NAME:</th>
                                                    <th>Make</th>
                                                    <th>Make Year</th>
                                                    <th>Color</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        BMW 320I
                                                    </td>
                                                    <td>: red</td>
                                                    <td>: sedan</td>
                                                    <td>: 2014</td>
                                                    <td>
                                                        <a href="" type="button" class="btn btn-success">update</a>
                                                        <a href="" type="button" class="btn btn-danger">delete</a>
                                                    </td>


                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="col-md-3 clearfix">

                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action clearfix">Update Profile <i class="icon-user float-right"></i></a>
                            <a href="{{route('updateLicense')}}" class="list-group-item list-group-item-action clearfix">Update Driving License<i class="icon-user float-right"></i></a>
                            <a href="#" class="list-group-item list-group-item-action clearfix">Get Ride <i class="icon-laptop2 float-right"></i></a>
                            <a href="#" class="list-group-item list-group-item-action clearfix">Logout <i class="icon-line2-logout float-right"></i></a>
                        </div>

                        <div class="fancy-title topmargin title-border">
                            <h4>About Me</h4>
                        </div>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum laboriosam, dignissimos veniam obcaecati. Quasi eaque, odio assumenda porro explicabo laborum!</p>

                        <div class="fancy-title topmargin title-border">
                            <h4>Social Profiles</h4>
                        </div>

                        <a href="#" class="social-icon si-facebook si-small si-rounded si-light" title="Facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>

                        <a href="#" class="social-icon si-gplus si-small si-rounded si-light" title="Google+">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>

                        <a href="#" class="social-icon si-dribbble si-small si-rounded si-light" title="Dribbble">
                            <i class="icon-dribbble"></i>
                            <i class="icon-dribbble"></i>
                        </a>

                        <a href="#" class="social-icon si-flickr si-small si-rounded si-light" title="Flickr">
                            <i class="icon-flickr"></i>
                            <i class="icon-flickr"></i>
                        </a>

                        <a href="#" class="social-icon si-linkedin si-small si-rounded si-light" title="LinkedIn">
                            <i class="icon-linkedin"></i>
                            <i class="icon-linkedin"></i>
                        </a>

                        <a href="#" class="social-icon si-twitter si-small si-rounded si-light" title="Twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection

