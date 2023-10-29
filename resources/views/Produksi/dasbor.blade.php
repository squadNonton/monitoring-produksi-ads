@extends('main')
@section('content')

<section class="section dashboard">
    <div class="row align-items-top">

        <div class="col-lg-6">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <span>Produksi (KG)</span>
                        <div class="dropdown">
                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Today
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" data-name="filter_today" data-item="updatechartprodkg">Today</a></li>
                                <li><a class="dropdown-item" href="#" data-name="filter_machine" data-item="updatechartprodkg">Select Machine</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <figure>
                        <div id="chartprodkg"></div>
                    </figure>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <span>Produksi (PCS)</span>
                        <div class="dropdown">
                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Today
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" data-name="filter_today" data-item="updatechartprodpcs">Today</a></li>
                                <li><a class="dropdown-item" href="#" data-name="filter_machine" data-item="updatechartprodpcs">Select Machine</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <figure>
                        <div id="chartprodpcs"></div>
                    </figure>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <span>Effisiensi Machine (%)</span>
                        <div class="dropdown">
                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Today
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" data-name="filter_today" data-item="updatecharteffisiensimachine">Today</a></li>
                                <li><a class="dropdown-item" href="#" data-name="filter_machine" data-item="updatecharteffisiensimachine">Select Machine</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <figure>
                        <div id="charteffisiensimachine"></div>
                    </figure>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <span>Activity Man Power</span>
                        <div class="dropdown">
                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Today
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" data-name="filter_today" data-item="updatechartjumlahmp">Today</a></li>
                                <li><a class="dropdown-item" href="#" data-name="filter_machine" data-item="updatechartjumlahmp">Select Machine</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
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
                    <table class="table table-bordered dasbor">
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

{{-- Modal Select Machine --}}
<div class="modal fade" id="select_machine" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Select Machine</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" data-name="namefunction">
                    <div class="col-md-12 mb-3">
                        <label for="" class="form-label">Select Machine</label>
                        <select id="selectmachine" class="form-select select-2">
                            <option value="">-- Select Machine --</option>
                            @foreach($mc as $key => $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label for="" class="form-label">Select Date</label>
                        <div class="input-group">
                            <input type="text" class="form-control" data-name="date_range">
                            <span class="input-group-text" id="basic-addon2"><i class="bi bi-calendar-event"></i></span>
                        </div>
                        <input type="hidden" data-name="datestart">
                        <input type="hidden" data-name="dateend">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-name="changefilter">Change</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Select Machine --}}

