<div class="modal fade bs-example-modal-sm" id="modalQuestion" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">¡Advertencia!</h4>
            </div>
            <div class="modal-body">
                <p class="text-center">¿Está Ud. seguro de eliminar el registro?</p>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                <button id="deleteRow" value="" onclick="DeleteRow(this);" type="button" class="btn btn-primary pull-left">Si, eliminar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No, cancelar</button>
            </div>
        </div>
    </div>
</div>