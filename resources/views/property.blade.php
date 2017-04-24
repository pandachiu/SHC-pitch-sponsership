@extends('layouts.master')

@section('content')
<ul class="breadcrumb">
    <li><a href="/">Home</a></li>
    <li><a href="/sponsor">Pitch</a></li>
    <li><a href="/pitch/{{$property->section_id}}">Pitch Section {{$property->section_id}}</a></li>
    <li class="active">Square {{$property->id}}</li>
</ul>
@endsection

