@extends('layouts.app')
@section('title')
    <title>Affiliate Marketing App</title>
@endsection

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Welcome on board {{ Auth::user()->name }}</div>
                <div class="justify-content-center" style="margin: 0 auto;">
                    <img src="{{ asset('images') . '/' . Auth::user()->image}}" class="img img-thumbnail " style="width: 300px; height: 300px">
                </div>
                <div class="card-body">
                    <h5>Number of users registered through your link : {{ $count_users_register_by_user }}</h5>
                    <h5>Number of visitors for registration page : {{ $count_register_view }}</h5>
                    <span>Your referral link : {{ url('/register?key=' . $referral_link) }}</span>
                </div>
            </div>
        </div>

        <section id="basic-datatable" class="col-md-12 mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-warning">
                            <h4 class="card-title">
                                Users Registered By Your Link / Number Of Users {{$count_users_register_by_user}}
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
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users_list as $user_list)
                                    <tr>
                                        <td>{{$user_list->name}}</td>
                                        <td>{{$user_list->email}}</td>
                                        <td>{{$user_list->created_at}}</td>
                                        <td></td>
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


<div style="width:75%;" class="mx-auto">
    {!! $chartjs->render() !!}
</div>

@endsection
