@extends('layouts.app')
@section('title','Livros')
@section('content')
  <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Novo Livro</a>
  <table class="table table-bordered">
    <thead>
      <tr><th>Título</th><th>Autor</th><th>Categoria</th><th>Valor</th><th>Status</th><th>Ações</th></tr>
    </thead>
    <tbody>
      @foreach($books as $book)
      <tr>
        <td>{{ $book->title }}</td>
        <td>{{ $book->author->name }}</td>
        <td>{{ $book->category->name }}</td>
        <td>R$ {{ number_format($book->price,2,',','.') }}</td>
        <td>{{ \App\Models\Book::statuses()[$book->status] ?? $book->status }}</td>
        <td>
          <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-info">Ver</a>
          <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning">Editar</a>
          <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline-block;">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir?')">Excluir</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  {{ $books->links() }}
@endsection
