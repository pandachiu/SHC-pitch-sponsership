@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-sm-9">
        <div class="pitch">
            @foreach ($properties as $property_row)
                <div class="pitch__row">
                    @foreach ($property_row as $property)
                        @if ($property->is_available)
                            <a class="pitch__property" href="{{ route('square.display', ['id' => $property->id]) }}">
                        @else
                            <a class="pitch__property pitch__property--taken" href="{{ route('square.display', ['id' => $property->id]) }}">
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

