@extends('main')
@section('content')

<section class="section dashboard">
    <div class="row align-items-top">

        <div class="col-12">
            <div class="card border-primary border-top border-3 border-0 p-3">
                <div class="card-header">
                    <div class="row">

                        <div class="col-3">
                            <div class="mb-0">
                                <label for="" class="form-label">Select SHAPE</label>
                                <select data-name="shape" class="form-select select2">
                                    @foreach ($shape as $key => $value)
                                        <option value="{{$value->id}}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="mb-0">
                                <label for="" class="form-label">Select Material</label>
                                <select data-name="material" class="form-select select2" id="material_select">
                                    @foreach ($material as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->grade }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <h6 class="mb-0" id="material_name"></h6>
                    </div>
                    <figure class="highcharts-figure m-0">
                        <div id="chartquartal"></div>
                    </figure>
                </div>
            </div>
        </div>

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

        <div class="col-lg-12">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <span>Production - Efisiensi</span>
                        <div class="dropdown">
                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Today
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" data-name="filter_today" data-item="">Today</a></li>
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

        <div class="col-lg-12">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <span>Production - Man Power</span>
                        <div class="dropdown">
                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Today
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" data-name="filter_today" data-item="">Today</a></li>
                                <li><a class="dropdown-item" href="#" data-name="date_range" data-item="">Select Date</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <figure>
                        <div id="chartmanpower"></div>
                    </figure>
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
        setTimeout(updatechartmanpower);
        setTimeout(updatechartquartal);
    });
</script>

{{-- JS Quartal --}}
<script>
    $(document).on("change", "[data-name='shape']", function(e) {
            var id = $(this).val();
            var table = 'mst_material';
            var field = 'shape';

            $.ajax({
                type: "POST",
                url: "{{ route('actionlistdata') }}",
                data: {
                    id: id,
                    table: table,
                    field: field
                },
                cache: false,
                success: function(data) {
                    // console.log(data);
                    var html = '';
                    $.each(data, function(i, val) {
                        html += '<option value="'+val.id+'">' + val.grade + '</option>';
                    });
                    $('#material_select').html(html);
                },
                error: function(data) {
                    Swal.fire({
                        position: 'center',
                        title: 'Action Not Valid!',
                        icon: 'warning',
                        showConfirmButton: true,
                        // timer: 1500
                    }).then((data) => {
                        // location.reload();
                    })
                }
            });
        });

        $(document).on("change", "[data-name='material']", function(e) {
            var id = $(this).val();
            updatechartquartal(id);
        });

        Highcharts.chart('chartquartal', {
            chart: {
                type: 'line'
            },
            title: {
                text: ''
            },
            exporting: {
                enabled: false
            },
            credits: {
                enabled: false
            },
            xAxis: {
                categories: []
            },
            yAxis: [{
                title: {
                    text: null
                },
                labels: {
                    format: '¥{value}'
                }
            }, {
                title: {
                    text: null
                },
                labels: {
                    format: '¥{value}'
                },
                opposite: true
            }],
            tooltip: {
                headerFormat: '<span>{point.key}</span><br>',
                pointFormat: '<span style="color:{series.color};">{series.name}:</span>&nbsp;&nbsp;<span>¥{point.y}</span><br>',
                footerFormat: '</table>',
                crosshairs: true,
                shared: true
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true,
                        format: '¥{y}'
                    }
                }
            },
            series: [{
                name: 'Base',
                color: '#47A992',
                marker: {
                    enabled: false
                },
                data: []
            }, {
                name: 'Alloy Surcharger',
                yAxis: 1,
                color: '#0E2954',
                marker: {
                    enabled: false
                },
                data: []
            }, {
                name: 'CNF',
                color: '#CD1818',
                marker: {
                    enabled: false
                },
                data: []
            }, {
                name: 'Freight',
                yAxis: 1,
                color: '#4E31AA',
                marker: {
                    enabled: false
                },
                data: []
            }]
        });

        var timeouts = {};
        function updatechartquartal(id) {
            var id = id;
            var chart = $('#chartquartal').highcharts();
            $.ajax({
                url: "{{ route('dataquartal') }}",
                type: "POST",
                data: {
                    id: id
                },
                dataType: 'json',
                global: false,
                cache: false,
                success: function(data) {
                    // console.log(data);
                    $("#material_name").text(data.material_name);
                    // chart.xAxis[0].setCategories(data.category);
                    chart.xAxis[0].update({
                        categories: data.category
                    });
                    chart.series[0].setData(data.dt_base);
                    chart.series[1].setData(data.dt_alloy);
                    chart.series[2].setData(data.dt_cnf);
                    chart.series[3].setData(data.dt_freight);
                    // Check if start and end are undefined
                    if (id === undefined) {
                        // If timeout for this id already exists, clear it
                        if (timeouts['quartal']) {
                            clearTimeout(timeouts['quartal']);
                        }
                        // Set a new timeout for this id
                        timeouts['quartal'] = setTimeout(function () {
                            updatechartquartal();
                        }, 1000); // call updateChart every 3 seconds
                    }
                },
                complete: function(data) {
                    // setTimeout(updatechartquartal, 1000);
                    if (id !== undefined ) {
                        clearTimeout(timeouts['quartal']);
                    }
                }
            });
        }
