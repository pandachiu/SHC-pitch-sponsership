@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-sm-10">
        <h1>Sponsor our pitch</h1>

        <p>Please select an area of the pitch below.</p>
        <p><strong>Remember to edit your profile to have your initials on the your pitch square</strong>.</p>
        <p>For donations/sponsorships of over &pound;40, please email <a href="mailto:chairman@staffordhc.co.uk">chairman@staffordhc.co.uk</a>.</p>
    </div>
</div>
<div class="row">
    <div class="col-sm-1 text-center">
        <div class="row">
            <div class="col-xs-2 col-xs-offset-5 col-sm-12 col-sm-offset-0">
                <a href="/square/{{$homeGoal->id}}" class="goalmouth">
                    @if (count($homeGoal->user) === 1)
                        {{$homeGoal->user->display_name}}
                    @endif
                </a>
            </div>
        </div>
        <p class="visible-xs"> Home Goal </p>
    </div>
    <div class="col-sm-1 col-sm-push-10 text-center">
        <div class="row">
            <div class="col-xs-2 col-xs-offset-5 col-sm-12 col-sm-offset-0">
                <a href="/square/{{$awayGoal->id}}" class="goalmouth">
                    @if (count($awayGoal->user) === 1)
                        {{$awayGoal->user->display_name}}
                    @endif
                </a>
            </div>
        </div>
        <p class="visible-xs">Away Goal </p>
    </div>
    <div class="col-sm-10 col-sm-pull-1">
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
    </div>
</div>

@endsection

