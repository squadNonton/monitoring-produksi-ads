@extends('main')
@section('content')

<section class="section dashboard">
    <div class="row align-items-top">
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
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <span>Production - Efisiensi</span>

                        <button type="button" class="btn btn-success" data-name="add">Add Efisiensi</button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Machine</th>
                                <th scope="col">Shift</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Date</th>
                                <th scope="col">Datetime Input</th>
                            </tr>
                        </thead>
                        <tbody id="showdatatable">
                            {{-- <tr>
                                <td class="text-center">1</td>
                                <td>Brandon Jacob</td>
                                <td>Designer</td>
                                <td>28</td>
                                <td>2016-05-25</td>
                                <td>2016-05-25</td>
                                <td>2016-05-25</td>
                            </tr> --}}
                        </tbody>
                    </table>
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

{{-- Modal Add Efisiensi --}}
<div class="modal fade" id="add_efisiensi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Efisiensi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="" class="form-label">Date</label>
                        <div class="input-group">
                            <input type="text" class="form-control" data-name="date" value="">
                            <span class="input-group-text" id="basic-addon2"><i class="bi bi-calendar-event"></i></span>
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="" class="form-label">Select Machine</label>
                        <select id="" class="form-select select2-add" data-name="id_mc">
                            <option value="">-- Select Machine --</option>
                            @foreach($mc as $key => $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="" class="form-label">Shift</label>
                        <select id="" class="form-select select2-add" data-name="shift">
                            <option value="">-- Select Shift --</option>
                            <option value="1">Shift 1</option>
                            <option value="2">Shift 2</option>
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="" class="form-label">Duration</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" data-name="waktu">
                            <span class="input-group-text" id="basic-addon2"><i class="bi bi-stopwatch-fill"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-name="save">Save</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Add Efisiensi --}}

<script>
    $(document).ready(function() {
        setTimeout(updatecharteffisiensimachine);
        setTimeout(fetchAndUpdateData);
    });
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

{{-- JS Add Efisiensi --}}
<script>
    $(document).on("click", "[data-name='add']", function (e) {
        $('[data-name="date"]').val('');
        $('[data-name="id_mc"]').val('').trigger("change");
        $('[data-name="shift"]').val('');
        $('[data-name="waktu"]').val('');
        $("#add_efisiensi").modal('show');
    });
</script>
{{-- End JS Add Efisiensi --}}

{{-- JS Save --}}
<script>
    $(document).on("click", "[data-name='save']", function (e) {
        var date        = $('[data-name="date"]').val();
        var id_mc       = $('[data-name="id_mc"]').val();
        var shift       = $('[data-name="shift"]').val();
        var waktu       = $('[data-name="waktu"]').val();
        var table       = "trx_eff_machine";
        var data        = {date:date,id_mc:id_mc,shift:shift,waktu:waktu};

        if (date === '' || waktu === '' || shift === '' || id_mc === '') {
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
                url: "{{ route('actioncheckeff') }}",
                data: {id_mc:id_mc,date:date,shift:shift},
                cache: false,
                success: function(arr) {
                    console.log(arr);

                    if(arr.length > 0){
                        Swal.fire({
                            position:'center',
                            title: 'Action Not Valid!',
                            icon: 'warning',
                            showConfirmButton: true,
                            // timer: 1500
                        }).then((arr) => {
                            // location.reload();
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
                                    $('[data-name="shift"]').val('').trigger("change");
                                    $('[data-name="waktu"]').val('');
                                    var table = $('#dataTable').DataTable();
                                    table.clear().destroy();
                                    fetchAndUpdateData();
                                    $("#add_efisiensi").modal('hide');
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
        var id      = 0;
        var start   = 0;
        var end     = 0;
        updatecharteffisiensimachine(id,start,end);
    });
</script>
{{-- End JS Filter --}}

{{-- JS Show data tables --}}
<script>
    function fetchAndUpdateData(){
       $('#dataTable').DataTable({
           "ajax": {
               "url": "{{route('listeffisiensi')}}",
               "dataSrc": ""
           },
           "columns": [
               {
                   "data": null,
                   "render": function (data, type, row, meta) {
                       // Menggunakan meta.row untuk mendapatkan nomor urut
                       return meta.row + 1;
                   }
               },
               { "data": "shift" },
               { "data": "name" },
               { "data": "waktu" },
               { "data": "date" },
               { "data": "last_update" },
               // Tambahkan kolom sesuai kebutuhan Anda
           ]
       });
   }
</script>
{{--  End JS Show data tables --}}

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

    $(".select2-add").select2({
        allowClear: false,
        width: '100%',
        dropdownParent: $("#add_efisiensi")
    });
</script>

@stop