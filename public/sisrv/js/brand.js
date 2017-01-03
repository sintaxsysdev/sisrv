/**
 * Created by edyde on 3/01/2017.
 */

function ReloadBrandDataTableInPagination(id) {
    'use strict';
    var dataTable = $(id).DataTable();
    dataTable.ajax.reload(null, false);
}

function confirmDeleteBrand(btn) {
    'use strict';
    $("#deleteBrand").val(btn.value);
}

function DeleteBrand(btn) {
    'use strict';
    var route = "brand/" + btn.value;
    var token = $("#token").val();
    $.ajax({
        url: route,
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: 'DELETE',
        dataType: 'json',
        success: function (msg) {
            $("#modalQuestion").modal('toggle');
            ReloadBrandDataTableInPagination('#brand');
            toastr.success(msg.message);
        },
        error: function (msg) {
            ReloadBrandDataTableInPagination('#brand');
            toastr.error('¡Marca no pudo ser eliminada!');
        }
    });
}