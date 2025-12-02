@extends('layouts.app')
@section('title','Books')
@section('content')
  <table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Value</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
      @foreach($books as $book)
      <tr>
        <td>{{ $book->title }}</td>
        <td>{{ $book->author->name }}</td>
        <td>{{ $book->category->name }}</td>
        <td>R$ {{ number_format($book->value,2,',','.') }}</td>
        <td>
            <span class="badge 
                @if($book->status == 'disponivel') 
                    text-bg-success
                @elseif($book->status == 'reservado')
                    text-bg-warning
                @elseif($book->status == 'indisponivel')
                    text-bg-danger
                @else
                    text-bg-secondary
                @endif">
                {{ \App\Models\Book::statuses()[$book->status] ?? $book->status }}
            </span>
        </td>
        <td>
            <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-info">Show</a>
            <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning">Edit</a>
            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Delete
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
        
                    <div class="modal-content">
                        <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Notice</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5>Are you sure you want to delete this book?</h5>
                                <br>
                                {{ $book->title }}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="d-flex justify-content-end">
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">New Book</a>
  </div>

  {{ $books->links() }}
@endsection
