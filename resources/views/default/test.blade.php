@extends('default.tiles.master')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/morris/morris.css')}}" />
@stop


@section('contenu')
    <section role="main" class="content-body">
                    <header class="page-header">
                        <h2>Dashboard</h2>
                    </header>

                    <!-- start: page -->
                    <div class="row">
                    <!-- ****************************************************************** -->
                        <div class="col-md-6 col-lg-12 col-xl-6" style="display:none;">
                            <section class="panel">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="chart-data-selector" id="salesSelectorWrapper">
                                                <h2>
                                                    Sales:
                                                    <strong>
                                                        <select class="form-control" id="salesSelector">
                                                            <option value="Porto Admin" selected>Porto Admin</option>
                                                            <option value="Porto Drupal" >Porto Drupal</option>
                                                            <option value="Porto Wordpress" >Porto Wordpress</option>
                                                        </select>
                                                    </strong>
                                                </h2>

                                                <div id="salesSelectorItems" class="chart-data-selector-items mt-sm">
                                                    <!-- Flot: Sales Porto Admin -->
                                                    <div class="chart chart-sm" data-sales-rel="Porto Admin" id="flotDashSales1" class="chart-active"></div>
                                                    <script>

                                                        var flotDashSales1Data = [{
                                                            data: [
                                                                ["Jan", 10],
                                                                ["Feb", 0],
                                                                ["Mar", 0],
                                                                ["Apr", 0],
                                                                ["May", 0],
                                                                ["Jun", 0],
                                                                ["Jul", 0],
                                                                ["Aug", 0]
                                                            ],
                                                            color: "#0088cc"
                                                        }];

                                                        // See: assets/javascripts/dashboard/examples.dashboard.js for more settings.

                                                    </script>

                                                    <!-- Flot: Sales Porto Drupal -->
                                                    <div class="chart chart-sm" data-sales-rel="Porto Drupal" id="flotDashSales2" class="chart-hidden"></div>
                                                    <script>

                                                        var flotDashSales2Data = [{
                                                            data: [
                                                                ["Jan", 0],
                                                                ["Feb", 0],
                                                                ["Mar", 30],
                                                                ["Apr", 0],
                                                                ["May", 0],
                                                                ["Jun", 0],
                                                                ["Jul", 0],
                                                                ["Aug", 0]
                                                            ],
                                                            color: "#2baab1"
                                                        }];

                                                        // See: assets/javascripts/dashboard/examples.dashboard.js for more settings.

                                                    </script>

                                                    <!-- Flot: Sales Porto Wordpress -->
                                                    <div class="chart chart-sm" data-sales-rel="Porto Wordpress" id="flotDashSales3" class="chart-hidden"></div>
                                                    <script>

                                                        var flotDashSales3Data = [{
                                                            data: [
                                                                ["Jan", 0],
                                                                ["Feb", 0],
                                                                ["Mar", 0],
                                                                ["Apr", 0],
                                                                ["May", 50],
                                                                ["Jun", 0],
                                                                ["Jul", 0],
                                                                ["Aug", 0]
                                                            ],
                                                            color: "#734ba9"
                                                        }];

                                                        // See: assets/javascripts/dashboard/examples.dashboard.js for more settings.

                                                    </script>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-4 text-center">
                                            <h2 class="panel-title mt-md">Sales Goal</h2>
                                            <div class="liquid-meter-wrapper liquid-meter-sm mt-lg">
                                                <div class="liquid-meter">
                                                    <meter min="0" max="100" value="35" id="meterSales"></meter>
                                                </div>
                                                <div class="liquid-meter-selector" id="meterSalesSel">
                                                    <a href="#" data-val="35" class="active">Monthly Goal</a>
                                                    <a href="#" data-val="28">Annual Goal</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <!-- ****************************************************************** -->
                        <div class="col-md-6 col-lg-12 col-xl-6">
                            <div class="row">
                                <div class="col-md-12 col-lg-6 col-xl-6">
                                    <section class="panel panel-featured-left panel-featured-primary">
                                        <div class="panel-body">
                                            <div class="widget-summary">
                                                <div class="widget-summary-col widget-summary-col-icon">
                                                    <div class="summary-icon bg-primary">
                                                        <i class="fa fa-usd"></i>
                                                    </div>
                                                </div>
                                                <div class="widget-summary-col">
                                                    <div class="summary">
                                                        <h4 class="title">Solde totale</h4>
                                                        <div class="info">
                                                            <strong class="amount">{{ Auth::user()->solde_totale }} MAD</strong>
                                                            
                                                        
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-md-12 col-lg-6 col-xl-6">
                                    <section class="panel panel-featured-left panel-featured-secondary">
                                        <div class="panel-body">
                                            <div class="widget-summary">
                                                <div class="widget-summary-col widget-summary-col-icon">
                                                    <div class="summary-icon bg-secondary">
                                                        <i class="fa fa-usd"></i>
                                                    </div>
                                                </div>
                                                <div class="widget-summary-col">
                                                    <div class="summary">
                                                        <h4 class="title">Solde bancaire</h4>
                                                        <div class="info">
                                                            <strong class="amount">{{ Auth::user()->soldebancaire }} MAD</strong>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-md-12 col-lg-6 col-xl-6">
                                    <section class="panel panel-featured-left panel-featured-tertiary">
                                        <div class="panel-body">
                                            <div class="widget-summary">
                                                <div class="widget-summary-col widget-summary-col-icon">
                                                    <div class="summary-icon bg-tertiary">
                                                        <i class="fa fa-usd"></i>
                                                    </div>
                                                </div>
                                                <div class="widget-summary-col">
                                                    <div class="summary">
                                                        <h4 class="title">Solde poche</h4>
                                                        <div class="info">
                                                            <strong class="amount">{{ Auth::user()->solde_poche }} MAD</strong>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-md-12 col-lg-6 col-xl-6">
                                    <section class="panel panel-featured-left panel-featured-quartenary">
                                        <div class="panel-body">
                                            <div class="widget-summary">
                                                <div class="widget-summary-col widget-summary-col-icon">
                                                    <div class="summary-icon bg-quartenary">
                                                        <i class="fa fa-usd"></i>
                                                    </div>
                                                </div>
                                                <div class="widget-summary-col">
                                                    <div class="summary">
                                                        <h4 class="title">Solde eparnge</h4>
                                                        <div class="info">
                                                            <strong class="amount">{{ Auth::user()->compteepargne->solde_epargne }} MAD</strong>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <section class="panel">
                                <header class="panel-heading">
                                    <div class="panel-actions">
                                        <a href="#" class="fa fa-caret-down"></a>
                                        <a href="#" class="fa fa-times"></a>
                                    </div>

                                    <h2 class="panel-title">Statistiques des soldes</h2>
                                    <p class="panel-subtitle"></p>
                                </header>
                                <div class="panel-body">

                                    <!-- Flot: Basic -->
                                    <div class="chart chart-md" id="flotDashBasic"></div>
                                    <script>

                                        var flotDashBasicData = [{
                                            data: [
                                                [0, 8000],
                                                [1, 7500],
                                                [2, 7500],
                                                [3, 0],
                                                [4, 0],
                                                [5, 0],
                                                [6, 0],
                                                [7, 0],
                                                [8, 0],
                                                [9, 0],
                                                [10, 0]
                                            ],
                                            label: "Solde bancaire",
                                            color: "#0088cc"
                                        }, {
                                            data: [
                                                [0, 80],
                                                [1, 0],
                                                [2, 200],
                                                [3, 0],
                                                [4, 0],
                                                [5, 0],
                                                [6, 0],
                                                [7, 0],
                                                [8, 0],
                                                [9, 0],
                                                [10,0]
                                            ],
                                            label: "Solde poche",
                                            color: "#2baab1"
                                        }, {
                                            data: [
                                                [0, 500],
                                                [1, 500],
                                                [2, 600],
                                                [3, 0],
                                                [4, 0],
                                                [5, 0],
                                                [6, 0],
                                                [7, 0],
                                                [8, 0],
                                                [9, 0],
                                                [10,0]
                                            ],
                                            label: "Solde eparnge",
                                            color: "#734ba9"
                                        }];

                                        // See: assets/javascripts/dashboard/examples.dashboard.js for more settings.

                                    </script>

                                </div>
                            </section>
                        </div>
                        <div class="col-md-6">
                            <section class="panel">
                                <header class="panel-heading">
                                    <div class="panel-actions">
                                        <a href="#" class="fa fa-caret-down"></a>
                                        <a href="#" class="fa fa-times"></a>
                                    </div>
                                    <h2 class="panel-title">Statistiques des Revenus</h2>
                                    <p class="panel-subtitle"></p>
                                </header>
                                <div class="panel-body">

                                    <!-- Flot: Curves -->
                                    <div class="chart chart-md" id="flotDashRealTime"></div>

                                </div>
                            </section>
                        </div>
                    </div>
                    <!-- end: page -->
    </section>
                        </div>
                    </div>
                    <!-- end: page -->
                </section>
