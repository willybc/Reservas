<div class="pjShBBody">
    @if($spaces->isEmpty())
        <p>{{ __('No assets found.') }}</p>
    @else
        <ul class="list-unstyled pjShBReservations">
            @foreach($spaces as $space)
                @php
                    $image_url = asset('images/default-image.png');
                    if (!empty($space->image)) {
                        $image_url = asset('storage/' . $space->image);
                    }
                @endphp
                <li class="pjShBReservation">
                    <div class="thumbnail">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12 pjShBReservationImage">
                                <a href="#" class="pjShBNewReservation" data-id="{{ $space->id }}">
                                    <img class="img-fluid" src="{{ $image_url }}" alt="" />
                                </a>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12 pjShBReservationContent">
                                <p class="pjShBReservationTitle">
                                <a href="{{ route('space.show', ['id' => $space->id]) }}" class="pjShBNewReservation" data-id="{{ $space->id }}">
                                        {{ $space->title }}
                                    </a>
                                </p>
                                <p>{{ Str::limit($space->description, 400) }}</p>
                                @if(!empty($space->dt_from) && !empty($space->dt_to))
                                    @php
                                        $dt_from = \Carbon\Carbon::parse($space->dt_from)->format('d-m-Y, H:i');
                                        $dt_to = \Carbon\Carbon::parse($space->dt_to)->format('d-m-Y, H:i');
                                    @endphp
                                    <dl class="dl-horizontal pjShBReservationMeta">
                                        <dt>{{ __('front_my_reservation') }}:</dt>
                                        <dd>{{ $dt_from }} - {{ $dt_to }}</dd>
                                    </dl>
                                @endif
                                <div class="pjShBReservationActions">
                                    <a href="#" class="btn btn-primary pjShBNewReservation" data-id="{{ $space->id }}">
                                        New reservation
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>