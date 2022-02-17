<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Kategorie</h3>
    </div>
    <div class="panel-body">

        <p><a href="{{ route('home') }}">Wszystkie kategorie</a></p>

        <hr>

        @foreach($categories as $category)
            <div>
                <a href="{{ route('category', ['id' => $category->id]) }}">{{ $category->name }}</a>
                <p class="text-muted" style="display: inline-block;">{{ $category->books_count }}</p>
            </div>
        @endforeach
    </div>
</div>