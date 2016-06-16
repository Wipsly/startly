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
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                   Content
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

