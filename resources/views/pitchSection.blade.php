@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <h1>Pick a square</h1>

        <p>Please pick a square below, the highlighted squares have already been chosen by a kind sponsor.</p>
        <p><strong>Remember to edit your profile to have your initials on the your pitch square</strong></p>
        <p>For donations/sponsorships of over &pound;40, please email <a href="mailto:chairman@staffordhc.co.uk">chairman@staffordhc.co.uk</a></p>

        <div class="pitch" style="background-image: url('/assets/pitch/{{ $sectionId }}.jpeg')">
            @foreach ($properties as $property_row)
                <div class="pitch__row">
                    @foreach ($property_row as $property)
                        @if ($property->is_available)
                            @if ($property->highlight)
                                <a class="pitch__property pitch__property--highlight" href="{{ route('square.display', ['id' => $property->id]) }}">
                            @else
                                <a class="pitch__property" href="{{ route('square.display', ['id' => $property->id]) }}">
                            @endif
                        @else
                            <a class="pitch__property pitch__property--taken" href="{{ route('square.display', ['id' => $property->id]) }}">
                        @endif

                        @if (count($property->user) === 1)
                            <span class="pitch__owner">{{ $property->user->display_name }}</span>
                        @endif

                        </a>
                    @endforeach
                </div>
            @endforeach
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection

