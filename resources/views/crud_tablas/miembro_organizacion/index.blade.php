@extends('layouts.app')
@section('styles')
    {{ Html::style('css/toastr.min.css') }}
@stop
@section('pageHeader')
    <!-- Page Header -->
    <h4 class="page-title">Miembros - {{$org->nombre}}</h4>

    <!-- Bread Crumbs -->
    <ul class="breadcrumbs" style="border-left: 1px solid lightgray">
        <li class="nav-home">
            <a href="{{url('/home')}}">
                <i class="flaticon-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="{{url('/organizacion/listado')}}">Organizaciones</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="{{url('/organizacion/mienbros')}}">Miembros</a>
        </li>
    </ul>
@stop
@section('content')
    <div id="listMiembrosOrg" class="row">
        <div class="card col-12">
            <div class="card-header">
                <a href="{{url('organizacion/listado')}}" class="btn btn-default btn-round btn-border ml-auto mb-1 float-left"><i class="fa fa-arrow-left mr-1"></i>Back
                </a>
                <button class="btn btn-primary btn-round ml-auto mb-1 float-right" data-toggle="modal" data-target="#modalAddMiembroOrg" @click="getObjsModal"><i class="fa fa-plus"></i> Add
                </button>
            </div>

            @include('crud_tablas.miembro_organizacion.modalAddMiembroOrg')

            <div class="card-body" :class="[{'is-loading':loader},{'is-loading-lg':loader}]">
                <div class="table-responsive">
                    <table id="tblMiembroOrg" class="display table table-striped table-hover table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Llamamiento</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

{{--            @include('crud_tablas.organizacion.modalEdit')--}}

            <div class="card-footer">

            </div>

        </div>
    </div>
@stop
@section('scripts')

    {{Html::script('js/toastr.min.js')}}
    {{Html::script('js/vue.js')}}
    {{Html::script('js/axios.js')}}


    <script>

        //**************** VUE
        var vm = new Vue({
            el: '#listMiembrosOrg',
            created: function () {
                this.organizacion = '{{$org->id}}';
                this.getList();
            },
            data: {
                objectList: [],
                objects: [],
                loader:true,
                organizacion:'',
                errors: []
            },
            methods: {
                getList: function () {
                    var url = '/organizacion/miembros/lista/'+this.organizacion;
                    axios.get(url).then(response => {
                        this.objectList = response.data;
                        var dataTable = $('#tblMiembroOrg').DataTable();
                        dataTable.clear().draw();
                        this.objectList.forEach(function (objeto) {
                            dataTable.row.add([
                                objeto.nombre,
                                objeto.apellido,
                                objeto.llamamiento,
                                '<div class="btn-group" role="group">' +
                                '<a class="btn btn-link" onclick="fnEliminarObj('+objeto.id+')" title="Quitar"><i class="fa fa-eraser text-danger"></i></a>'+
                                '</div>'
                            ]).draw(false);
                        });
                        this.loader = false;
                    });
                },
                addObject: function () {
                    var url = '/organizacion/miembros';
                    var m = [];
                    $("input[name='selecto']:checked").each(function() {
                        m.push($(this).val());
                    });
                    var data={data:m,id:this.organizacion};
                    axios.post(url,
                        data
                    ).then(response => {
                        this.getList();
                        this.errors = [];
                        $('#modalAddMiembroOrg').modal('hide');
                        toastr.success('Miembro(s) agegado(s) exitosamente.');
                    }).catch(error => {
                        this.errors = error.response.data;
                        $.each(this.errors.errors, function(index,value){
                            toastr.error(value);
                        });
                    })
                },
                getObjsModal: function(){
                    this.loader = true;
                    var url = '{{route('miembrosModal')}}';
                    axios.get(url).then(response => {
                        this.objectList = response.data;
                        var dataTable = $('#tblMiebrosModal').DataTable({
                            paging: false,
                            lengthChange: true,
                            searching: true,
                            ordering: true,
                            autoWidth: true,
                            retrieve: true,
                            responsive: true,
                            scrollY: '50vh'
                        });
                        dataTable.clear().draw();
                        this.objectList.forEach(function (objeto) {
                            dataTable.row.add([
                                objeto.nombre+', '+objeto.apellido,
                                '<label class="text-center customCheck"> Select' +
                                '<input type="checkbox" name="selecto" class="form-check-input" value="'+objeto.id+'" v-model="objects">' +
                                '<span class="checkmark"></span>' +
                                '</label>'
                            ]).draw(false);
                        });
                        this.loader = false;
                    });
                },
                deleteObject: function (id) {
                    var url = '/organizacion/miembro' + id;
                    axios.delete(url).then(response => {
                        this.getList();
                        toastr.success('Eliminado Correctamente');
                    }).catch(error => {
                        this.errors = error.response.data;
                        $.each(this.errors.errors, function(index,value){
                            toastr.error('Eliminacion fallida'+value);
                        });
                    });
                }
            }
        });

        //**************** JQUERY

        function fnEditarObj(id) {
            vm.editObject(id);
        }

        function fnEliminarObj(id) {
            vm.deleteObject(id);
        }

    </script>
@stop