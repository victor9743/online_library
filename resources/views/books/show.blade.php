@extends('layouts.app')
@section('title','Book Details')
@section('content')
        <div class="d-flex justify-content-end">
            <span class="badge 
                @if($book->status == 'available') 
                    text-bg-success
                @elseif($book->status == 'reserved')
                    text-bg-warning
                @elseif($book->status == 'rented')
                    text-bg-danger
                @else
                    text-bg-secondary
                @endif">
                {{ \App\Models\Book::statuses()[$book->status] ?? $book->status }}
            </span>
        </div>
         
        <div class="mb-3">
            <label for="author">Author:</label>
            <input type="text" id="author" disabled value="{{ $book->author->name  }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="category">Category:</label>
            <input type="text" id="category" disabled value="{{ $book->category->name  }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="value">Value:</label>
            <input type="text" id="value" disabled value="{{ number_format($book->value,2,',','.')  }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="description">Description:</label>
            <textarea id="description" class="form-control" disabled>{{ $book->description }}</textarea>
        </div>

        <div class="d-flex justify-content-end">
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
        </div>
@endsection
