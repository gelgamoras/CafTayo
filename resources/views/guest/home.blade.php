@extends('layouts.guest.app')

@section('scripts')
    <script src="{{ asset('js/textFit.min.js') }}"></script>
    <script>
        textFit(document.getElementsByClassName('campus-button'));
    </script>
@endsection

@section('content')
    <div class="row ">
        <div class="col-lg-6 mx-auto mt-5 text-center   justify-content-center d-flex flex-column"  style="height: 60vh;">
            <div class=" font-weight-bold text-uppercase choose">
                Choose a campus: 
            </div>
            <div class="campus-buttons">
                @if($index != null)
                    @foreach($index as $campus)
                        <a href="#" class="btn btn-black btn-pill d-block mx-auto my-3 comic-font campus-button">{{ $campus->name }}</a> 
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection

