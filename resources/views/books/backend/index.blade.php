@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card-box">
                <h4 class="m-b-5">Menu</h4>
                <hr>
                @include('books.backend.menu')
            </div>
        </div>

        <div class="col-lg-9 col-md-9 col-sm-12">
            <table class="table m-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Foto</th>
                        <th>Tytuł</th>
                        <th>Kategoria</th>
                        <th>Autor</th>
                        <th>Ilość stron</th>
                        <th>Data publikacji</th>
                        <th>Akcja</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <th>{{ $book->id }}</th>
                            <td><img src="/photo/{{ $book->photo }}" height="80px" /></td>
                            <td><a href="{{route('book.show', ['id' => $book->id])}}">{{ $book->title }}</a></td>
                            <td>{{ $book->category->name }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->pages }}</td>
                            <td>{{ $book->date }}</td>
                            <td><a href="{{route('book.edit', ['id' => $book->id])}}"><i class="ti-pencil"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <br />    

            {{$books->links()}}
            
        </div>

            
        
    </div>
    <!-- end container -->

@endsection
