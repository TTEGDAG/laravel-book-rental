@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="col-md-12">
            <div class="col-md-3">
                <div><h3>{{ $book->title }}</h3></div>
                <div>Kategoria:&nbsp;&nbsp;{{ $book->category->name }}</div>
                <div>Autor:&nbsp;&nbsp;{{ $book->author }}</div>
                <div>Ilość stron:&nbsp;&nbsp;{{ $book->pages }}</div>
                <div>Data publikacji:&nbsp;&nbsp;{{ $book->date }}</div>
                <div style="margin-top: 30px;"><img class="rounded" src="/photo/{{ $book->photo }}" height="300px"/></div>
            </div>

            <div class="col-md-9">
                <object data="/pdf/{{ $book->file }}" width="100%" height="650"></object>
            </div>
        </div>

    </div>
    <!-- ./ container -->



@endsection