<div id="resultContainer">
    @if($spaces->isEmpty())
        <p>{{ __('No assets found.') }}</p>
    @else
        <div class="row">
            @foreach($spaces as $space)
                @php
                    $image_url = asset('images/default-image.png');
                    if (! empty($space->image)) {
                        $image_url = asset('storage/' . $space->image);
                    }
                @endphp
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card-reserva" data-id="{{ $space->id }}">
                        <div class="card-reserva_header">
                            <h3>{{ $space->title }}</h3>
                            <span>
                                {{ $space->users->first()->name ?? 'Null' }}
                            </span>
                        </div>
                        <div class="card-reserva_body">
                            <div class="card-reserva_body__image-container">
                                <img src="{{ $image_url }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cards = document.querySelectorAll('.card-reserva');

        cards.forEach(card => {
            card.addEventListener('click', function () {
                const spaceId = this.getAttribute('data-id');
                window.location.href = `{{ url('/loadResource') }}/${spaceId}`;
            });
        });
    });
</script>


<style>
    .card-reserva {
        margin: 0 8px 8px 0;
        background-color: #eef2f7;
        transition: background-color .1s ease-in-out;
        break-inside: avoid;
        cursor: pointer;
    }

    .card-reserva_header {
        padding-top: 1rem;
        padding-bottom: 0.8rem;
        padding-left: 20px;
        border-bottom: 1px solid #eef2f7;
    }

    .card-reserva_header h3 {
        color: black;
        margin-bottom: 0;
        font-weight: 600;
        overflow: hidden;
        text-overflow: ellipsis;
        font-size: 18px;
        line-height: 1.1;
    }

    .card-reserva_header span {
        color: #333;
        opacity: .5;
        font-weight: 400;
        font-size: 12px;
    }

    .card-reserva_body {
        position: relative;
    }

    .card-reserva_body__image-container {
        position: relative;
        padding-top: 56.25%;
        transition: all .2s ease-in;
    }

    .card-reserva_body__image-container:hover {
        opacity: .8;
    }

    .card-reserva_body__image-container img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;

        border-radius: 7px;
    }

    .card-reserva_body__image-container:after {
        content: 'Reservar';
        display: flex;
        color: #fff;
        position: absolute;
        bottom: 20px;
        right: 20px;
        width: 72px;
        border-radius: 5px;
        justify-content: center;
        align-items: center;
        text-align: center;
        height: 36px;
        background: #000;
        transition: all 0.2s ease-in;
    }

    .card-reserva_body__image-container:hover:after {
        background: #bf9e51;
    }
</style>