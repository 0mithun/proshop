@extends('layouts.app')

@section('content')
    <div class="wrapper without_header_sidebar">
        <!-- contnet wrapper -->
        <div class="content_wrapper">

            <div class="container">
                <div class="row">
                    <div class="col-md-8 ">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-heading text-center">Login</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-responsive table-bordered table-condensed">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First</th>
                                        <th>Last</th>
                                        <th>Body</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td scope="1">Mark 1</td>
                                        <td scope="1">Mark 2</td>
                                        <td scope="1">Mark 3</td>
                                        <td scope="1">Mark 4</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-heading text-center">
                                    <img src="{{  asset('/frontend/images/profile.jpeg')  }}" height="90px" width="90px" alt="">
                                </h4>
                                <h5 class="card-title text-center">{{ auth()->user()->name  }}</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="{{ route('password.change')  }}">Change Password</a></li>
                                    <li class="list-group-item">List 2</li>
                                    <li class="list-group-item">List 3</li>
                                </ul>
                                <a href="{{ route('user.logout')  }}" class="btn btn-sm btn-danger btn-block">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel"></div>
        </div><!--/ content wrapper -->
    </div><!--/ wrapper -->
@endsection

