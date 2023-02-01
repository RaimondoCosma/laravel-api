@extends('layouts.admin')

@section('content')
    <section class="container">
        <h1 class="text-center">Lista Technologies</h1>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div>
            <a class="btn btn-success" href="{{ route('admin.technologies.create') }}">Aggiungi Technology</a>
        </div>
        <table class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Dettagli</th>
                    <th scope="col">Modifica</th>
                    <th scope="col">Cancella</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($technologies as $technology)
                    <tr>
                        <th scope="row">{{ $technology->id }}</th>
                        <td>{{ $technology->name }}</td>
                        <td>{{ $technology->slug }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.technologies.show', $technology) }}"><i
                                    class="fa-regular fa-eye"></i></a>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('admin.technologies.edit', $technology) }}"><i
                                    class="fa-solid fa-pencil"></i></a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modal-{{ $technology->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <div class="modal" id="modal-{{ $technology->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Cancella</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Sicuro di voler cancellare il Tag {{ $technology->name }}?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                    <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST"
                                        class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary">Si</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
