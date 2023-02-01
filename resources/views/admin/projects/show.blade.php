@extends('layouts.admin')

@section('content')
    <section class="container">
        @if ($project->thumb)
            <div class="text-center">
                <img class="w-25" src="{{ asset("storage/$project->thumb") }}" alt="{{ $project->title }}">
            </div>
        @endif
        <h1 class="text-center">{{ $project->title }}</h1>
        @if ($project->type)
            <h3 class="text-center"><strong>Tipologia</strong>:
                <a href="{{ route('admin.types.show', $project->type) }}">{{ $project->type->name }}</a>
            @else
                <h3 class="text-center"><strong>Nessuna Tipologia</strong>
        @endif
        @if ($project->technologies->isNotEmpty())
            <h3>Technology</h3>
            @foreach ($project->technologies as $technology)
                <span class="badge text-bg-primary">{{ $technology->name }}</span>
            @endforeach
        @endif
        <div class="my-4">

        </div>
        <h3 class="mt-4">Descrizione progetto:</h3>
        <p>{{ $project->description }}</p>
        <h3 class="mt-4">Slug del progetto</h3>
        <p>{{ $project->slug }}</p>
    </section>
@endsection
