@extends('layout')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-1">
    <h1>Movies</h1>
    <div class="d-flex gap-1">
        <a href="{{ route('movies.add') }}" class="btn-icon"><i class="material-icons">add</i>
            <p>Add</p>
        </a>
    </div>
</div>
<form method="GET" action="{{ route('movies.index') }}">
    <div class="input-group mb-3">
        <input class="form-control" type="text" name="cari" value="{{ $cari }}" placeholder="Search by title">
        <button class="input-group-text" type="submit">Search</button>
        <!-- <span  id="basic-addon2">@example.com</span> -->
    </div>
</form>
<div class="d-flex flex-column gap-1">
    @if (count($movies) > 0)
    @foreach ($movies as $ind_m => $movie)
    <a href="{{ $movie->id }}" class="item-movie mx-3">
        <div>
            <p>{{ $movie->genres }}</p>
            <h3>{{ $movie->title }}</h3>
        </div>
        <p class="text-secondary">by {{ $movie->director }}</p>
    </a>
    @if ($ind_m != (count($movies) - 1))
    <hr class="my-2">
    @endif
    @endforeach
    @else
    <p>No movies found</p>
    @endif
</div>
@endsection