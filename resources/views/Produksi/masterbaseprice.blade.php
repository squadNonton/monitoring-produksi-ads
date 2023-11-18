@extends('main')
@section('content')

<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card border-primary border-top border-3 border-0 p-3">
                <div class="d-flex justify-content-end mb-3">
                    <button type="button" class="btn btn-outline-primary px-5" data-name="add_data"><i class='bx bx-yen mr-1'></i>Add</button>
                </div>
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Material</th>
                                <th rowspan="2">Shape</th>
                                <th rowspan="2">Tahun</th>
                                <th colspan="5" class="text-center">Quartal 1</th>
                                <th colspan="5" class="text-center">Quartal 2</th>
                                <th colspan="5" class="text-center">Quartal 3</th>
                                <th colspan="5" class="text-center">Quartal 4</th>
                            </tr>
                            <tr>
                                <th class="text-center">Base</th>
                                <th class="text-center">Alloy <br> Surcharger</th>
                                <th class="text-center">FOB</th>
                                <th class="text-center">CNF</th>
                                <th class="text-center">Freight</th>

                                <th class="text-center">Base</th>
                                <th class="text-center">Alloy <br> Surcharger</th>
                                <th class="text-center">FOB</th>
                                <th class="text-center">CNF</th>
                                <th class="text-center">Freight</th>

                                <th class="text-center">Base</th>
                                <th class="text-center">Alloy <br> Surcharger</th>
                                <th class="text-center">FOB</th>
                                <th class="text-center">CNF</th>
                                <th class="text-center">Freight</th>

                                <th class="text-center">Base</th>
                                <th class="text-center">Alloy <br> Surcharger</th>
                                <th class="text-center">FOB</th>
                                <th class="text-center">CNF</th>
                                <th class="text-center">Freight</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($arr as $key => $value)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td>{{ $value->material_name }}</td>
                                    <td>{{ $value->shape_name }}</td>
                                    <td>{{ $value->thn }}</td>
                                    <td class="text-center">
                                        @if ($value->q1_base == '')
                                            -
                                        @else
                                            ¥ {{ $value->q1_base }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($value->q1_alloy == '')
                                            -
                                        @else
                                            ¥ {{ $value->q1_alloy }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($value->q1_fob == '')
                                            -
                                        @else
                                            ¥ {{ $value->q1_fob }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($value->q1_cnf == '')
                                            -
                                        @else
                                            ¥ {{ $value->q1_cnf }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($value->q1_freight == '')
                                            -
                                        @else
                                            ¥ {{ $value->q1_freight }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($value->q2_base == '')
                                            -
                                        @else
                                            ¥ {{ $value->q2_base }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($value->q2_alloy == '')
                                            -
                                        @else
                                            ¥ {{ $value->q2_alloy }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($value->q2_fob == '')
                                            -
                                        @else
                                            ¥ {{ $value->q2_fob }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($value->q2_cnf == '')
                                            -
                                        @else
                                            ¥ {{ $value->q2_cnf }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($value->q2_freight == '')
                                            -
                                        @else
                                            ¥ {{ $value->q2_freight }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($value->q3_base == '')
                                            -
                                        @else
                                            ¥ {{ $value->q3_base }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($value->q3_alloy == '')
                                            -
                                        @else
                                            ¥ {{ $value->q3_alloy }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($value->q3_fob == '')
                                            -
                                        @else
                                            ¥ {{ $value->q3_fob }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($value->q3_cnf == '')
                                            -
                                        @else
                                            ¥ {{ $value->q3_cnf }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($value->q3_freight == '')
                                            -
                                        @else
                                            ¥ {{ $value->q3_freight }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($value->q4_base == '')
                                            -
                                        @else
                                            ¥ {{ $value->q4_base }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($value->q4_alloy == '')
                                            -
                                        @else
                                            ¥ {{ $value->q4_alloy }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($value->q4_fob == '')
                                            -
                                        @else
                                            ¥ {{ $value->q4_fob }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($value->q4_cnf == '')
                                            -
                                        @else
                                            ¥ {{ $value->q4_cnf }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($value->q4_freight == '')
                                            -
                                        @else
                                            ¥ {{ $value->q4_freight }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Modal Add --}}
<div class="modal fade" id="modal_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Quartal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card-style">
                            <div class="mb-3">
                                <label for="" class="form-label">Shape</label>
                                <select data-name="shape" class="form-select select-2-add">
                                    @foreach($shape as $key => $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Material</label>
                                <select data-name="material" class="form-select select-2-add" id="material_select">
                                    @foreach($material as $key => $value)
                                        <option value="{{$value->id}}">{{$value->grade}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Tahun</label>
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker_years" placeholder="Tahun" aria-label="" aria-describedby="" data-name="thn">
                                    <span class="input-group-text" id=""><i class='bx bxs-calendar'></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Quartal</label>
                                <select data-name="quartal" class="form-select select-2-add">
                                    <option value="">-- Select Quartal --</option>
                                    <option value="1">Quartal 1</option>
                                    <option value="2">Quartal 2</option>
                                    <option value="3">Quartal 3</option>
                                    <option value="4">Quartal 4</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Base</label>
                                <div class="input-group">
                                    <span class="input-group-text" id=""><i class='bx bx-yen'></i></span>
                                    <input type="text" class="form-control" placeholder="Base" aria-label="" aria-describedby="" data-name="base">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Alloy Surcharger</label>
                                <div class="input-group">
                                    <span class="input-group-text" id=""><i class='bx bx-yen'></i></span>
                                    <input type="text" class="form-control" placeholder="Alloy Surcharger" aria-label="" aria-describedby="" data-name="alloy">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">FOB</label>
                                <div class="input-group">
                                    <span class="input-group-text" id=""><i class='bx bx-yen'></i></span>
                                    <input type="text" class="form-control" placeholder="FOB" aria-label="" aria-describedby="" data-name="fob">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">CNF</label>
                                <div class="input-group">
                                    <span class="input-group-text" id=""><i class='bx bx-yen'></i></span>
                                    <input type="text" class="form-control" placeholder="CNF" aria-label="" aria-describedby="" data-name="cnf">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Freight</label>
                                <div class="input-group">
                                    <span class="input-group-text" id=""><i class='bx bx-yen'></i></span>
                                    <input type="text" class="form-control" placeholder="Freight" aria-label="" aria-describedby="" data-name="freight">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-name="save_add">Save</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal ADD --}}

{{-- JS Add Data --}}
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
                    html += '<option value="'+ val.id +'">'+ val.grade+'</option>';
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

    $(document).on("click", "[data-name='add_data']", function(e) {
        $("[data-name='thn']").val('');
        $("[data-name='base']").val('');
        $("[data-name='alloy']").val('');
        $("[data-name='fob']").val('');
        $("[data-name='cnf']").val('');
        $("[data-name='freight']").val('');
        $("[data-name='quartal']").val('').trigger("change");
        $("[data-name='shape']").val('1').trigger("change");
        $("[data-name='material']").val('1').trigger("change");
        $("#modal_add").modal('show');
    });

    $(document).on("click", "[data-name='save_add']", function(e) {
        var thn         = $("[data-name='thn']").val();
        var quartal     = $("[data-name='quartal']").val();
        var shape       = $("[data-name='shape']").val();
        var material    = $("[data-name='material']").val();
        var base        = $("[data-name='base']").val();
        var alloy       = $("[data-name='alloy']").val();
        var fob         = $("[data-name='fob']").val();
        var cnf         = $("[data-name='cnf']").val();
        var freight     = $("[data-name='freight']").val();
        var update_by   = "1";
        var table       = "trx_quartal";
        var id1         = material;
        var id2         = thn;
        var field1      = 'id_material';
        var field2      = 'thn';

        if (thn === '' || quartal === '' || base === '' || alloy === '' || fob === '' || cnf === '' || freight === '') {
            Swal.fire({
                position: 'center',
                title: 'Form is empty!',
                icon: 'error',
                showConfirmButton: false,
                timer: 1000
            })
        } else {
            $.ajax({
                type: "POST",
                url: "{{route('actionshowdatawmulti')}}",
                data: {id1:id1,id2:id2,table:table,field1:field1,field2:field2},
                cache: false,
                success: function(dt) {
                    // console.log(dt['data']);
                    if (dt['data'] === null || dt['data'] === '') {
                        if (quartal === '1') {
                            var data = {
                                id_material: material,
                                thn: thn,
                                q1_base: base,
                                q1_alloy: alloy,
                                q1_fob: fob,
                                q1_cnf: cnf,
                                q1_freight: freight,
                                update_by: update_by
                            };
                        } else if (quartal === '2') {
                            var data = {
                                id_material: material,
                                thn: thn,
                                q2_base: base,
                                q2_alloy: alloy,
                                q2_fob: fob,
                                q2_cnf: cnf,
                                q2_freight: freight,
                                update_by: update_by
                            };
                        } else if (quartal === '3') {
                            var data = {
                                id_material: material,
                                thn: thn,
                                q3_base: base,
                                q3_alloy: alloy,
                                q3_fob: fob,
                                q3_cnf: cnf,
                                q3_freight: freight,
                                update_by: update_by
                            };
                        } else if (quartal === '4') {
                            var data = {
                                id_material: material,
                                thn: thn,
                                q4_base: base,
                                q4_alloy: alloy,
                                q4_fob: fob,
                                q4_cnf: cnf,
                                q4_freight: freight,
                                update_by: update_by
                            };
                        } else {
                            Swal.fire({
                                position: 'center',
                                title: 'Form is empty!',
                                icon: 'error',
                                showConfirmButton: false,
                                timer: 1000
                            })
                        }

                        // Action ADD
                        if (thn === '' || quartal === '' || base === '' || alloy === '' || fob === '' || cnf === '' || freight === '') {
                            Swal.fire({
                                position: 'center',
                                title: 'Form is empty!',
                                icon: 'error',
                                showConfirmButton: false,
                                timer: 1000
                            })
                        } else {
                            $.ajax({
                                type: "POST",
                                url: "{{ route('actionadd') }}",
                                data: {table: table,data: data},
                                cache: false,
                                success: function(data) {
                                    // console.log(data);
                                    Swal.fire({
                                        position: 'center',
                                        title: 'Success!',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        timer: 1500
                                    }).then((data) => {
                                        location.reload();
                                    })
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
                        }
                    } else {
                        if (quartal === '1') {
                            var dats = {
                                id_material: material,
                                thn: thn,
                                q1_base: base,
                                q1_alloy: alloy,
                                q1_fob: fob,
                                q1_cnf: cnf,
                                q1_freight: freight,
                                update_by: update_by
                            };
                        } else if (quartal === '2') {
                            var dats = {
                                id_material: material,
                                thn: thn,
                                q2_base: base,
                                q2_alloy: alloy,
                                q2_fob: fob,
                                q2_cnf: cnf,
                                q2_freight: freight,
                                update_by: update_by
                            };
                        } else if (quartal === '3') {
                            var dats = {
                                id_material: material,
                                thn: thn,
                                q3_base: base,
                                q3_alloy: alloy,
                                q3_fob: fob,
                                q3_cnf: cnf,
                                q3_freight: freight,
                                update_by: update_by
                            };
                        } else if (quartal === '4') {
                            var dats = {
                                id_material: material,
                                thn: thn,
                                q4_base: base,
                                q4_alloy: alloy,
                                q4_fob: fob,
                                q4_cnf: cnf,
                                q4_freight: freight,
                                update_by: update_by
                            };
                        } else {
                            Swal.fire({
                                position: 'center',
                                title: 'Form is empty!',
                                icon: 'error',
                                showConfirmButton: false,
                                timer: 1000
                            })
                        }

                        // Action EDIT
                        if (thn === '' || quartal === '' || base === '' || alloy === '' || fob === '' || cnf === '' || freight === '') {
                            Swal.fire({
                                position: 'center',
                                title: 'Form is empty!',
                                icon: 'error',
                                showConfirmButton: false,
                                timer: 1000
                            })
                        } else {
                            $.ajax({
                                type: "POST",
                                url: "{{ route('actioneditwmulti') }}",
                                data: {id1:id1,whr1:field1,id2:id2,whr2:field2,table:table,dats:dats},
                                cache: false,
                                success: function(data) {
                                    // console.log(data);
                                    Swal.fire({
                                        position: 'center',
                                        title: 'Success!',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        timer: 1500
                                    }).then((data) => {
                                        location.reload();
                                    })
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

                        }
                    }
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
        }

    });
</script>
{{-- End JS Add Data --}}

{{-- Select2 --}}
<script>
    $(".select-2-add").select2({
        allowClear: false,
        width: '100%',
        dropdownParent: $("#modal_add")
    });
</script>
{{-- End Select2 --}}

{{-- JS Datepicker --}}
<script>
    $('.datepicker_years').datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
        autoclose: true,
        autoHide: true,
    });
</script>
{{-- End JS Datepicker --}}

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>

@stop