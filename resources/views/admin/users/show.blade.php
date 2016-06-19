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
            ready: function() {
                var user_id = '{{ $user->id }}';
                this.$http({url: '/admin/fetchUser/'+user_id, method: 'GET'}).then(function (response) {
                    this.$set('user', response.data)
                })
            }
        });
    </script>
@endsection