<script>
    $(document).ready(function() {
        setTimeout(updatechartprodkg);
        setTimeout(updatechartprodpcs);
        setTimeout(updatecharteffisiensimachine);
        setTimeout(updatechartjumlahmp);
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
            // categories: ['C1','C2','C3','C4','C5','C6','C7','C8','C9','C10','C11','C12','C13','C14','C15','C16','C17','C18','M1','M2','M3','M4','M5','M6']
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
            name: 'IN',
            // data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            data: [],
            color: '#DBDFEA',
            stack: 'PCS'
        },{
            name: 'Sisa',
            // data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            data: [],
            color: '#FE0000',
            stack: 'PCS'
        },{
            name: 'Out',
            // data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            data: [],
            color: '#12CC94',
            stack: 'OUt'
        }]
    });

    var timeouts = {};
    function updatechartprodpcs(id,start,end) {
        var id      = id;
        var start   = start;
        var end     = end;
        var chart = $('#chartprodpcs').highcharts();
        $.ajax({
            url: "{{ route('dataprodpcs') }}",
            type: "POST",
            data: {
                id: id, start:start, end:end
            },
            dataType: 'json',
            global: false,
            cache: false,
            success: function(data) {
                // console.log(data);
                chart.xAxis[0].update({
                    categories: data.category
                });
                chart.series[0].setData(data.in);
                chart.series[1].setData(data.sisa);
                chart.series[2].setData(data.out);
                // Check if start and end are undefined
                if (id === undefined) {
                    // If timeout for this id already exists, clear it
                    if (timeouts['prodpcs']) {
                        clearTimeout(timeouts['prodpcs']);
                    }
                    // Set a new timeout for this id
                    timeouts['prodpcs'] = setTimeout(function () {
                        updatechartprodpcs();
                    }, 1000); // call updateChart every 3 seconds
                }
            },
            complete: function(data) {
                // setTimeout(updatechartprodpcs, 1000);
                if (id !== undefined ) {
                    clearTimeout(timeouts['prodpcs']);
                }
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
            // categories: ['C1','C2','C3','C4','C5','C6','C7','C8','C9','C10','C11','C12','C13','C14','C15','C16','C17','C18','M1','M2','M3','M4','M5','M6']
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
            name: 'IN',
            // data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            data: [],
            color: '#DBDFEA',
            stack: 'KG'
        },{
            name: 'Sisa',
            // data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            data: [],
            color: '#FE0000',
            stack: 'KG'
        },{
            name: 'Out',
            // data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            data: [],
            color: '#12CC94',
            stack: 'Out'
        }]
    });

    var timeouts = {};
    function updatechartprodkg(id,start,end) {
        var id      = id;
        var start   = start;
        var end     = end;
        var chart = $('#chartprodkg').highcharts();
        $.ajax({
            url: "{{ route('dataprodkg') }}",
            type: "POST",
            data: {
                id: id, start:start, end:end
            },
            dataType: 'json',
            global: false,
            cache: false,
            success: function(data) {
                // console.log(data);
                chart.xAxis[0].update({
                    categories: data.category
                });
                chart.series[0].setData(data.in);
                chart.series[1].setData(data.sisa);
                chart.series[2].setData(data.out);
                
                // Check if start and end are undefined
                if (id === undefined) {
                    // If timeout for this id already exists, clear it
                    if (timeouts['prodkg']) {
                        clearTimeout(timeouts['prodkg']);
                    }
                    // Set a new timeout for this id
                    timeouts['prodkg'] = setTimeout(function () {
                        updatechartprodkg();
                    }, 1000); // call updateChart every 3 seconds
                }
            },
            complete: function(data) {
                // setTimeout(updatechartprodkg, 1000);
                if (id !== undefined ) {
                    clearTimeout(timeouts['prodkg']);
                }
            }
        });
    }
</script>

