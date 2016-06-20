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
                        <div class="panel-heading">Edit User</div>
                        <div class="panel-body">
                            <form action="{{ url('admin/users/'.$user->id) }}" method="POST" class="form-horizontal">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                <!-- Name -->
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name" value="{{ old('name',$user->name) }}">
                                         @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                         </span>
                                        @endif
                                    </div>
                                </div>
                                <!-- E-Mail Address -->
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email" value="{{ old('email',$user->email) }}">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                         </span>
                                        @endif
                                    </div>
                                </div>
                                <!-- Update Button -->
                                <div class="form-group">
                                    <div class="col-md-offset-4 col-md-6">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-refresh" aria-hidden="true"></i> Update User
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

