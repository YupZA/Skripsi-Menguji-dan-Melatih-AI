@extends('layouts.navbar_dashboard')

@section('title', 'Latih AI Pose')

@section('content')
    
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/latih-ai/latih-pose.css') }}">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/pose-detection"></script>
    <script src="{{ asset('js/latih-ai/latih-pose.js') }}"></script>
@endpush