</script>
{{-- End JS Quartal --}}

{{-- JS PCS --}}
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
{{-- End JS PCS --}}

{{-- JS KG --}}
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
{{-- End JS KG --}}

{{-- JS Effisiensi --}}
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
            allowDecimals: true,
            title: {
                text: ''
            },
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.0f}%'
                }
            }
        },
        series: [{
            name: 'Shift 1',
            // data: [20, 40, 60, 80, 100, 80],
            data: [],
            color: '#0174BE'
        },{
            name: 'Shift 2',
            // data: [20, 40, 60, 80, 100, 80],
            data: [],
            color: '#00A9FF'
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
                // console.log(data);
                chart.xAxis[0].update({
                    categories: data.category
                });
                chart.series[0].setData(data.shift1);
                chart.series[1].setData(data.shift2);
                
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
{{-- End JS Effisiensi --}}

{{-- JS Man Power --}}
<script>
    Highcharts.chart('chartmanpower', {
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
            allowDecimals: true,
            title: {
                text: ''
            },
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.0f}'
                }
            }
        },
        series: [{
            name: 'Total Cuting',
            // data: [20, 40, 60, 80, 100, 80],
            data: [],
            color: '#0174BE'
        },{
            name: 'CT Shift 1',
            // data: [20, 40, 60, 80, 100, 80],
            data: [],
            color: '#00A9FF'
        },{
            name: 'CT Shift 2',
            // data: [20, 40, 60, 80, 100, 80],
            data: [],
            color: '#87C4FF'
        },{
            name: 'Total Machining',
            // data: [20, 40, 60, 80, 100, 80],
            data: [],
            color: '#29ADB2'
        },{
            name: 'MC Shift 1',
            // data: [20, 40, 60, 80, 100, 80],
            data: [],
            color: '#1AACAC'
        },{
            name: 'MC Shift 2',
            // data: [20, 40, 60, 80, 100, 80],
            data: [],
            color: '#C5E898'
        }]
    });

    var timeouts = {};
    function updatechartmanpower(start,end) {
        var start   = start;
        var end     = end;
        var chart = $('#chartmanpower').highcharts();
        $.ajax({
            url: "{{ route('dataactmanpower') }}",
            type: "POST",
            data: {
                start:start, end:end
            },
            dataType: 'json',
            global: false,
            cache: false,
            success: function(data) {
                // console.log(data);
                chart.xAxis[0].update({
                    categories: data.category
                });
                chart.series[0].setData(data.ct);
                chart.series[1].setData(data.cts1);
                chart.series[2].setData(data.cts2);
                chart.series[3].setData(data.mc);
                chart.series[4].setData(data.mcs1);
                chart.series[5].setData(data.mcs2);
                
                // Check if start and end are undefined
                if (start === undefined) {
                    // If timeout for this id already exists, clear it
                    if (timeouts['prodmanpower']) {
                        clearTimeout(timeouts['prodmanpower']);
                    }
                    // Set a new timeout for this id
                    timeouts['prodmanpower'] = setTimeout(function () {
                        updatechartmanpower();
                    }, 1000); // call updateChart every 3 seconds
                }
            },
            complete: function(data) {
                // setTimeout(updatechartprodeff, 1000);
                if (start !== undefined ) {
                    clearTimeout(timeouts['prodmanpower']);
                }
            }
        });
    }
</script>
{{-- End JS Man Power --}}

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
        }else if(action == 'updatechartmanpower'){
            updatechartmanpower(start,end);
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

    $(".select2").select2({
        allowClear: false,
        width: '100%'
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