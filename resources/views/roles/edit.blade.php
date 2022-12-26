@extends('layouts.app')
@section('title','Roles Edit- ')
@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="box-title">Edit Role
                <a href="{{route('roles.index')}}" class="btn btn-info pull-right">Back</a></h3>
            </div>
            <div class="card-body">
                    <form id="rolesForm" action="{{route('roles.update',$role->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        @include('roles.form')
                        <div class="col-sm-2">
                            <button class="btn btn-success">Update</button>
                        </div>
                    </form>
            </div>
            </div>
        </section>

@endsection