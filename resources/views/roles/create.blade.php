@extends('layouts.app')
@section('title','Roles - ')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Create User Roles
                        <a href="{{route('roles.index')}}" class="btn btn-info pull-right">Back</a>
                    </h3>
                <hr/>
                </div>
                <div class="card-body">
                    <form id="rolesForm" action="{{route('roles.store')}}" method="post">
                        @csrf
                        @include('roles.form')
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


