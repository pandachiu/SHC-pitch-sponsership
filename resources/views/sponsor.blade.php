@extends('layouts.master')

@section('content')
<div class="pitch">
    @foreach ($properties as $property_row)
        <div class="row">
            @foreach ($property_row as $property)
                <div class="col-xs-1 pitch__property">
                    {{ $property->id }}
                </div>
            @endforeach
        </div>
    @endforeach
</div>
@endsection

