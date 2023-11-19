@extends('main')
@section('content')

<section class="section dashboard">
    <div class="row align-items-top">

        <div class="col-lg-6">
            <div class="card mb-3">
                <div class="card-header">PCS</div>
                <div class="card-body">
                    <figure style="margin: 0rem;">
                        <div id="chartprodpcs"></div>
                    </figure>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card mb-3">
                <div class="card-header">KG</div>
                <div class="card-body">
                    <figure style="margin: 0rem;">
                        <div id="chartprodkg"></div>
                    </figure>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card mb-3">
                <div class="card-header">Schedule Produksi</div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="" class="form-label">Date</label>
                            <input type="text" class="form-control" id="date_sch" data-name="date" value="{{date('Y-m-d')}}">
                        </div>

                        <div class="col-md-12">
                            <label for="" class="form-label">WO</label>
                            <input type="text" class="form-control" id="wo_sch">
                        </div>

                        <div class="col-md-12">
                            <label for="" class="form-label">PCS</label>
                            <input type="text" class="form-control" id="pcs_sch">
                        </div>

                        <div class="col-md-12">
                            <label for="" class="form-label">KG</label>
                            <input type="text" class="form-control" id="kg_sch">
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button type="button" class="btn btn-outline-success" data-name="save_schedule">Save</button>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card mb-3">
                <div class="card-header">Out Produksi</div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="" class="form-label">Date</label>
                            <input type="text" class="form-control" id="date_out" data-name="date" value="{{date('Y-m-d')}}">
                        </div>

                        <div class="col-md-12">
                            <label for="" class="form-label">WO</label>
                            <input type="text" class="form-control" id="pcs_out">
                        </div>

                        <div class="col-md-12">
                            <label for="" class="form-label">PCS</label>
                            <input type="text" class="form-control" id="pcs_out">
                        </div>

                        <div class="col-md-12">
                            <label for="" class="form-label">KG</label>
                            <input type="text" class="form-control" id="kg_out">
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button type="button" class="btn btn-outline-success" data-name="save_out">Save</button>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- JS Save data --}}
<script>
    $(document).on("click", "[data-name='save_schedule']", function (e) {
        var date        = $("#date_sch").val();
        var no_wo       = $("#wo_sch").val();
        var pcs         = $("#pcs_sch").val();
        var kg          = $("#kg_sch").val();
        var table       = "trx_prod_in";
        var data        = {date:date,no_wo:no_wo,pcs:pcs,kg:kg};

        if (date === '' || no_wo === '' || pcs === '' || kg === '') {
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
                        $("#date_sch").val('');
                        $("#wo_sch").val('');
                        $("#pcs_sch").val('');
                        $("#kg_sch").val('');
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

<script>
    $(document).on("click", "[data-name='save_out']", function (e) {
        var date        = $("#date_out").val();
        var no_wo       = $("#wo_out").val();
        var pcs         = $("#pcs_out").val();
        var kg          = $("#kg_out").val();
        var table       = "trx_prod_out";
        var data        = {date:date,no_wo:no_wo,pcs:pcs,kg:kg};

        if (date === '' || no_wo === '' || pcs === '' || kg === '') {
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
                        $("#date_out").val('');
                        $("#wo_out").val('').trigger("change");
                        $("#pcs_out").val('');
                        $("#kg_out").val('');
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
    $('input[data-name="date"]').datepicker({
        format: "yyyy-mm-dd",
        viewMode: "days",
        minViewMode: "days",
        autoclose: true
    });
</script>

<script>
    $(".select-2").select2({
        allowClear: false,
        width: '100%'
    });
</script>

@stop