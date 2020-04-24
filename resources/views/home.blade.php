@extends('layouts.dashboard.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header border-bottom"><h4 class="mb-0">Dashboard</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <span style="font-weight: 300">You are logged in!</span>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
