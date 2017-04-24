@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-sm-9">
        <div class="pitch" style="background-image:url('/assets/rsz_tmp786975523094921217.jpg')">
            @for ($i = 0; $i < 4; $i++)
            <div class="pitch_row">
                @for ($j = 1; $j <= 8; $j++)
                    <a href="/pitch-section/{{ $j+(8*$i) }}" class="pitch__property"></a>
                @endfor
            </div>
            @endfor
            <div class="clearfix"></div>
        </div>
    </div>
</div>

@endsection

