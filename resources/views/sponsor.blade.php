@extends('layouts.master')

@section('content')


<div class="pitch">

    @for ($i = 0; $i < 14; $i++)
    <div class="pitch_row">
        @for ($j = 0; $j < 12; $j++)
            <div class="pitch__property"></div>
        @endfor
    </div>
    @endfor

</div>
@endsection

