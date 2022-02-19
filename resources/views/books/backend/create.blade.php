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
            <h4>Dodaj książkę</h4>
            <hr>

            <form method="post" action="{{ route('book.store')}}"  enctype="multipart/form-data">
                @csrf 
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="title">Podaj tytuł</label>
                            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="" required>
                            
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
                            <textarea name="description" class="summernote" > </textarea>

                            @error('description')
                                <span class="invalid-feedback text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <h4>Dodatkowe informacje</h4>
                        <hr>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Dodaj okładkę</label>
                            <input type="file" name="photo" class="filestyle" data-buttontext="Wybierz plik" data-buttonname="btn-default" id="filestyle-4" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" tabindex="-1" required>
                            
                            @error('photo')
                                <span class="invalid-feedback text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Dodaj plik PDF</label>
                            <input type="file" name="file" class="filestyle" data-buttontext="Wybierz plik" data-buttonname="btn-default" id="filestyle-3" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" tabindex="-1" required>
                            
                            @error('file')
                                <span class="invalid-feedback text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="author">Wpisz autora</label>
                            <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" value="" required>
                            
                            @error('author')
                                <span class="invalid-feedback text-danger" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="category_id">Wybierz kategorię</label>
                            <select name="category_id" class="form-control select2 category @error('category_id') is-invalid @enderror">
                                    
                                    <option selected disabled>wybierz kategorię</option>
                                    @foreach($category as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
									{{-- <option selected disabled>wybierz kategorię</option>
                                    <option value="2">biografie</option>
                                    <option value="3">biznes, ekonomia, marketing</option>
                                    <option value="4">dla dzieci</option>
                                    <option value="5">dla młodzieży</option>
                                    <option value="6">fantasy</option>
                                    <option value="7">historia</option>
                                    <option value="8">horror</option>
                                    <option value="9">informatyka</option>
                                    <option value="10">komiks</option>
                                    <option value="11">kryminał, sensacja, thriller</option> --}}
                                 
                                   
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
                            <input type="text" name="pages" class="form-control @error('pages') is-invalid @enderror" value="" required>
                            
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
                                    <input type="text" name="date" class="form-control @error('pages') is-invalid @enderror" placeholder="mm/dd/yyyy" id="datepicker">
                                    <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                </div><!-- input-group -->
                            </div>
                        </div>
                    </div>

                    
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Dodaj</button>
                </div>
                
            </form>
        </div>

            
        
    </div>
    <!-- end container -->

@endsection