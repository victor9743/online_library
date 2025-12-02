@extends('layouts.app')
@section('title','Editar Livro')
@section('content')
    <form method="POST" action="{{ route('books.update', $book) }}">
        @csrf @method('PUT')
        @include('books._form')
        <div class="d-flex justify-content-end">
            <a href="{{ route('books.index') }}" class="btn btn-secondary mx-2">Back</a>
            <button class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
