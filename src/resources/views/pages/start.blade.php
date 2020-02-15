@extends('layouts.template')

@section('content')

<div id="map" data-address="{{ config('maps.ADDRESS') }}"></div>

<div class="container mt-3">
    @include('layouts.admin_panel')
    <div id="forms-area">
        @include('forms.participants_fomrs')
    </div>
</div>

@endsection

@push('scripts')
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('maps.GOOGLE_API_KEY') }}&language=en&callback=initMap"></script>
@endpush