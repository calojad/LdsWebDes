<form method="POST" v-on:submit.prevent="createObject" xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div id="modalAddLlamamiento" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h3 class="modal-title">Crear</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-12 pr-0">
                            <div class="form-group">
                                <label for="inpName">Name</label>
                                <input id="inpName" type="text" class="form-control" placeholder="Name" required
                                       autofocus v-model="object.nombre">
                                <span v-for="error in errors" class="text-danger">@{{ error.nombre }}</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>