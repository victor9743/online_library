@extends('layouts.app')
@section('title','Editar Livro')
@section('content')
    <form method="POST" action="{{ route('books.update', $book) }}">
    @csrf @method('PUT')
    @include('books._form')
    <button class="btn btn-primary">Atualizar</button>
    </form>
@endsection
