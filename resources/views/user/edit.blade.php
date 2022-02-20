@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-3 col-sm-4">
            @include('user.menu')
        </div>

        <div class="col-md-9 col-sm-8">
            
            <form method="post" action="{{route('account.user.update', ['id' => $user->id])}}" enctype="multipart/form-data">

                @csrf

                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="form-group">
                        <label for="firstname">Imię</label>
                        <input type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror" value="{{$user->firstname}}" required>
                        
                        @error('firstname')
                            <span class="invalid-feedback text-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="form-group">
                        <label for="lastname">Nazwisko</label>
                        <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{$user->lastname}}" required>
                        
                        @error('lastname')
                            <span class="invalid-feedback text-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="form-group">
                        <label for="email">Adres email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}" required>
                        
                        @error('email')
                            <span class="invalid-feedback text-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="form-group">
                        <label for="role_id">Rola</label>
                        <input type="text" name="role_id" class="form-control @error('role_id') is-invalid @enderror" value="{{$user->role->name}}" disabled>
                        
                        @error('role_id')
                            <span class="invalid-feedback text-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="form-group">
                        <label class="control-label">Dodaj zdjęcie profilowe</label>
                        <input type="file" name="photo" class="filestyle" data-buttontext="Wybierz plik" data-buttonname="btn-default" id="filestyle-4" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" tabindex="-1">
                        
                        @error('photo')
                            <span class="invalid-feedback text-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="form-group">
                        <label for="password">Podaj nowe hasło</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        
                        @error('password')
                            <span class="invalid-feedback text-danger" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
                    </div>
                </div>

            </form>
            
        </div>

            
        
    </div>
    <!-- end container -->

@endsection
