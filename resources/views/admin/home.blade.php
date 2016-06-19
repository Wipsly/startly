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
                <div class="panel-heading">Users</div>

                <div class="panel-body">
                    <div id="vue-app">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></div>
                                        <input v-model="query" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Company</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user in users | filterBy query in 'name'">
                                    <td>@{{ user.name }}</td>
                                    <td>@{{ user.company.name }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{url('admin/users')}}/@{{ user.id }}" class="btn btn-default"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="{{url('admin/users')}}/@{{ user.id }}/edit" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            <a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.25/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.8.0/vue-resource.js"></script>

<script>
    // app.js

    new Vue({

// We want to target the div with an id of 'events'
        el: '#vue-app',

// Here we can register any values or collections that hold data
// for the application
        data: {
            users: []
        },

// Anything within the ready function will run when the application loads
        ready: function() {
            // GET request
            this.$http({url: '/admin/fetchUsers', method: 'GET'}).then(function (response) {
                this.$set('users', response.data)
            })
        }
    });
</script>
@endsection

