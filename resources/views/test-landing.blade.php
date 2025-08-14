@extends('layouts.test')

@section('title', 'Test Page')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-blue-600 mb-4">Test Landing Page</h1>
    <p class="text-lg text-gray-600">Halaman test sederhana untuk memastikan blade template berfungsi dengan baik.</p>
    
    <div class="mt-8">
        <a href="/admin" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
            Masuk ke Admin
        </a>
    </div>
</div>
@endsection
