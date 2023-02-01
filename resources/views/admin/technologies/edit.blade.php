@extends('layouts.admin')

@section('content')
    <section class="container">
        <h1 class="text-center">Modifica: {{ $technology->name }}</h1>
        <form action="{{ route('admin.technologies.update', $technology) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nome*</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $technology->name) }}" placeholder="Inserisci nome">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Modifica</button>
        </form>
    </section>
@endsection
