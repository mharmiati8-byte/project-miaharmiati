@extends('layouts.app')
@section('title', $project->title)
@section('content')
    <div class="mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <img src="{{ asset('bootstrap-5.3.8-dist/images/'.$project->image) }}" alt="{{ $project->title }}" class="card-img-top" style="height: 400px; object-fit: cover;">
                    <div class="card-body">
                        <h2 class="card-title">{{ $project->title }}</h2>
                        <p class="text-muted">{{ $project->teknologi }}</p>
                        <p><strong>Status:</strong> {{ $project->status }}</p>
                        <p>{{ $project->description }}</p>
                        <a href="{{ route('projects') }}" class="btn btn-primary">Kembali ke Daftar Project</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection