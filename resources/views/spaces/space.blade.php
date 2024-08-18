@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row-space">
        <div class="col-6">
            @php
                $image_url = asset('images/default-image.png');
                if (! empty($space->image)) {
                    $image_url = asset('storage/' . $space->image);
                }
            @endphp
            <img src="{{ $image_url }}" alt="" class="img-fluid">
        </div>
        <div class="col-6">
            <h1>{{ $space->title }}</h1>
            <p>{{ Str::limit($space->description, 400) }}</p>
            @auth
            <a href="#" class="btn btn-primary pjShBNewReservation" data-id="{{ $space->id }}">
                New reservation
            </a>
            @endauth
        </div>

        <div class="col-6">
            calendar    
        </div>
    </div>
</div>
@endsection

<style>
    .row-space .col-6{
        margin-bottom: 2rem;
    }
</style>