@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2 col-sm-3">
                @include('books.frontend.menu')
            </div>
            <div class="col-md-9 col-sm-9">
                <div class="row">
                    <div class="col-md-4">
                        <img src="/photo/{{$book->photo}}" class="card-img-top img-responsive" alt="tytuł książki">
                        @auth 
                            <div style="margin-top: 30px;">
                                <form method="post" action="{{ route('book.rent') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-info btn-rounded btn-block">Wypożycz książkę</button>
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="book_id" value="{{$book->id}}">
                                    <input type="hidden" name="date_rent" value="<?php echo time() + (29*24*60*60) ?>">
                                </form>
                            </div>
                       @endauth
                       @guest
                            <div class="alert alert-icon alert-white alert-info alert-dismissible fade in" role="alert" style="margin-top: 30px;">
                                <i class="mdi mdi-information"></i>
                                <strong>Nie poddawaj się!</strong><br > Żeby wypożyczyć książkę musisz się <a href="{{route('login')}}">zalogować.</a>
                            </div>
                        @endguest
                    </div>
                    <div class="col-md-8">
                        <div><h1>{{$book->title}}</h1></div>
                        <div><h4>Autor:&nbsp;{{$book->author}}</h4></div>
                        <hr>
                        <div><p>Kategoria:&nbsp;{{$book->category->name}}</p></div>
                        <div><p>Data publikacji:&nbsp;{{$book->date}}</p></div>
                        <div><p>Ilość stron:&nbsp;{{$book->pages}}</p></div>
                        <div>Opis:&nbsp;{{$book->description}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end container -->

@endsection


