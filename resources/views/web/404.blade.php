@extends('web.layout.master')
@section('title')
    403
@endsection
@section('content')
    <section id="slider" class="slider-element slider-parallax full-screen dark error404-wrap" style="background:url('{{lib_assets('images/landing/static.jpg')}}') center;">
        <div class="slider-parallax-inner">

            <div class="container-fluid vertical-middle center clearfix">

                <div class="error404">403</div>

                <div class="heading-block nobottomborder">
                    <h4>Ooopps.! The Page you were looking for, couldn't be found.</h4>
                </div>
            </div>

        </div>
    </section>
@endsection
