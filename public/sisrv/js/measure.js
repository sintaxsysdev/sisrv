/**
 * Created by edyde on 3/01/2017.
 */

function ReloadMeasureDataTableInPagination(id) {
    'use strict';
    var dataTable = $(id).DataTable();
    dataTable.ajax.reload(null, false);
}

function confirmDeleteMeasure(btn) {
    'use strict';
    $("#deleteMeasure").val(btn.value);
}

function DeleteMeasure(btn) {
    'use strict';
    var route = "measure/" + btn.value;
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
            ReloadMeasureDataTableInPagination('#measures');
            toastr.success(msg.message);
        },
        error: function (msg) {
            ReloadMeasureDataTableInPagination('#measures');
            toastr.error('¡Medida no pudo ser eliminada!');
        }
    });
}