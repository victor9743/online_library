@extends('layouts.app')
@section('title','New Book')
@section('content')
    <form method="POST" action="{{ route('books.store') }}">
        @csrf
        @include('books._form', ['book'=>null])
        <div class="d-flex justify-content-end">
            <a href="{{ route('books.index') }}" class="btn btn-secondary mx-2">Back</a>
            <button class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection
