@extends('layouts.master')

@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<ul class="breadcrumb">
    <li><a href="/">Home</a></li>
    <li><a href="{{ route('sponsor') }}">Pitch</a></li>
    <li><a href="{{ route('pitchSection', ['id' => $property->section_id]) }}">Pitch Section {{$property->section_id}}</a></li>
    <li class="active">Square {{$property->id}}</li>
</ul>

<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">Sponsor Information</div>
            <div class="panel-body">
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        @if (Auth::check())
        <div class="panel panel-default">
            <div class="panel-heading">Add to basket</div>
            <div class="panel-body">
                <form action="{{ route('square.add', ['id' => $property->id]) }}" method="post">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-success">
                        Add to Basket <span class="fa fa-play"></span>
                    </button>
                </form>
            </div>
        </div>
        @else
        <div class="panel panel-default">
            <div class="panel-heading">Sign in</div>
            <div class="panel-body">
                Please <a href="/login">Sign in</a> or <a href="/register">Register</a> in order to add this square for sponsorship.
            </div>
        </div>
        @endif
    </div>
</div>


@endsection

