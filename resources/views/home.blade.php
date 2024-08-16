@extends('layouts.app')

@section('content')
    <div class="container">
        <x-filters.filter :isAdmin="false" :isPageUsers="false" :users="$users"/>

        @include('spaces.spaces')
    </div>
@endsection