<script>
    Highcharts.chart('charteffisiensimachine', {
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
            categories: []
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
            name: 'Effisiensi',
            // data: [20, 40, 60, 80, 100, 80],
            data: [],
            color: '#FFC436'
        }]
    });

    var timeouts = {};
    function updatecharteffisiensimachine(id,start,end) {
        var id      = id;
        var start   = start;
        var end     = end;
        var chart = $('#charteffisiensimachine').highcharts();
        $.ajax({
            url: "{{ route('dataeffmachine') }}",
            type: "POST",
            data: {
                id: id, start:start, end:end
            },
            dataType: 'json',
            global: false,
            cache: false,
            success: function(data) {
                console.log(data);
                chart.xAxis[0].update({
                    categories: data.category
                });
                chart.series[0].setData(data.eff);
                
                // Check if start and end are undefined
                if (id === undefined) {
                    // If timeout for this id already exists, clear it
                    if (timeouts['prodeff']) {
                        clearTimeout(timeouts['prodeff']);
                    }
                    // Set a new timeout for this id
                    timeouts['prodeff'] = setTimeout(function () {
                        updatecharteffisiensimachine();
                    }, 1000); // call updateChart every 3 seconds
                }
            },
            complete: function(data) {
                // setTimeout(updatechartprodeff, 1000);
                if (id !== undefined ) {
                    clearTimeout(timeouts['prodeff']);
                }
            }
        });
    }
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
            // categories: ['01-10-23', '02-10-23', '03-10-23','04-10-23', '05-10-23', '06-10-23']
            categories: []
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
            // data: [2, 4, 6, 8, 1, 8],
            data: [],
            color: '#748E63'
        }]
    });

    
    var timeouts = {};
    function updatechartjumlahmp(id,start,end) {
        var id      = id;
        var start   = start;
        var end     = end;
        var chart = $('#chartjumlahmp').highcharts();
        $.ajax({
            url: "{{ route('dataactmanpower') }}",
            type: "POST",
            data: {
                id: id, start:start, end:end
            },
            dataType: 'json',
            global: false,
            cache: false,
            success: function(data) {
                console.log(data);
                chart.xAxis[0].update({
                    categories: data.category
                });
                chart.series[0].setData(data.mp);
                
                // Check if start and end are undefined
                if (id === undefined) {
                    // If timeout for this id already exists, clear it
                    if (timeouts['prodjmlmp']) {
                        clearTimeout(timeouts['prodjmlmp']);
                    }
                    // Set a new timeout for this id
                    timeouts['prodjmlmp'] = setTimeout(function () {
                        updatechartjumlahmp();
                    }, 1000); // call updateChart every 3 seconds
                }
            },
            complete: function(data) {
                // setTimeout(updatechartprodjmlmp, 1000);
                if (id !== undefined ) {
                    clearTimeout(timeouts['prodjmlmp']);
                }
            }
        });
    }
</script>

{{-- JS Filter --}}
<script>
    $(document).on("click", "[data-name='filter_machine']", function (e) {
        $('[data-name="namefunction"]').val($(this).attr("data-item"));
        $("#select_machine").modal('show');
    });

    $(document).on("click", "[data-name='changefilter']", function (e) {
        var id      = $('#selectmachine').val();
        var start   = $('[data-name="datestart"]').val();
        var end     = $('[data-name="dateend"]').val();
        var action  = $('[data-name="namefunction"]').val();
        if(action === 'updatechartprodpcs'){
            updatechartprodpcs(id,start,end);
            $("#select_machine").modal('hide');
        }else if(action === 'updatechartprodkg'){
            updatechartprodkg(id,start,end);
            $("#select_machine").modal('hide');
        }else if(action === 'updatecharteffisiensimachine'){
            updatecharteffisiensimachine(id,start,end);
            $("#select_machine").modal('hide');
        }else if(action == 'updatechartjumlahmp'){
            updatechartjumlahmp(id,start,end);
            $("#select_machine").modal('hide');
        }
    });

    $(document).on("click", "[data-name='filter_today']", function (e) {
        // alert('Tes')
        var id      = 0;
        var start   = 0;
        var end     = 0;
        var action  = $(this).attr("data-item");
        if(action === 'updatechartprodpcs'){
            updatechartprodpcs(id,start,end);
        }else if(action === 'updatechartprodkg'){
            updatechartprodkg(id,start,end);
        }else if(action === 'updatecharteffisiensimachine'){
            updatecharteffisiensimachine(id,start,end);
        }else if(action == 'updatechartjumlahmp'){
            updatechartjumlahmp(id,start,end);
        }
    });
    
</script>
{{-- End JS Filter --}}

<script>
    $(".select-2").select2({
        allowClear: false,
        width: '100%',
        dropdownParent: $("#select_machine")
    });
</script>

<script>
    $('[data-name="date_range"]').daterangepicker({
        locale: {
            format: 'YYYY-MM-DD'
        }
    });
    $('[data-name="date_range"]').on('apply.daterangepicker', function(ev, picker) {
        var start       = picker.startDate.format('YYYY-MM-DD');
        var end         = picker.endDate.format('YYYY-MM-DD');

        $('[data-name="datestart"]').val(start);
        $('[data-name="dateend"]').val(end);
    });
</script>

@stop