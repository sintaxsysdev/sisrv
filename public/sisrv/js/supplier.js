/**
 * Created by Eddy on 4/01/2017.
 */

function ReloadSupplierDataTableInPagination(id) {
    'use strict';
    var dataTable = $(id).DataTable();
    dataTable.ajax.reload(null, false);
}

function confirmDeleteSupplier(btn) {
    'use strict';
    $("#deleteSupplier").val(btn.value);
}

function DeleteSupplier(btn) {
    'use strict';
    var route = "supplier/" + btn.value;
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
            ReloadSupplierDataTableInPagination('#suppliers');
            toastr.success(msg.message);
        },
        error: function (msg) {
            ReloadSupplierDataTableInPagination('#suppliers');
            toastr.error('¡Proveedor no pudo ser eliminado!');
        }
    });
}