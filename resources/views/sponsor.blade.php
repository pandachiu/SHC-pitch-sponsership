@extends('layouts.master')

@section('content')


<div class="pitch">

    @for ($i = 0; $i < 10; $i++)
    <div class="pitch_row">
        @for ($j = 0; $j < 8; $j++)
        <div class="pitch__property"></div>
        @endfor
    </div>
    @endfor

</div>
@endsection

