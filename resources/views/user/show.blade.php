@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-3 col-sm-4">
            @include('user.menu')
        </div>

        <div class="col-md-9 col-sm-8">
            
            <div class="alert alert-icon alert-warning alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <i class="mdi mdi-alert"></i>
                <strong>Informacja!</strong> Wszystkie książki wypożyczone są na okres 30 dni od daty wypożyczenia. Po tym terminie będą one nie widoczne.
            </div>

            @if( count($book->books) > 0 )

                <h5 style="margin-bottom: 30px; border-bottom: 2px solid #f5f5f5; padding-bottom: 5px">Obecnie posiadasz wypożyczonych książek: <span class="text-warning">{{ count($book->books) }}</span></h5>

                    @foreach( $book->books as $b)
                        @if( time() < $b->pivot->date_rent)
                            <div class="col-lg-2 col-md-3 col-sm-6" style="margin: 10px 0px;">
                                <div class="card-deck">
                                    <div class="card">
                                        <img src="\photo\{{$b->photo}}" class="card-img-top img-responsive" alt="tytuł książki">
                                        <div class="card-body">
                                        <h5 class="card-title"><a href="{{ route('account.user.book', ['id' => $b->id]) }}">{{ $b->title }}</a></h5>
                                            <p class="card-text">{{ $b->author }}</p>
                                        </div>
                                        <div>&nbsp;</div>
                                    </div>
                                </div>
                            </div>
                        @endif    
                    @endforeach
                @else
                    <div class="alert alert-icon alert-white alert-danger alert-dismissible fade in" role="alert">
                        <i class="mdi mdi-information"></i>
                        <strong>Niestety.</strong>&nbsp;&nbsp;Nie masz jeszcze wypożyczonych książek.
                    </div>
                @endif
        </div>

            
        
    </div>
    <!-- end container -->

@endsection
