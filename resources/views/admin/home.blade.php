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
                            <div class="col-md-3">
                                <a href="{{ url('admin/users/create') }}" class="btn btn-primary"><i class="fa fa-user-plus" aria-hidden="true"></i> Add User</a>
                            </div>
                            <div class="col-md-3 col-md-offset-6">
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
                                            <!-- Delete Button -->
                                            <form action="{{url('admin/users')}}/@{{ user.id }}/delete" method="POST" class="btn-group btn-group-sm">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>
                                                </button>
                                            </form>
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
    new Vue({
        el: '#vue-app',
        data: {
            users: []
        },
        ready: function() {
            // GET request
            this.$http({url: '/admin/fetchUsers', method: 'GET'}).then(function (response) {
                this.$set('users', response.data)
            })
        }
    });
</script>
@endsection

