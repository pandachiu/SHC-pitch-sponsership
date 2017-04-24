@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-sm-9">
        <div class="pitch">
            @foreach ($properties as $property_row)
                <div class="pitch__row">
                    @foreach ($property_row as $property)
                        @if ($property->is_available)
                            <div class="pitch__property">
                        @else
                            <div class="pitch__property pitch__property--taken">
                        @endif
                            {{ $property->id }}
                        </div>
                    @endforeach
                </div>
            @endforeach
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection

