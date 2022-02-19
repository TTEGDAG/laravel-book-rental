@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-3 col-sm-4">
            @include('books.frontend.menu')
        </div>
        <div class="col-lg-9 col-md-9 col-sm-4">
            @if(count($books) >0)
                <div class="row">
                    @foreach($books as $book)
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="card-deck">
                                <div class="card">
                                    <img src="/photo/{{$book->photo}}" class="card-img-top img-responsive" alt="{{ $book->title }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $book->title }}</h5>
                                        <p class="card-text">{{ $book->autor }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="test-muted">{{$book->category->name}}</small>
                                    </div>
                                    <div>&nbsp;</div>
                                    <div class="card-footer">
                                        <a href="#" class="btn btn-primary btn-rounded btn-block">Szczegóły</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-icon alert-white alert-info alert-dismissble fade in" role="alert">
                    <i class="mdi mdi-infrmation"></i>
                    <strong>Przykro nam</strong>Obecnie nie posiadamy książek w naszych zbioirach
                </div>
            @endif

        </div>
    </div>
</div>
@endsection
