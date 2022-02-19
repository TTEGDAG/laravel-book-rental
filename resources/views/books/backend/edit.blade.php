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
            <h4>Edytuj książkę</h4>
            <hr>

            <form method="post" action="{{route('book.update', ['id' => $book->id])}}"  enctype="multipart/form-data">
                @csrf 
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="title">Podaj tytuł</label>
                            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$book->title}}" required>
                            
                            @error('title')
                                <span class="invalid-feedback text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12" >
                        <div class="form-group">
                            <label>Dodaj opis</label>
                            <textarea name="description" class="summernote" >{{$book->description}}</textarea>

                            @error('description')
                                <span class="invalid-feedback text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12" style="margin-top: 50px;">
                        <h4>Dodatkowe informacje</h4>
                        <hr>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="/photo/{{$book->photo}}" height="150px" />
                                </div>
                                <div class="col-md-9">
                                    <label class="control-label">Dodaj okładkę</label>
                                    <input type="file" name="photo" class="filestyle" data-buttontext="Wybierz plik" data-buttonname="btn-default" id="filestyle-4" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" tabindex="-1">
                                </div>
                            </div>
                            @error('photo')
                                <span class="invalid-feedback text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="/images/pdf.jpg" height="150px" />
                                </div>
                                <div class="col-md-9">
                                    <label class="control-label">Dodaj plik PDF</label>
                                    <input type="file" name="file" class="filestyle" data-buttontext="Wybierz plik" data-buttonname="btn-default" id="filestyle-3" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" tabindex="-1">
                                </div>
                            
                            </div>
                            @error('file')
                                <span class="invalid-feedback text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <p>&nbsp;</p>
                            <label for="author">Wpisz autora</label>
                            <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" value="{{$book->author}}" required>
                            
                            @error('author')
                                <span class="invalid-feedback text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="category_id">Wybierz kategorię</label><br>
                            <p>Obecna kategoria: <b>{{$book->category->name}}</b></p>
                            <select name="category_id" class="form-control select2 category @error('category_id') is-invalid @enderror">
                                    
                                    <option selected disabled>wybierz kategorię</option>
                                    <option value="{{$book->category->id}}">{{$book->category->name}}</option>
                                    @foreach($category as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                   
                                
                               
                            </select>                    
                            @error('category_id')
                                <span class="invalid-feedback text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="pages">Podaj ilość stron</label>
                            <input type="text" name="pages" class="form-control @error('pages') is-invalid @enderror" value="{{$book->pages}}" required>
                            
                            @error('pages')
                                <span class="invalid-feedback text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="date">Data publikacji</label>
                            <div>
                                <div class="input-group">
                                    <input type="text" name="date" value="{{$book->date}}" class="form-control @error('pages') is-invalid @enderror" placeholder="mm/dd/yyyy" id="datepicker">
                                    <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                </div><!-- input-group -->
                            </div>
                        </div>
                    </div>

                    
                </div>

                <div class="form-group" style="margin-bottom: 50px;">
                    <button type="submit" class="btn btn-primary">Aktualizuj</button>
                </div>
                
            </form>
        </div>

            
        
    </div>
    <!-- end container -->

@endsection