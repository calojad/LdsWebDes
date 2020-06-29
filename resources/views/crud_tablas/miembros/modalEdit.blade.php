<form method="POST" v-on:submit.prevent="updateObject(object.id)" xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div id="modalEditMiembro" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h3 class="modal-title">
                        Editar
                    </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-6 pr-0">
                            <div class="form-group">
                                <label for="inpName">Name</label>
                                <input id="inpName" type="text" class="form-control" placeholder="Name" required
                                       autofocus v-model="object.nombre">
                                <span v-for="error in errors" class="text-danger">@{{ error.nombre }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inpLastname">Lastname</label>
                                <input id="inpLastname" type="text" class="form-control" placeholder="Lastname"
                                       required v-model="object.apellido">
                                <span v-for="error in errors" class="text-danger">@{{ error.apellido }}</span>
                            </div>
                        </div>

                        <div class="col-md-6 pr-0">
                            <div class="form-group">
                                <label for="inpEmail">Email</label>
                                <input id="inpEmail" type="email" class="form-control" placeholder="Email" v-model="object.email">
                                <span v-for="error in errors" class="text-danger">@{{ error.email }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inpPhone">Teléfono</label>
                                <input id="inpPhone" type="text" class="form-control" placeholder="Phone" v-model="object.telefono">
                                <span v-for="error in errors" class="text-danger">@{{ error.telefono }}</span>
                            </div>
                        </div>

                        <div class="col-md-6 pr-0">
                            <div class="form-group">
                                <label for="inpBirth">Birth date</label>
                                <input id="inpBirth" type="date" class="form-control" placeholder="Birth date" v-model="object.fecha_nacimiento">
                                <span v-for="error in errors"
                                      class="text-danger">@{{ error.fecha_nacimiento }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inpSex">Sex</label>
                                {{ Form::select('sexo', ['V'=>'Varón','M'=>'Mujer'],null,['class' => 'form-control', 'v-model' => 'object.sexo']) }}
                                <span v-for="error in errors" class="text-danger">@{{ error.sexo }}</span>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="inpDireccion">Dirección</label>
                                <input id="inpDireccion" type="text" class="form-control" placeholder="Dirección" v-model="object.direccion">
                                <span v-for="error in errors" class="text-danger">@{{ error.direccion }}</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>