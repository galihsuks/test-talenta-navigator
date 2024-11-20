@extends('layout')
@section('content')
<div class="d-flex justify-content-between align-items-start mb-1">
    <div>
        <h1 class="mb-1">{{ $movie->title }}</h1>
        <p style="color: var(--hijau)">Directed by {{ $movie->director }}</p>
    </div>
    <div class="d-flex gap-1">
        <a href="{{ route('movies.edit', $movie->id) }}" class="btn-icon"><i class="material-icons">edit</i>
            <p>Edit</p>
        </a>
        <form method="POST" action="{{ route('movies.delact', $movie->id) }}">
            @csrf
            <button type="submit" class="btn-icon outline"><i class="material-icons">delete</i>
                <p>Hapus</p>
            </button>
        </form>
    </div>
</div>
<h5>Summary</h5>
<p>{{ $movie->summary }}</p>
<h5>Genres</h5>
<div class="d-flex gap-1">
    @foreach ($movie->genres as $genre)
    <span class="genre">{{ $genre }}</span>
    @endforeach
</div>
@endsection