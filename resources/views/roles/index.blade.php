
@extends('layouts.app')
@section('title','Roles - ')
@push('css')
    @include('layouts.datatable_css')
@endpush
@section('content')


    <div class="row">
        <div class="col-12 col-lg-12 col-xl-12">
            <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> All Roles
                            <a href="{{route('roles.create')}}" methods="get">
                                <button class="btn btn-info pull-right"><i class="fa fa-user"></i>  Add Role</button>
                            </a>
                        </h4>
                        <hr/>
                    </div>
              

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $key => $role)
                                <tr>
                                    <td>{{$role->name}}</td>
                                    <td>
                                        <div class="btn-group m-1">

                                            <a href="{{route('roles.edit',$role->id)}}">
                                                <button class="btn btn-outline-success  ml-2"><i class="fa fa-pencil-square-o"></i></button>
                                            </a>

                                            <form user="deleteForm" method="POST" action="{{route('roles.destroy', $role->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="javascript:void(0);"
                                                   onclick="deleteWithSweetAlert(event,parentNode);">
                                                    <button class="btn btn-outline-danger  ml-2"><i class="fa fa-trash-o "></i></button>
                                                </a>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach


                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('js')
    @include('layouts.datatable_js')

@endpush




