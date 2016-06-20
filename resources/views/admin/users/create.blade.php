@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="panel panel-default panel-nav">
                    <div class="panel-heading">Navigation</div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li role="presentation" class="active"><a href="#"><i class="fa fa-users" aria-hidden="true"></i> Users</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div id="vue-app">
                    <div class="panel panel-default">
                        <div class="panel-heading">Add User</div>
                        <div class="panel-body">
                            <form action="{{ url('admin/users') }}" method="POST" class="form-horizontal">
                                {{ csrf_field() }}
                                <!-- Name -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                                <!-- E-Mail Address -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                </div>
                                <!-- Update Button -->
                                <div class="form-group">
                                    <div class="col-md-offset-4 col-md-6">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-user-plus" aria-hidden="true"></i> Add User
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

