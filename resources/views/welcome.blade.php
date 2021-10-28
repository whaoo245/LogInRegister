@extends('layouts.layout')

@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <img src="/img/Coffee_Logo.jpg" alt="Coffee House logo" 
        style="object-fit:scale-down;
            width:400px;
            height:400px;
            border: solid 3px #CCC">
        <div class="title m-b-md">
            The AWAKENING Coffee Shop
        </div>
    </div>
</div>
@endsection