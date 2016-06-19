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
                        <div class="panel-heading">@{{ user.name }}</div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form">
                                <!-- Name -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name" v-model="user.name">
                                    </div>
                                </div>
                                <!-- E-Mail Address -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email" v-model="user.email">
                                    </div>
                                </div>
                                <!-- Update Button -->
                                <div class="form-group">
                                    <div class="col-md-offset-4 col-md-6">
                                        <button @click="updateUser(user)" class="btn btn-primary">
                                            <i class="fa fa-refresh" aria-hidden="true"></i> Update
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.25/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.8.0/vue-resource.js"></script>

    <script>
        new Vue({
            el: '#vue-app',
            data: {
                user: []
            },
            ready: function () {
                this.fetchUser();
            },
            methods: {
                fetchUser: function () {
                    var user_id = '{{ $user->id }}';
                    this.$http({url: '/admin/fetchUser/' + user_id, method: 'GET'}).then(function (response) {
                        this.$set('user', response.data)
                    })
                },
                updateUser: function () {
                    this.$http({url: '/admin/updateUser/' + user_id, method: 'PATCH'})
                }
            }
        });
    </script>
@endsection

