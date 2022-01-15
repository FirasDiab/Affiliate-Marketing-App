@extends('layouts.app')
@section('title')
    <title>Admin</title>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Admin Panel</div>

                    <div class="card-body">
                        <h5>Welcome on board {{ Auth::user()->name }}</h5>
                    </div>
                </div>
            </div>

            <section id="basic-datatable" class="col-md-12 mt-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-warning">
                                <h4 class="card-title">
                                    Users Registered / Number Of Users {{$count_users_registered}}
                                </h4>
                            </div>
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table zero-configuration">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Registered date</th>
                                            <th>Number of referred users</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($all_users as $user)
                                            <tr>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->created_at}}</td>
                                                <td>{{$user->number_of_refrred}}</td>
                                            </tr>
                                        @endforeach
                                        </tfoot>
                                    </table>
                                    {{--                            <div class="col-lg-12 bg-warning">{!! $Users->links() !!}</div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
