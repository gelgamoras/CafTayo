@extends('layouts.admincon.main')

@section('page_header')
    My Profile
@endsection

@section('page_top_buttons')
    <button type="button" class="btn mt-1 btn-sm btn-primary mr-1" onclick="window.location.href='/plan-menu'">
        Plan a Menu
    </button> 
@endsection

@section('subheader')
    Manage your profile information
@endsection

@section('content')