@extends('layouts.app')
@section('styles')
    {{ Html::style('css/toastr.min.css') }}
@stop
@section('pageHeader')
    <!-- Page Header -->
    <h4 class="page-title">Llamamientos</h4>

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
            <a href="{{url('/llamamiento/listado   ')}}">Llamamiento</a>
        </li>
    </ul>
@stop
@section('content')
    <div id="listLlamamientos" class="row">
        <div class="card col-12">
            <div class="card-header">
                <button class="btn btn-primary btn-round ml-auto mb-1 float-right" data-toggle="modal"
                        data-target="#modalAddLlamamiento" @click.prevent="zeroInput()"><i class="fa fa-plus"></i> Nuevo
                </button>
            </div>
            @include('crud_tablas.llamamiento.modalCreate')
            <div class="card-body" :class="[{'is-loading':loader},{'is-loading-lg':loader}]">
                <div class="table-responsive">
                    <table id="tblLlamamiento" class="display table table-striped table-hover table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th>Llamamiento</th>
                            <th style="width: 10px">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            @include('crud_tablas.llamamiento.modalEdit')
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
            el: '#listLlamamientos',
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
                    var url = '/llamamiento';
                    axios.get(url).then(response => {
                        this.objectList = response.data;
                        var dataTable = $('#tblLlamamiento').DataTable();
                        dataTable.clear().draw();
                        this.objectList.forEach(function (objeto) {
                            dataTable.row.add([
                                objeto.nombre,
                                '<div class="btn-group" role="group">' +
                                '<a class="btn btn-link" onclick="fnEditarObj('+objeto.id+')"><i class="fa fa-edit text-primary"></i></a>' +
                                '<a class="btn btn-link" onclick="fnEliminarObj('+objeto.id+')"><i class="fa fa-trash-alt text-danger"></i></a>'+
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
                    var url = '/llamamiento';
                    axios.post(url,
                        this.object
                    ).then(response => {
                        this.getList();
                        this.object = {
                            'nombre': ''
                        };
                        this.errors = [];
                        $('#modalAddLlamamiento').modal('hide');
                        toastr.success('Nueva Llamamiento creadó con éxito.');
                    }).catch(error => {
                        this.errors = error.response.data;
                        $.each(this.errors.errors, function(index,value){
                            toastr.error(value);
                        });
                    })
                },
                editObject: function(id){
                    var url = '/llamamiento/'+id+'/edit';
                    axios.get(url).then(response => {
                        this.object = response.data;
                        $('#modalEditLlamamiento').modal('show');
                    });
                },
                updateObject: function (id) {
                    var url = '/llamamiento/' + id;
                    axios.put(url, this.object).then(response => {
                        this.getList();
                        this.object = {
                            'nombre': ''
                        };
                        this.errors = [];
                        $('#modalEditLlamamiento').modal('hide');
                        toastr.success('Llamamiento actualizadó con éxito');
                    }).catch(error => {
                        this.errors = error.response.data;
                        $.each(this.errors.errors, function(index,value){
                            toastr.error(value);
                        });
                    });
                },
                deleteObject: function (id) {
                    var url = '/llamamiento/' + id;
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