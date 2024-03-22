@extends('layouts.app')

@section('subtitle', 'Welcome')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Welcome')

{{-- Content body --}}
@section('content_body')
    <p>Welcome to this beautiful admin panel</p>
@stop

{{-- Push extra CSS --}}
@push('css')
    
@endpush

{{-- Push extra script --}}
@push('js')
    <script>
        console.log('Hi, I am using AdminLTE package');
    </script>
@endpush