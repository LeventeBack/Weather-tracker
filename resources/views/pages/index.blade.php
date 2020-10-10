@extends('layouts.app')

@section('content')
    <h1 class="text-center"> ~ Features ~</h1>
    <div class="features-container m-5">
        <div class="feature-box text-center">
            <i class="fas fa-clock feature-icon"></i>
            <h4 class="text-center feature-title">24/7 access</h4>
            <p class="feature-text">Access your data from anywhere, anytime, from your preffered device.</p>
        </div>
        <div class="feature-box text-center">
            <i class="fas fa-lock feature-icon"></i>
            <h4 class="text-center feature-title">Security</h4>
            <p class="feature-text">Keep your data safe with our secure authentification sistem</p>
        </div>
        <div class="feature-box text-center">
            <i class="fas fa-thermometer-half feature-icon"></i>
            <h4 class="text-center feature-title">Data diversity</h4>
            <p class="feature-text">Track the air temperature, humidity and pressure of your location.</p>
        </div>        
        <div class="feature-box text-center">
            <i class="fas fa-chart-line feature-icon"></i>
            <h4 class="text-center feature-title">Data Charts</h4>
            <p class="feature-text">See the daily datas on descriptive data charts.</p>
        </div>
        <div class="feature-box text-center">
            <i class="fas fa-wifi feature-icon"></i>
            <h4 class="text-center feature-title">Live Updates</h4>
            <p class="feature-text">The data is always up to date for a better experience.</p>
        </div>

        <div class="feature-box text-center">
            <i class="fas fa-bullhorn feature-icon"></i>
            <h4 class="text-center feature-title">Error bounderies</h4>
            <p class="feature-text">Set error bounderies and track the unusual changes.</p>
        </div>
    </div>
    @if (!auth()->check())
    <div class="m-5 text-center">
        <a href="/register" class="btn btn-danger px-5 py-2" ><h4>Register Now</h4></a>
    </div>
    @endif
@endsection

@section('banner')
    @if (!auth()->check())
        <div class="banner mb-5">
            <h1 class="banner-title">Welcome to Weather Tracker</h1>
            <h3>by Back István Levente</h3>
        </div>
    @else
    <div class="banner mb-5">
    <h1 class="banner-title">Welcome back, {{auth()->user()->name}}!</h1>
    </div>
    @endif
@endsection

