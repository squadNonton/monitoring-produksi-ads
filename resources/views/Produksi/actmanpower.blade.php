@extends('main')
@section('content')

<section class="section dashboard">
    <div class="row align-items-top">

        <div class="col-lg-6">
            <div class="card mb-3">
                <div class="card-header">Schedule Produksi</div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="" class="form-label">Date</label>
                            <div class="input-group">
                                <input type="text" class="form-control" data-name="date" value="{{date('Y-m-d')}}">
                                <span class="input-group-text" id="basic-addon2"><i class="bi bi-calendar-event"></i></span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="" class="form-label">Select Machine</label>
                            <select id="" class="form-select select2-mc" data-name="id_mc">
                                <option value="">-- Select Machine --</option>
                                @foreach($mc as $key => $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="" class="form-label">Jumlah Man Power</label>
                            <input type="text" class="form-control" data-name="man_power">
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button type="button" class="btn btn-outline-success" data-name="save">Save</button>
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
        setTimeout(updatechartjumlahmp);
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

{{-- JS Save --}}
<script>
    $(document).on("click", "[data-name='save']", function (e) {
        var date        = $('[data-name="date"]').val();
        var id_mc       = $('[data-name="id_mc"]').val();
        var man_power   = $('[data-name="man_power"]').val();
        var table       = "trx_act_manpower";
        var data        = {date:date,id_mc:id_mc,man_power:man_power};

        if (date === '' || man_power === '' || id_mc === '') {
            Swal.fire({
                position:'center',
                title: 'Form is empty!',
                icon: 'error',
                showConfirmButton: false,
                timer: 1000
            })
        }else{
            $.ajax({
                type: "POST",
                url: "{{ route('actionadd') }}",
                data: {table:table,data:data},
                cache: false,
                success: function(data) {
                    // console.log(data);
                    Swal.fire({
                        position:'center',
                        title: 'Success!',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    }).then((data) => {
                        // location.reload();
                        $('[data-name="id_mc"]').val('').trigger("change");
                        $('[data-name="man_power"]').val('');
                    })
                },            
                error: function (data) {
                    Swal.fire({
                        position:'center',
                        title: 'Action Not Valid!',
                        icon: 'warning',
                        showConfirmButton: true,
                        // timer: 1500
                    }).then((data) => {
                        // location.reload();
                    })
                }
            });
        }
    });
</script>
{{-- End JS Save --}}

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
        updatecharteffisiensimachine(id,start,end);
        $("#select_machine").modal('hide');
    });

    $(document).on("click", "[data-name='filter_today']", function (e) {
        // alert('Tes')
        var id      = 0;
        var start   = 0;
        var end     = 0;
        updatecharteffisiensimachine(id,start,end);
        $("#select_machine").modal('hide');
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

<script>
    $('input[data-name="date"]').datepicker({
        format: "yyyy-mm-dd",
        viewMode: "days",
        minViewMode: "days",
        autoclose: true
    });
</script>

<script>
    $(".select2-mc").select2({
        allowClear: false,
        width: '100%'
    });
</script>

@stop