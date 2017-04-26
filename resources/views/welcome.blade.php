@extends('layouts.master')

@section('content')
<!-- Jumbotron -->
<div class="jumbotron jumbotron--branded">
    <h1>Sponsor Stafford Hockey Club</h1>
    <p class="lead">After a 5 year battle for planning permission, SHC finally have succeeded. Help SHC fund their new astroturf pitch now!</p>
    <p><a class="btn btn-lg btn-primary" href="{{ route('sponsor') }}" role="button">Sponsor us now</a></p>
</div>

<!-- Example row of columns -->
<div class="row">
    <div class="col-md-4">
        <h2>1. Register</h2>
        <p>Sign up with our pitch sponsorship website and support your local hockey club now.</p>
        <p><a class="btn btn-primary" href="/register   " role="button">Register &raquo;</a></p>
    </div>
    <div class="col-md-4">
        <h2>2. Select</h2>
        <p>Use our pitch navigator and choose one or more square of our pitch to sponsor. </p>
        <p><a class="btn btn-primary" href="{{ route('sponsor') }}" role="button">View details &raquo;</a></p>
    </div>
    <div class="col-md-4">
        <h2>3. Sponsor</h2>
        <p>Sponsor your chosen square(s) and you shall forever be immortalised online on this website as sponsoring Stafford Hockey's new astroturf pitch. It's yours forever!</p>
    </div>
</div>
@endsection
