@extends('main')
@section('content')

<section class="section dashboard">
    <div class="row align-items-top">

        <div class="col-lg-6">
            <div class="card mb-3">
                <div class="card-header">Tonase (KG)</div>
                <div class="card-body">
                    <figure>
                        <div id="chartprodkg"></div>
                    </figure>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card mb-3">
                <div class="card-header">Tonase (PCS)</div>
                <div class="card-body">
                    <figure>
                        <div id="chartprodpcs"></div>
                    </figure>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card mb-3">
                <div class="card-header">Running Hour (%)</div>
                <div class="card-body">
                    <figure>
                        <div id="chartrunninhhour"></div>
                    </figure>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card mb-3">
                <div class="card-header">Jumlah MP</div>
                <div class="card-body">
                    <figure>
                        <div id="chartjumlahmp"></div>
                    </figure>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card mb-3">
                <div class="card-header">Oktober 2023</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center" rowspan="2">TGL</th>
                                <th scope="col" class="text-center" colspan="6">OCTOBER 2023</th>
                            </tr>
                            <tr>
                                <th scope="col" class="text-center">01</th>
                                <th scope="col" class="text-center">02</th>
                                <th scope="col" class="text-center">03</th>
                                <th scope="col" class="text-center">04</th>
                                <th scope="col" class="text-center">05</th>
                                <th scope="col" class="text-center">06</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">WO SISA</td>
                                <td class="text-center">10</td>
                                <td class="text-center">10</td>
                                <td class="text-center">10</td>
                                <td class="text-center">10</td>
                                <td class="text-center">10</td>
                                <td class="text-center">10</td>
                            </tr>
                            <tr>
                                <td class="text-center">WO IN (KG)</td>
                                <td class="text-center">10</td>
                                <td class="text-center">10</td>
                                <td class="text-center">10</td>
                                <td class="text-center">10</td>
                                <td class="text-center">10</td>
                                <td class="text-center">10</td>
                            </tr>
                            <tr>
                                <td class="text-center">ACT PROD (TON)</td>
                                <td class="text-center">10</td>
                                <td class="text-center">10</td>
                                <td class="text-center">10</td>
                                <td class="text-center">10</td>
                                <td class="text-center">10</td>
                                <td class="text-center">10</td>
                            </tr>
                            <tr>
                                <td class="text-center">WO IN (PCS)</td>
                                <td class="text-center">10</td>
                                <td class="text-center">10</td>
                                <td class="text-center">10</td>
                                <td class="text-center">10</td>
                                <td class="text-center">10</td>
                                <td class="text-center">10</td>
                            </tr>
                            <tr>
                                <td class="text-center">% EFF MESIN (RUN)</td>
                                <td class="text-center">10%</td>
                                <td class="text-center">10%</td>
                                <td class="text-center">10%</td>
                                <td class="text-center">10%</td>
                                <td class="text-center">10%</td>
                                <td class="text-center">10%</td>
                            </tr>
                            <tr>
                                <td class="text-center">ACTUAL MP</td>
                                <td class="text-center">10</td>
                                <td class="text-center">10</td>
                                <td class="text-center">10</td>
                                <td class="text-center">10</td>
                                <td class="text-center">10</td>
                                <td class="text-center">10</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card mb-3">
                <div class="card-header">ISSUE :</div>
                <div class="card-body issue">

                </div>
            </div>
        </div>

    </div>
</section>

<script>
    $(document).ready(function() {
        setTimeout(updatechartprodpcs);
        setTimeout(updatechartprodkg);
    });
</script>

