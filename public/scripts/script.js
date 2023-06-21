$(document).ready(function () {
    var basePath = $("#bash_path").val();

    $("#nama_pasien").autocomplete({
        source: function (request, cb) {
            $.ajax({
                url: basePath + "/pasien/get-pasien/" + request.term,
                method: "GET",
                dataType: "json",
                success: function (res) {
                    var result;
                    result = [
                        {
                            label:
                                "pasien dengan nama " +
                                request.term +
                                " tidak ada!",
                            value: "",
                        },
                    ];

                    // console.log(res);

                    if (res.length) {
                        result = $.map(res, function (obj) {
                            return {
                                label: obj.name,
                                value: obj.name,
                                data: obj,
                            };
                        });
                    }
                    cb(result);
                },
            });
        },

        select: function (e, selectedData) {
            // console.log(selectedData);

            if (selectedData && selectedData.item && selectedData.item.data) {
                var data = selectedData.item.data;

                $("#pasien_id").val(data.id);
                // $("#jenis_registrasi").val(data.jenis_registrasi);
                // $("#no_bpjs").val(data.no_bpjs);
            }
        },
    });

    $("#nama_dokter").autocomplete({
        source: function (request, cb) {
            $.ajax({
                url: basePath + "/dokter/get-dokter/" + request.term,
                method: "GET",
                dataType: "json",
                success: function (res) {
                    var result;
                    result = [
                        {
                            label:
                                "dokter dengan nama " +
                                request.term +
                                " tidak ada!",
                            value: "",
                        },
                    ];

                    // console.log(res);

                    if (res.length) {
                        result = $.map(res, function (obj) {
                            return {
                                label: obj.nama_ ,
                                value: obj.nama_dokter,
                                data: obj,
                            };
                        });
                    }
                    cb(result);
                },
            });
        },

        select: function (e, selectedData) {
            // console.log(selectedData);

            if (selectedData && selectedData.item && selectedData.item.data) {
                var data = selectedData.item.data;

                $("#dokter_id").val(data.id);
            }
        },
    });

    $("#nama_diagnosa").autocomplete({
        source: function (request, cb) {
            $.ajax({
                url: basePath + "/diagnosa/get-diagnosa/" + request.term,
                method: "GET",
                dataType: "json",
                success: function (res) {
                    var result;
                    result = [
                        {
                            label:
                                "diagnosa dengan nama " +
                                request.term +
                                " tidak ada!",
                            value: "",
                        },
                    ];

                    // console.log(res);

                    if (res.length) {
                        result = $.map(res, function (obj) {
                            return {
                                label: obj.nama_diagnosa,
                                value: obj.nama_diagnosa,
                                data: obj,
                            };
                        });
                    }
                    cb(result);
                },
            });
        },

        select: function (e, selectedData) {
            // console.log(selectedData);

            if (selectedData && selectedData.item && selectedData.item.data) {
                var data = selectedData.item.data;

                $("#diagnosa_id").val(data.id);
            }
        },
    });

    var i = 0;

    for(i=0; i <100; i++){
        $("#nama_obat["+i+"]").autocomplete({
            source: function (request, cb) {
                $.ajax({
                    url: basePath + "/obat/get-obat/" + request.term,
                    method: "GET",
                    dataType: "json",
                    success: function (res) {
                        var result;
                        result = [
                            {
                                label:
                                    "obat dengan nama " +
                                    request.term +
                                    " tidak ada!",
                                value: "",
                            },
                        ];
    
                        // console.log(res);
    
                        if (res.length) {
                            result = $.map(res, function (obj) {
                                return {
                                    label: obj.nama_ ,
                                    value: obj.nama_obat,
                                    data: obj,
                                };
                            });
                        }
                        cb(result);
                    },
                });
            },
    
            select: function (e, selectedData) {
                // console.log(selectedData);
    
                if (selectedData && selectedData.item && selectedData.item.data) {
                    var data = selectedData.item.data;
                    var i = 0;
    
                    $("#obat_id["+i+"]").val(data.id);
                }
            },
        });
    }

    
});

$(document).ready(function () {
    $("#datatables").DataTable({
        responsive: true,
    });
});

const flashSuccess = $(".flash-success").data("flashsuccess");

if (flashSuccess) {
    Swal.fire({
        title: "Success!",
        text: flashSuccess,
        icon: "success",
        confirmButtonColor: "#3085d6",
    });
}

const flashError = $(".flash-error").data("flasherror");

if (flashError) {
    Swal.fire({
        title: "Error!",
        text: flashError,
        icon: "error",
        confirmButtonColor: "#3085d6",
    });
}

// delete obat
$(".destroy-obat").on("click", function (e) {
    var form = $(this).closest("form");
    e.preventDefault();

    Swal.fire({
        title: "Apakah anda yakin?",
        text: "Data obat akan dihapus!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus!",
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
});

// delete pasien
$(".destroy-pasien").on("click", function (e) {
    var form = $(this).closest("form");
    e.preventDefault();

    Swal.fire({
        title: "Apakah anda yakin?",
        text: "Data pasien akan dihapus!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus!",
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
});

// delete poli
$(".destroy-poli").on("click", function (e) {
    var form = $(this).closest("form");
    e.preventDefault();

    Swal.fire({
        title: "Apakah anda yakin?",
        text: "Data poli akan dihapus!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus!",
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
});

// delete dokter
$(".destroy-dokter").on("click", function (e) {
    var form = $(this).closest("form");
    e.preventDefault();

    Swal.fire({
        title: "Apakah anda yakin?",
        text: "Data dokter akan dihapus!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus!",
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
});

// delete diagnosa
$(".destroy-diagnosa").on("click", function (e) {
    var form = $(this).closest("form");
    e.preventDefault();

    Swal.fire({
        title: "Apakah anda yakin?",
        text: "Data diagnosa akan dihapus!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus!",
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
});

// delete antrian
$(".destroy-antrian").on("click", function (e) {
    var form = $(this).closest("form");
    e.preventDefault();

    Swal.fire({
        title: "Apakah anda yakin?",
        text: "Data antrian akan dihapus!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus!",
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
});

// tambah table obat
var i = 0;

    $('#add').click(function(){
        ++i;
        $('#table').append(
            `<tr>
                <td>
                <input type="text" name="nama_obat[`+i+`]" id="nama_obat[`+i+`]" class="form-control">
                <input type="hidden" name="obat_id[`+i+`]">
                </td>
                <td>
                    <input type="number" name="jumlah_obat[`+i+`]" id="" class="form-control">
                </td>
                <td>
                    <button type="button" name="add" id="add" class="btn btn-danger">Hapus obat</button>
                </td>
            </tr>
            `
        );
    });
