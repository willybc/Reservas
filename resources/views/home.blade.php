@extends('layouts.app')

@section('content')
    <div class="container">
        @include('components.filters.filter')

        @include('spaces.spaces')
    </div>
@endsection