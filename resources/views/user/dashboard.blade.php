@extends('layouts.backend.master')
@section('title')
    Tourist Guide - Dashboard
@endsection
@section('content')
<div class="container">
    <div class="row pt-5">
        <h2 class="m-auto" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">
            <strong> User Dashboard</strong>
            @if(Auth::check())
                <p>Welcome, {{ Auth::user()->name }}!</p>
            @else
                <p>Welcome, Guest!</p>
            @endif
        </h2>
    </div>
</div>
 @endsection
