@extends('layouts.admin')

@section('content')
    <section class="container">
        <h1 class="text-center">{{ $technology->name }}</h1>
        <ul>
            @forelse ($technology->projects as $project)
                <li><a href="{{ route('admin.projects.show', $project) }}">{{ $project->title }}</a></li>
            @empty
                <li>Nessun Progetto</li>
            @endforelse
        </ul>
    </section>
@endsection
