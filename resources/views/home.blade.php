@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <br><br>
                    <a href="{{ route('users.index') }}">Users</a><br>
                    <a href="{{ route('campus.index') }}">Campus</a><br><br>
                    <a href="{{ route('logs.campus.index') }}">Campus Logs</a><br>
                    <a href="{{ route('logs.category.index') }}">Category Logs</a><br>
                    <a href="{{ route('logs.food.index') }}">Food Logs</a><br>
                    <a href="{{ route('logs.menu.index') }}">Menu logs</a><br>
                    <a href="{{ route('logs.user.index') }}">User Logs</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
