@extends('layouts.app')
@section('styles')
    {{ Html::style('css/toastr.min.css') }}
@stop
@section('pageHeader')
    <!-- Page Header -->
    <h4 class="page-title">Miembros</h4>

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
            <a href="{{url('/miembros')}}">Miembros</a>
        </li>
    </ul>
@stop
@section('content')
    <div id="listMiembros" class="row">
        <div class="card col-12">
            <div class="card-header">
                <button class="btn btn-primary btn-round ml-auto mb-1 float-right" data-toggle="modal"
                        data-target="#modalAddMiembro" @click.prevent="zeroInput()"><i class="fa fa-plus"></i> Nuevo
                </button>
            </div>
            @include('crud_tablas.miembros.modalCreate')
            <div class="card-body" :class="[{'is-loading':loader},{'is-loading-lg':loader}]">
                <div class="table-responsive">
                    <table id="tblMiembros" class="display table table-striped table-hover table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th>Miembro</th>
{{--                            <th>Email</th>--}}
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Sexo</th>
                            <th style="width: 10px">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            @include('crud_tablas.miembros.modalEdit')
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
            el: '#listMiembros',
            created: function () {
                this.getList();
            },
            data: {
                miembros: [],
                object: {
                    'nombre': '',
                    'apellido': '',
                    'email': '',
                    'telefono': '',
                    'direccion': '',
                    'fecha_nacimiento': '',
                    'sexo': 'H'
                },
                loader: true,
                errors: []
            },
            methods: {
                getList: function () {
                    var url = '/miembros';
                    axios.get(url).then(response => {
                        this.miembros = response.data;
                        var dataTable = $('#tblMiembros').DataTable();
                        dataTable.clear().draw();
                        this.miembros.forEach(function (miembro) {
                            dataTable.row.add([
                                miembro.nombre + ' ' +miembro.apellido,
                                // miembro.email,
                                miembro.telefono,
                                miembro.direccion,
                                miembro.sexo,
                                '<div class="btn-group" role="group">' +
                                    '<a class="btn btn-link" onclick="fnEditarObj('+miembro.id+')"><i class="fa fa-edit text-primary"></i></a>' +
                                    '<a class="btn btn-link" onclick="fnEliminarObj('+miembro.id+')"><i class="fa fa-trash-alt text-danger"></i></a>'+
                                '</div>'
                            ]).draw(false);
                        });
                        this.loader = false;
                    });
                },
                zeroInput: function(){
                    this.object = {
                        'nombre': '',
                        'apellido': '',
                        'email': '',
                        'telefono': '',
                        'direccion': '',
                        'fecha_nacimiento': '',
                        'sexo': 'H'
                    };
                },
                createObject: function () {
                    var url = '/miembros';
                    axios.post(url,
                        this.object
                    ).then(response => {
                        this.getList();
                        this.object = {
                            'nombre': '',
                            'apellido': '',
                            'email': '',
                            'telefono': '',
                            'direccion': '',
                            'fecha_nacimiento': '',
                            'sexo': ''
                        };
                        this.errors = [];
                        $('#modalAddMiembro').modal('hide');
                        toastr.success('Nuevo Miembro creadó con éxito.');
                    }).catch(error => {
                        this.errors = error.response.data;
                        $.each(this.errors.errors, function(index,value){
                            toastr.error(value);
                        });
                    })
                },
                editObject: function(id){
                    var url = '/miembros/'+id+'/edit';
                    axios.get(url).then(response => {
                        this.object = response.data;
                        $('#modalEditMiembro').modal('show');
                    });
                },
                updateObject: function (id) {
                    var url = '/miembros/' + id;
                    axios.put(url, this.object).then(response => {
                        this.getList();
                        this.object = {
                            'nombre': '',
                            'apellido': '',
                            'email': '',
                            'telefono': '',
                            'direccion': '',
                            'fecha_nacimiento': '',
                            'sexo': ''
                        };
                        this.errors = [];
                        $('#modalEditMiembro').modal('hide');
                        toastr.success('Miembro actualizadó con éxito');
                    }).catch(error => {
                        this.errors = error.response.data;
                        $.each(this.errors.errors, function(index,value){
                            toastr.error(value);
                        });
                    });
                },
                deleteObject: function (id) {
                    var url = '/miembros/' + id;
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
        $(document).ready(function () {

            $('.modal').on('shown.bs.modal', function (e) {
                $('[autofocus]', e.target).focus();
            });

        });

        function fnEditarObj(id) {
            vm.editObject(id);
        }

        function fnEliminarObj(id) {
            vm.deleteObject(id);
        }

    </script>
@stop