@extends('layouts.admin')

@section('content')
    <section class="container">
        <h1 class="text-center">Aggiungi nuovo Tag:</h1>
        <form action="{{ route('admin.technologies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome*</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}" placeholder="Inserisci il Titolo">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Crea</button>
        </form>
    </section>
@endsection
