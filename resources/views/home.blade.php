@extends('layouts.app')

@section('content')
    <div class="container">
        <x-filters.filter :isAdmin="false" :users="$users"/>

        @include('spaces.spaces')
    </div>
@endsection