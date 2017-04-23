@extends('layouts.master')

@section('content')
<div class="pitch">
    @isset (@properties)
        @foreach ($properties as $property_row)
            <div class="row">
                @foreach ($property_row as $property)
                    @if ($property->is_available)
                        <div class="col-xs-1 pitch__property">
                    @else
                        <div class="col-xs-1 pitch__property pitch__property--taken">
                    @endif
                        {{ $property->id }}
                    </div>
                @endforeach
            </div>
        @endforeach
    @endisset
</div>
@endsection

