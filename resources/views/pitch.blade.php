@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <h1>Sponsor our pitch</h1>

        <p>Please select an area of the pitch below.</p>

        <div class="pitch" style="background-image:url('/assets/rsz_tmp786975523094921217.jpg')">
            @for ($i = 0; $i < 4; $i++)
            <div class="pitch_row">
                @for ($j = 1; $j <= 8; $j++)
                    <a href="/pitch-section/{{ $j+(8*$i) }}" class="pitch__section"></a>
                @endfor
            </div>
            @endfor
            <div class="clearfix"></div>
        </div>

        <p><strong>Edit your profile to have your initials on the pitch square you sponsor!</strong></p>
    </div>
</div>

@endsection

