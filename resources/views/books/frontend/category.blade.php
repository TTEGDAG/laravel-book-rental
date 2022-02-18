
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2 col-sm-3">
                @include('books.frontend.menu')
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9">
                
                @if(count($books) > 0)
                    <div class="row">
                        @foreach($books as $book)
                            <div class="col-lg-2 col-md-3 col-sm-6" style="margin: 10px 0px;">
                                <div class="card-deck">
                                    <div class="card">
                                        <img src="/photo/{{$book->photo}}" class="card-img-top img-responsive" alt="tytuł książki">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ substr($book->title,0,20) }}</h5>
                                            <p class="card-text">{{ $book->author }}</p>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted">{{$book->category->name}}</small>
                                        </div>
                                        <div>&nbsp;</div>
                                        <div class="card-footer" style="margin-bottom: 2px;">
                                            <a href="route('show', ['id' => $book->id])" class="btn btn-success btn-rounded btn-block">Szczegóły</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-icon alert-white alert-danger alert-dismissible fade in" role="alert">
                        <i class="mdi mdi-information"></i>
                        <strong>Przykro nam.</strong>&nbsp;&nbsp;Brak książek w tej kategorii.
                    </div>

                    <h4 style="margin-top: 35px; border-bottom: 2px solid #f5f5f5; padding-bottom: 5px;">Zobacz inne propozycje</h4>
                    <div class="row">
                        @foreach($similarbook as $similar)
                            <div class="col-lg-2 col-md-3 col-sm-6" style="margin: 10px 0px;">
                                <div class="card-deck">
                                    <div class="card">
                                        <img src="/photo/{{$similar->photo}}" class="card-img-top img-responsive" alt="tytuł książki">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ substr($similar->title,0,20) }}</h5>
                                            <p class="card-text">{{$similar->author}}</p>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted">{{$similar->category->name}}</small>
                                        </div>
                                        <div>&nbsp;</div>
                                        <div class="card-footer" style="margin-bottom: 2px;">
                                            <a href="route('show', ['id' => $similar->id])" class="btn btn-success btn-rounded btn-block">Szczegóły</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                
                {{ $books->links()}}
            </div>
        </div> <!-- end row -->
    </div>
    <!-- end container -->

@endsection


