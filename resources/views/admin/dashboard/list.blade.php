@extends('admin.layout.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 50%; height: 10%">
            <i class="fa fa-calendar"></i>&nbsp;
            <span></span> <i class="fa fa-caret-down"></i>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h4 class="card-title">Daily Rides Stats</h4>
                    <p id="dateHeader" class="card-category">{{date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "- 1 week" ) )}} - {{date('Y-m-d')}}</p>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                        <th>Date</th>
                        <th>Total rides</th>
                        </thead>
                        <tbody id="ride_body">
                        @foreach($ride_stats as $date)
                            <tr>
                                <td>{{$date->date}}</td>
                                <td>{{$date->count}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <div id="paginationDashboard"></div>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('botExtraJs')
    <script>
        if ($('#dailySalesChart').length !== 0) {
            /* ----------==========     Daily Sales Chart initialization    ==========---------- */

            dataDailySalesChart = {
                labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
                series: [
                    [12, 17, 7, 17, 23, 18, 38]
                ]
            };

            optionsDailySalesChart = {
                lineSmooth: Chartist.Interpolation.cardinal({
                    tension: 0
                }),
                low: 0,
                high: 50, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
                chartPadding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                },
            }

            var dailySalesChart = new Chartist.Line('#dailySalesChart', dataDailySalesChart, optionsDailySalesChart);

            md.startAnimationForLineChart(dailySalesChart);
        }
    </script>
@endsection
