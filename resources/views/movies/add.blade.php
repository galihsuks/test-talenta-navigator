@extends('layout')

@section('content')
<style>
    .container-genres input {
        display: none;
    }

    .container-genres label {
        display: block;
        width: fit-content;
        background-color: whitesmoke;
        padding: 0.4em 1em;
        border-radius: 2em;
        color: gray;
        cursor: pointer;
    }

    .container-genres input:checked+label {
        background-color: var(--hijaumuda1);
        color: var(--hijau);
    }
</style>

<h1 class="mb-3">Add Movie</h1>
<form method="POST" action="{{ route('movies.addact') }}">
    @csrf
    <div class="d-flex align-items-center mb-2">
        <div style="flex: 1;">
            <p class="m-0">Title</p>
        </div>
        <div style="flex: 4">
            <input class="form-control" type="text" name="title" value="{{ old('title') }}" required>
        </div>
    </div>
    @error('title')
    <div style="color: var(--merah);">{{ $message }}</div>
    @enderror

    <div class="d-flex align-items-center mb-2">
        <div style="flex: 1;">
            <p class="m-0">Director</p>
        </div>
        <div style="flex: 4">
            <input class="form-control" type="text" name="director" value="{{ old('director') }}" required>
        </div>
    </div>
    @error('director')
    <div style="color: var(--merah);">{{ $message }}</div>
    @enderror

    <div class="d-flex align-items-center mb-2">
        <div style="flex: 1;">
            <p class="m-0">Summary</p>
        </div>
        <div style="flex: 4">
            <textarea oninput="hitungSummary(event)" class="form-control" name="summary" required>{{ old('summary') }}</textarea>
            <div id="hitung-summary" style="font-size: small;" class="w-100 d-flex justify-content-end text-secondary">0/100</div>
            <script>
                const hitungSummaryElm = document.getElementById('hitung-summary')

                function hitungSummary(e) {
                    const panjangnya = e.target.value.length
                    hitungSummaryElm.innerHTML = panjangnya + '/100'
                }
            </script>
        </div>
    </div>
    @error('summary')
    <div style="color: var(--merah);">{{ $message }}</div>
    @enderror

    <div class="d-flex align-items-center mb-2">
        <div style="flex: 1;">
            <p class="m-0">Genres</p>
        </div>
        <div style="flex: 4" class="d-flex gap-1 container-genres">
            <input type="checkbox" name="action" id="action" {{ old('action') ? 'checked' : '' }}>
            <label for="action">Action</label>
            <input type="checkbox" name="drama" id="drama" {{ old('drama') ? 'checked' : '' }}>
            <label for="drama">Drama</label>
            <input type="checkbox" name="animation" id="animation" {{ old('animation') ? 'checked' : '' }}>
            <label for="animation">Animation</label>
            <input type="checkbox" name="scifi" id="scifi" {{ old('scifi') ? 'checked' : '' }}>
            <label for="scifi">Sci-Fi</label>
            <input type="checkbox" name="horror" id="horror" {{ old('horror') ? 'checked' : '' }}>
            <label for="horror">Horror</label>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn-icon" style="outline: none; border: none;">Add Movie</button>
    </div>
</form>
@endsection