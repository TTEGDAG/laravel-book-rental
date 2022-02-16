@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-3 col-sm-4">
            menu
        </div>
        <div class="col-lg-9 col-md-9 col-sm-4">

            <div class="row">

                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="card-deck">
                        <div class="card">
                            <img src="" class="card-img-top img-responsive" alt="">
                            <div class="card-body">
                                <h5 class="card-title">Tytuł książki</h5>
                                <p class="card-text">autor</p>
                            </div>
                            <div class="card-footer">
                                <small class="test-muted">kategoria</small>
                            </div>
                            <div>&nbsp;</div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-succes btn-rounded btn-block">Szczegóły</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="alert alert-icon alert-white alert-info alert-dismissble fade in" role="alert">
                <i class="mdi mdi-infrmation"></i>
                <strong>Przykro nam</strong>Obecnie nie posiadamy książek w naszych zbioirach
            </div>

        </div>
    </div>
</div>
@endsection
