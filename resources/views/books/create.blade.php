@extends('layouts.app')
@section('title','Novo Livro')
@section('content')
<form method="POST" action="{{ route('books.store') }}">
  @csrf
  @include('books._form', ['book'=>null])
  <button class="btn btn-primary">Salvar</button>
</form>
@endsection
