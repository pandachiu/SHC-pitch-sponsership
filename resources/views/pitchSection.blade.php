@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <h1>Pick a square</h1>

        <p>Please pick a square below, the highlighted squares have already been chosen by a kind sponsor.</p>

        <div class="pitch">
            @foreach ($properties as $property_row)
                <div class="pitch__row">
                    @foreach ($property_row as $property)
                        @if ($property->is_available)
                            <a class="pitch__property" href="{{ route('square.display', ['id' => $property->id]) }}">
                        @else
                            <a class="pitch__property pitch__property--taken" href="{{ route('square.display', ['id' => $property->id]) }}">
                        @endif

                        @if (count($property->user) === 1)
                            <span class="pitch__owner">{{ $property->user->signature }}</span>
                        @endif

                        </a>
                    @endforeach
                </a>
            @endforeach
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection

