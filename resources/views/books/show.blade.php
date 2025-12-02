@extends('layouts.app')
@section('title','Detalhes do Livro')
@section('content')
  <div class="card">
    <div class="card-body">
      <h3>{{ $book->title }}</h3>
      <p><strong>Autor:</strong> {{ $book->author->name }}</p>
      <p><strong>Categoria:</strong> {{ $book->category->name }}</p>
      <p><strong>Valor:</strong> R$ {{ number_format($book->price,2,',','.') }}</p>
      <p><strong>Status:</strong> {{ \App\Models\Book::statuses()[$book->status] ?? $book->status }}</p>
      <p><strong>Descrição:</strong> {{ $book->description }}</p>
      <a href="{{ route('books.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
  </div>
@endsection
