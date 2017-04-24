@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-10 col-md-offset-1">
        @if (count($basketItems) > 1)
            <table class="table table-hover">
            <thead>
            <tr>
                <th>Product</th>
                <th></th>
                <th class="text-center"></th>
                <th class="text-center">Total</th>
                <th> </th>
            </tr>
            </thead>
            <tbody>
            @foreach($basketItems as $basketItem)
            <tr>
                <td class="col-sm-8 col-md-6">
                    <div class="media">
                        <div class="media-body">
                            <h4 class="media-heading"><a href="{{ route('square.display', ['id' => $basketItem->property->id]) }}">Square (co-ords {{$basketItem->property->column}}, {{$basketItem->property->row}})</a></h4>
                        </div>
                    </div>
                </td>
                <td class="col-sm-1 col-md-1" style="text-align: center">
                </td>
                <td class="col-sm-1 col-md-1 text-center"></td>
                <td class="col-sm-1 col-md-1 text-center"><strong>£{{$basketItem->property->price}}</strong></td>
                <td class="col-sm-1 col-md-1">
                    <a href="/removeItem/{{$basketItem->id}}">
                        <button type="button" class="btn btn-danger">
                            <span class="fa fa-remove"></span> Remove
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><h3>Total</h3></td>
                <td class="text-right"><h3><strong>£{{$total}}</strong></h3></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <a href="{{ route('sponsor') }}"><button type="button" class="btn btn-default">
                            <span class="fa fa-shopping-cart"></span> Sponsor more
                        </button>
                    </a>
                </td>
                <td>
                    <button type="button" class="btn btn-success">
                        Checkout <span class="fa fa-play"></span>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
        @else
            <p>Please add some Pitch Squares to sponsor. Please visit the
                <a href="{{ route('sponsor') }}">Pitch</a>
                to sponsor a square.
            </p>
        @endif

    </div>
</div>
@endsection

