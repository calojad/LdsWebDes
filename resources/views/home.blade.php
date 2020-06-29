@extends('layouts.app')

@section('styles')
    <link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css" />
@stop

@section('pageHeader')
    <!-- Page Header -->
    <h4 class="page-title">Home</h4>

    <!-- Bread Crumbs -->
    <ul class="breadcrumbs" style="border-left: 1px solid lightgray">
        <li class="nav-home">
            <a href="{{url('/home')}}">
                <i class="flaticon-home"></i>
            </a>
        </li>
        {{--<li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="#">Pages</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="#">Starter Page</a>
        </li>--}}
    </ul>
@stop

@section('content')
    <template>
        <div>
            <b-table striped hover :items="items"></b-table>
        </div>
    </template>
@endsection

@section('scripts')
    <script src="//unpkg.com/vue@latest/dist/vue.min.js"></script>
    <script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js"></script>

    <script>
        import Table from '{{asset('bootstrap-vue/es/components/table')}}'
        Vue.use(Table);
        export default {
            data() {
                return {
                    items: [
                        { age: 40, first_name: 'Dickerson', last_name: 'Macdonald' },
                        { age: 21, first_name: 'Larsen', last_name: 'Shaw' },
                        { age: 89, first_name: 'Geneva', last_name: 'Wilson' },
                        { age: 38, first_name: 'Jami', last_name: 'Carney' }
                    ]
                }
            }
        }
    </script>
@stop