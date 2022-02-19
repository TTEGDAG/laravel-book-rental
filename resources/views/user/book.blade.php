@extends('layouts.app')

@section('content')

    <div class="container">
            <div class="col-md-3">
                <div><h3>Tytuł książki</h3></div>
                <div>Kategoria:&nbsp;&nbsp;</div>
                <div>Autor:&nbsp;&nbsp;</div>
                <div>Ilość stron:&nbsp;&nbsp;</div>
                <div>Data publikacji:&nbsp;&nbsp;</div>
                <div style="margin-top: 30px;"><img class="rounded" src="#" height="300px"/></div>
            </div>

            <div class="col-md-9">
                <object data="#" width="100%" height="650"></object>
            </div>
    </div>
    <!-- end container -->

@endsection
