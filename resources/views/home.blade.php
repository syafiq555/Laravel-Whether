@extends('layouts.app')

@push('styles')
@endpush

@section('content')
<div class="container">
    <h1 class="text-white">Kuala Lumpur</h1>
    <h3 class="text-white">Malaysia</h3>
    <section class="weathersContainer">
        <div class="card">
            <div class="card-header">
                {{ today()->format('d F Y') }}
            </div>
            @foreach ($weathers as $weather)
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                            <p class="m-0">
                                <i class="fa fa-arrow-circle-down text-danger" aria-hidden="true"></i> {{ $weather->min_temp }}
                                <br>
                                <i class="fa fa-arrow-circle-up text-primary" aria-hidden="true"></i> {{ $weather->max_temp }}
                            </p>
                            <p class="m-0">{{ $weather->created }}</p>
                            <div class="d-flex align-items-center"
                                <p class="m-0">{{ $weather->abbr }}</p>
                                <img height="35px" class="pl-1" src="{{ env('API_URL') }}static/img/weather/{{ $weather->icon }}.svg" alt="icon">
                            </div>
                        </div>
                    </li>
                </ul>
            @endforeach
        </div>
    </section>
</div>
@endsection

@push('scripts')
    <script>
    </script>
@endpush
