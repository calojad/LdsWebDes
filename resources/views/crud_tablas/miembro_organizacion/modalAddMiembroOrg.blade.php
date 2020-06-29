<form method="POST" v-on:submit.prevent="addObject" xmlns:v-on="http://www.w3.org/1999/xhtml">
    <div id="modalAddMiembroOrg" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h3 class="modal-title">Add</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" :class="[{'is-loading':loader},{'is-loading-lg':loader}]">
                    <div class="table-responsive">

                        <table id="tblMiebrosModal" class="display table table-striped table-hover table-sm table-bordered">
                            <thead class=thead-dark>
                                <tr>
                                    <th>Miembro</th>
                                    <th>Seleccionar</th>
                                </tr>
                            </thead>
                            <tbody>
                            {{--@foreach($miembros as $m)
                                <tr>
                                    <td>{{$m->nombre}}, {{$m->apellido}}</td>
                                    <td class="">
                                        <input type="checkbox" name="selecto[]" class="form-check-input text-center">
                                    </td>
                                </tr>
                            @endforeach--}}
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>