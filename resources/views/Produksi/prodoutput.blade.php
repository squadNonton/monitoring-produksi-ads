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

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <span>Output Produksi</span>

                        <button type="button" class="btn btn-success" data-name="add">Add Output</button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Shift</th>
                                <th scope="col">Machine</th>
                                <th scope="col">JML WO</th>
                                <th scope="col">JML PCS</th>
                                <th scope="col">JML KG</th>
                                <th scope="col">Date Output</th>
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

{{-- Modal Add Output --}}
<div class="modal fade" id="add_output" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Output</h1>
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
                        <label for="" class="form-label">Select Shift</label>
                        <select id="shift" class="form-select select2-add">
                            <option value="">-- Select Shift --</option>
                            <option value="1">-- Shift 1--</option>
                            <option value="2">-- Shift 2--</option>
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="" class="form-label">Select Machine</label>
                        <select id="id_mc" class="form-select select2-add">
                            <option value="">-- Select Machine --</option>
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="" class="form-label">WO</label>
                        <input type="number" class="form-control" data-name="jml_wo" readonly>
                        <input type="hidden" data-name="t_wo">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="" class="form-label">PCS</label>
                        <input type="number" class="form-control" data-name="jml_pcs" readonly>
                        <input type="hidden" data-name="t_pcs">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="" class="form-label">KG</label>
                        <input type="number" class="form-control" data-name="jml_kg" readonly>
                        <input type="hidden" data-name="t_kg">
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
{{-- End Modal Add Output --}}

<script>
    $(document).ready(function() {
        setTimeout(updatechartprodkg);
        setTimeout(updatechartprodpcs);
        setTimeout(fetchAndUpdateData);
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

{{-- JS Add Output --}}
<script>
    $(document).on("click", "[data-name='add']", function (e) {
        $('[data-name="date"]').val('');
        $('#id_mc').val('').trigger("change");
        $('#shift').val('').trigger("change");
        $('[data-name="jml_wo"]').val('');
        $('[data-name="jml_pcs"]').val('');
        $('[data-name="jml_kg"]').val('');
        $('[data-name="t_wo"]').val('');
        $('[data-name="t_pcs"]').val('');
        $('[data-name="t_kg"]').val('');
        $("#add_output").modal('show');
    });
</script>
{{-- End JS Add Output --}}

{{-- JS Save --}}
<script>
    $(document).on("click", "[data-name='save']", function (e) {
        var date        = $('[data-name="date"]').val();
        var shift       = $('#shift').val();
        var id_mc       = $('#id_mc').val();
        var jml_wo      = $('[data-name="jml_wo"]').val();
        var pcs         = $('[data-name="jml_pcs"]').val();
        var kg          = $('[data-name="jml_kg"]').val();
        var table       = "trx_prod_out";
        var data        = {date:date,shift:shift,id_mc:id_mc,jml_wo:jml_wo,pcs:pcs,kg:kg};

        var t_wo        = $('[data-name="t_wo"]').val();
        var t_pcs       = $('[data-name="t_pcs"]').val();
        var t_kg        = $('[data-name="t_kg"]').val();

        if(jml_wo > t_wo || pcs > t_pcs || kg > t_kg ){
            Swal.fire({
                position:'center',
                title: 'Action Not Valid!',
                icon: 'warning',
                showConfirmButton: true,
            })
        }else{
            if (date === '' || shift === '' || jml_wo === '' || pcs === '' || kg === '' || id_mc === '') {
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
                            $('#id_mc').val('').trigger("change");
                            $('#shift').val('').trigger("change");
                            $('[data-name="jml_wo"]').val('');
                            $('[data-name="jml_pcs"]').val('');
                            $('[data-name="jml_kg"]').val('');
                            var table = $('#dataTable').DataTable();
                            table.clear().destroy();
                            fetchAndUpdateData();
                            $("#add_output").modal('hide');
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
        var action  = $('[data-name="namefunction"]').val();
        if(action === 'updatechartprodpcs'){
            updatechartprodpcs(id,start,end);
            $("#select_machine").modal('hide');
        }else if(action === 'updatechartprodkg'){
            updatechartprodkg(id,start,end);
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
        }
    });
    
</script>
{{-- End JS Filter --}}

{{-- JS Show data tables --}}
<script>
     function fetchAndUpdateData(){
        $('#dataTable').DataTable({
            "ajax": {
                "url": "{{route('listdataout')}}",
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
                { "data": "jml_wo" },
                { "data": "pcs" },
                { "data": "kg" },
                { "data": "date" },
                { "data": "last_update" },
                // Tambahkan kolom sesuai kebutuhan Anda
            ]
        });
    }

    // $(document).ready(function() {
    //     $('#dataTable').DataTable();
    // });
</script>
{{--  End JS Show data tables --}}

{{-- JS Validasi  --}}
<script>
    $(document).on("change", "#id_mc", function (e) {
        var date    = $('[data-name="date"]').val();
        var id_mc   = $(this).val();

        $.ajax({
            type: "POST",
            url: "{{ route('countvalidasi') }}",
            data: {date:date,id_mc:id_mc},
            cache: false,
            success: function(data) {
                console.log(data);

                $('[data-name="t_wo"]').val(data.t_wo);
                $('[data-name="t_pcs"]').val(data.t_pcs);
                $('[data-name="t_kg"]').val(data.t_kg);

                if(data.t_wo > data.o_wo){
                    $('[data-name="jml_wo"]').removeAttr("readonly");
                }else{
                    $('[data-name="jml_wo"]').attr("readonly", "readonly");
                }

                if(data.t_pcs > data.o_pcs){
                    $('[data-name="jml_pcs"]').removeAttr("readonly");
                }else{
                    $('[data-name="jml_pcs"]').attr("readonly", "readonly");
                }
                if(data.t_kg > data.o_kg){
                    $('[data-name="jml_kg"]').removeAttr("readonly");
                }else{
                    $('[data-name="jml_kg"]').attr("readonly", "readonly");
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
    });
</script>
{{-- End JS Validasi  --}}

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
    }).on('changeDate', function(e) {
        var date  = moment(e.date).format('YYYY-MM-DD');
        $.ajax({
            type: "POST",
            url: "{{ route('machinebytglin') }}",
            data: {date:date},
            cache: false,
            success: function(data) {
                console.log(data);
                var html = '<option value="">Select Machine</option>';
                data.forEach(function(data) {
                    html += '<option value="'+data.id+'">'+data.name+' ('+data.type+')</option>';
                });

                $('#id_mc').html(html);
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
    });
</script>

<script>
    $(".select2-mc").select2({
        allowClear: false,
        width: '100%'
    });
</script>

<script>
    $(".select2-add").select2({
        allowClear: false,
        width: '100%',
        dropdownParent: $("#add_output")
    });
</script>

@stop