<script>
    Highcharts.chart('chartprodpcs', {
        chart: {
            type: 'column'
        },
        title: {
            text: '',
        },
        subtitle: {
            text: ''
        },
        credits: {
            enabled: false
        },
        xAxis: {
            // categories: ['01-10-23', '02-10-23', '03-10-23','04-10-23', '05-10-23', '06-10-23']
            categoriesa: []
        },
        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: ''
            }
        },
        tooltip: {
            format: '<b>{key}</b><br/>{series.name}: {y}<br/>' +
                'Total: {point.stackTotal}'
        },
        plotOptions: {
            column: {
                stacking: 'normal'
            }
        },
        series: [{
            name: 'PCS Schedule',
            // data: [113, 122, 95, 113, 122, 95],
            data: [],
            color: '#DBDFEA',
            stack: 'PCS'
        },{
            name: 'PCS Sisa',
            // data: [77, 72, 80, 77, 72, 80],
            data: [],
            color: '#FE0000',
            stack: 'PCS'
        },{
            name: 'PCS Out',
            // data: [77, 72, 80, 77, 72, 80],
            data: [],
            color: '#12CC94',
            stack: 'PCS Out'
        }]
    });

    function updatechartprodpcs(id) {
        var id = id;
        var chart = $('#chartprodpcs').highcharts();
        $.ajax({
            url: "{{ route('dataprodpcs') }}",
            type: "POST",
            data: {
                id: id
            },
            dataType: 'json',
            global: false,
            cache: false,
            success: function(data) {
                console.log(data);
                chart.xAxis[0].update({
                    categories: data.category
                });
                chart.series[0].setData(data.schedule);
                chart.series[1].setData(data.sisa);
                chart.series[2].setData(data.out);
                // chart.series[3].setData(data.dt_freight);
            },
            complete: function(data) {
                setTimeout(updatechartprodpcs, 1000);
            }
        });
    }
</script>

<script>
    Highcharts.chart('chartprodkg', {
        chart: {
            type: 'column'
        },
        title: {
            text: '',
        },
        subtitle: {
            text: ''
        },
        credits: {
            enabled: false
        },
        xAxis: {
            // categories: ['01-10-23', '02-10-23', '03-10-23','04-10-23', '05-10-23', '06-10-23']
            categoriesa: []
        },
        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: ''
            }
        },
        tooltip: {
            format: '<b>{key}</b><br/>{series.name}: {y}<br/>' +
                'Total: {point.stackTotal}'
        },
        plotOptions: {
            column: {
                stacking: 'normal'
            }
        },
        series: [{
            name: 'KG Schedule',
            // data: [113, 122, 95, 113, 122, 95],
            data: [],
            color: '#DBDFEA',
            stack: 'KG'
        },{
            name: 'KG Sisa',
            // data: [77, 72, 80, 77, 72, 80],
            data: [],
            color: '#FE0000',
            stack: 'KG'
        },{
            name: 'KG Out',
            // data: [77, 72, 80, 77, 72, 80],
            data: [],
            color: '#12CC94',
            stack: 'KG Out'
        }]
    });

    function updatechartprodkg(id) {
        var id = id;
        var chart = $('#chartprodkg').highcharts();
        $.ajax({
            url: "{{ route('dataprodkg') }}",
            type: "POST",
            data: {
                id: id
            },
            dataType: 'json',
            global: false,
            cache: false,
            success: function(data) {
                console.log(data);
                chart.xAxis[0].update({
                    categories: data.category
                });
                chart.series[0].setData(data.schedule);
                chart.series[1].setData(data.sisa);
                chart.series[2].setData(data.out);
                // chart.series[3].setData(data.dt_freight);
            },
            complete: function(data) {
                setTimeout(updatechartprodkg, 1000);
            }
        });
    }
</script>

<script>
    Highcharts.chart('chartrunninhhour', {
        chart: {
            type: 'column'
        },
        title: {
            text: '',
        },
        subtitle: {
            text: ''
        },
        credits: {
            enabled: false
        },
        xAxis: {
            categories: ['01-10-23', '02-10-23', '03-10-23','04-10-23', '05-10-23', '06-10-23']
        },
        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: ''
            }
        },
        tooltip: {
            format: '<b>{key}</b><br/>{series.name}: {y}<br/>' +
                'Total: {point.stackTotal}'
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:f}%'
                }
            }
        },
        series: [{
            name: 'Running Hour',
            data: [20, 40, 60, 80, 100, 80],
            color: '#FFC436'
        }]
    });
</script>

<script>
    Highcharts.chart('chartjumlahmp', {
        chart: {
            type: 'column'
        },
        title: {
            text: '',
        },
        subtitle: {
            text: ''
        },
        credits: {
            enabled: false
        },
        xAxis: {
            categories: ['01-10-23', '02-10-23', '03-10-23','04-10-23', '05-10-23', '06-10-23']
        },
        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: ''
            }
        },
        tooltip: {
            format: '<b>{key}</b><br/>{series.name}: {y}<br/>' +
                'Total: {point.stackTotal}'
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:f}'
                }
            }
        },
        series: [{
            name: 'Jumlah MP',
            data: [2, 4, 6, 8, 1, 8],
            color: '#748E63'
        }]
    });
</script>

@stop