@extends('layouts.app')
@section('styles')
    {{ Html::style('css/toastr.min.css') }}
@stop
@section('pageHeader')
    <!-- Page Header -->
    <h4 class="page-title">Organizaciones</h4>

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
            <a href="{{url('/miembros')}}">Organización</a>
        </li>
    </ul>
@stop
@section('content')
    <div id="listOrganizaciones" class="row">
        <div class="card col-12">
            <div class="card-header">
                <button class="btn btn-primary btn-round ml-auto mb-1 float-right" data-toggle="modal"
                        data-target="#modalAddOrganizacion" @click.prevent="zeroInput()"><i class="fa fa-plus"></i> Nuevo
                </button>
            </div>
            @include('crud_tablas.organizacion.modalCreate')
            <div class="card-body" :class="[{'is-loading':loader},{'is-loading-lg':loader}]">
                <div class="table-responsive">
                    <table id="tblOrganizaciones" class="display table table-striped table-hover table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th>Organización</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            @include('crud_tablas.organizacion.modalEdit')
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
            el: '#listOrganizaciones',
            created: function () {
                this.getList();
            },
            data: {
                objectList: [],
                object: {
                    'nombre': ''
                },
                loader:true,
                errors: []
            },
            methods: {
                getList: function () {
                    var url = '/organizacion';
                    axios.get(url).then(response => {
                        this.objectList = response.data;
                        var dataTable = $('#tblOrganizaciones').DataTable();
                        dataTable.clear().draw();
                        this.objectList.forEach(function (objeto) {
                            dataTable.row.add([
                                objeto.nombre,
                                '<div class="btn-group" role="group">' +
                                '<a class="btn btn-link" onclick="fnEditarObj('+objeto.id+')" title="Edit"><i class="fa fa-edit text-primary"></i></a>' +
                                '<a class="btn btn-link" onclick="fnEliminarObj('+objeto.id+')" title="Delete"><i class="fa fa-trash-alt text-danger"></i></a>'+
                                '<a href="{{url('organizacion/miembros')}}/'+objeto.id+'" class="btn btn-link" title="Miembros"><i class="fa fa-users text-info"></i></a>'+
                                '</div>'
                            ]).draw(false);
                        });
                        this.loader = false;
                    });
                },
                zeroInput: function(){
                    this.object = {
                        'nombre': ''
                    };
                },
                createObject: function () {
                    var url = '/organizacion';
                    axios.post(url,
                        this.object
                    ).then(response => {
                        this.getList();
                        this.object = {
                            'nombre': ''
                        };
                        this.errors = [];
                        $('#modalAddOrganizacion').modal('hide');
                        toastr.success('Nueva Organización creadá con éxito.');
                    }).catch(error => {
                        this.errors = error.response.data;
                        $.each(this.errors.errors, function(index,value){
                            toastr.error(value);
                        });
                    })
                },
                editObject: function(id){
                    var url = '/organizacion/'+id+'/edit';
                    axios.get(url).then(response => {
                        this.object = response.data;
                        $('#modalEditOrganizacion').modal('show');
                    });
                },
                updateObject: function (id) {
                    var url = '/organizacion/' + id;
                    axios.put(url, this.object).then(response => {
                        this.getList();
                        this.object = {
                            'nombre': ''
                        };
                        this.errors = [];
                        $('#modalEditOrganizacion').modal('hide');
                        toastr.success('Organización actualizadá con éxito');
                    }).catch(error => {
                        this.errors = error.response.data;
                        $.each(this.errors.errors, function(index,value){
                            toastr.error(value);
                        });
                    });
                },
                deleteObject: function (id) {
                    var url = '/organizacion/' + id;
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