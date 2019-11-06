@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mosaic">
            <div class="mosaic__row">
                @for ($i = 0; $i < count($animals); $i+=3)
                    @include('animals.tile', ['animal' => $animals[$i]])
                @endfor
            </div>
            <div class="mosaic__row">
                @for ($i = 1; $i < count($animals); $i+=3)
                    @include('animals.tile', ['animal' => $animals[$i]])
                @endfor
            </div>
            <div class="mosaic__row">
                @for ($i = 2; $i < count($animals); $i+=3)
                    @include('animals.tile', ['animal' => $animals[$i]])
                @endfor
            </div>
        </div>
    </div>
@endsection
