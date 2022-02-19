<div class="card-box">
    <div class="text-center">
        @if( $user->photo )
            <img src="/images/users/{{ $user->photo }}" class="img-circle img-thumbnail" alt="user-img" width="120" height="120">
        @else
            <img src="/images/users/avatar.jpg" class="img-circle img-thumbnail" alt="user-img" width="120" height="120">
        @endif
        <h4 class="m-b-5">{{ $user->name }}</h4>
        <p class="text-muted m-b-5"><i>{{ $user->role->name }}</i></p>
        <p class="text-muted m-b-5"><a href="#">Edytuj dane</a></p>
    </div>
    
    <div class="m-b-20">
        <strong>Imię i nazwisko</strong>
        <br>
        <p class="text-muted">{{ $user->firstname }} {{ $user->lastname }}</p>
    </div>
    
    <div class="m-b-20">
        <strong>Email</strong>
        <br>
        <p class="text-muted">{{ $user->email }}</p>
    </div>
    <div class="m-b-20">
        <strong>Data dołączenia</strong>
        <br>
        <p class="text-muted">{{ $user->created_at }}</p>
    </div>

</div>