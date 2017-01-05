/**
 * Created by Eddy on 4/01/2017.
 */

function ReloadDataTable() {
    'use strict';
    var dataTable = $('#categories').DataTable();
    dataTable.ajax.reload(null, false);
}

function confirmDelete(btn) {
    'use strict';
    $("#deleteRow").val(btn.value);
}

function DeleteRow(btn) {
    'use strict';
    var route = "category/" + btn.value;
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
            ReloadDataTable();
            toastr.success(msg.message);
        },
        error: function (msg) {
            ReloadDataTable();
            toastr.error('¡Categoría no pudo ser eliminada!');
        }
    });
}