@stop

@section('js')       
    <script src="{{ asset('assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-appear/jquery.appear.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-easypiechart/jquery.easypiechart.js') }}"></script>
    <script src="{{ asset('assets/vendor/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/vendor/flot-tooltip/jquery.flot.tooltip.js') }}"></script>
    <script src="{{ asset('assets/vendor/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('assets/vendor/flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('assets/vendor/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-sparkline/jquery.sparkline.js') }}"></script>
    <script src="{{ asset('assets/vendor/raphael/raphael.js') }}"></script>
    <script src="{{ asset('assets/vendor/morris/morris.js') }}"></script>
    <script src="{{ asset('assets/vendor/gauge/gauge.js') }}"></script>
    <script src="{{ asset('assets/vendor/snap-svg/snap.svg.js') }}"></script>
    <script src="{{ asset('assets/vendor/liquid-meter/liquid.meter.js') }}"></script>
    <script src="{{asset('assets/javascripts/dashboard/examples.dashboard.js')}}"></script> 

    <script type="text/javascript">
/*
    Flot: Real-Time
    */
    (function() {
        var data = [],
            totalPoints = 3000;

        function getRandomData() {

            if (data.length > 0)
                data = data.slice(1);

            // Do a random walk
            while (data.length < totalPoints) {

                var prev = data.length > 0 ? data[data.length - 1] : 01,
                    y = prev + Math.random() * 10 - 5;

                if (y < 0) {
                    y = 0;
                } else if (y > 100) {
                    y = 100;
                }

                data.push(y);
            }

            // Zip the generated y values with the x values
            var res = [];
            for (var i = 0; i < data.length; ++i) {
                res.push([i, data[i]])
            }

            return res;
        }

        var flotDashRealTime = $.plot('#flotDashRealTime', [getRandomData()], {
            colors: ['#8CC9E8'],
            series: {
                lines: {
                    show: true,
                    fill: true,
                    lineWidth: 1,
                    fillColor: {
                        colors: [{
                            opacity: 0.45
                        }, {
                            opacity: 0.45
                        }]
                    }
                },
                points: {
                    show: false
                },
                shadowSize: 0
            },
            grid: {
                borderColor: 'rgba(0,0,0,0.1)',
                borderWidth: 1,
                labelMargin: 15,
                backgroundColor: 'transparent'
            },
            yaxis: {
                min: 0,
                max: 100,
                color: 'rgba(0,0,0,0.1)'
            },
            xaxis: {
                show: false
            }
        });

        function update() {

            flotDashRealTime.setData([getRandomData()]);

            // Since the axes don't change, we don't need to call plot.setupGrid()
            flotDashRealTime.draw();
            setTimeout(update, ($('html').hasClass( 'mobile-device' ) ? 1000 : 30) );
        }

        update();
    })();
    </script>
@stop