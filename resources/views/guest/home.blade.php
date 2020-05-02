@extends('layouts.guest.app')

@section('scripts')
    <script src="{{ asset('js/textFit.min.js') }}"></script>
    <script>
        textFit(document.getElementsByClassName('campus-button'), {
            minFontSize: 16
        });
    </script>
    <script> 
        $( document ).ready(function() {
            $('.campus-button').addClass('white-space-break-spaces'); 
        });
    </script> 
@endsection

@section('content')
    @if($index->count() > 0)
        <div class="row">
            <div class="col-lg-6 mx-auto mt-5 text-center   justify-content-center d-flex flex-column"  style="height: 60vh;">
                <div class=" font-weight-bold text-uppercase choose">
                    Choose a campus: 
                </div>
                <div class="campus-buttons">
                    @if($index != null)
                        @foreach($index as $campus)
                            <a href="{{ route('menu', $campus) }}" class="btn btn-black btn-pill d-block mx-auto my-3 comic-font campus-button">{{ $campus->name }}</a> 
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    @else 
        <div class="row d-flex" >
            <div class="col">
                <h1 class="font-weight-bold text-black welcome" style="font-size: 72px; line-height: 85px;">Welcome to <img src="{{ asset('images/icon-logo-leaf.png') }}" width="60px" />CafTayo!</h1> 
                <span class="d-inline-block w-75" style="font-size: 1.2rem">
                    Thank you for choosing our product &#127881  Now that you have CafTayo in your hands, let's get started!
                </span> 
            </div> 
        </div>
        <div class="row mt-5">
            <div class="col-lg-6">
                <h3 class="font-weight-bold text-black">🐜Quick Setup</h3> 
            </div> 
        </div>
    @endif 
@endsection

