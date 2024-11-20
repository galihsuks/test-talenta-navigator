<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->input('cari');
        $movies = Movie::where('title', 'like', "%$cari%")->get();
        foreach ($movies as $key => $value) {
            $movies[$key]['genres'] = implode(" / ", json_decode($value['genres'], true));
        }
        $data = [
            'cari' => $cari,
            'movies' => $movies
        ];
        return view('movies.index', $data);
    }
    public function detail($id)
    {
        $movie = Movie::find($id);
        $movie['genres'] = json_decode($movie['genres'], true);
        $data = ['movie' => $movie];
        return view('movies.detail', $data);
    }
    public function add()
    {
        return view('movies.add');
    }
    public function addAction(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'director' => 'required|string',
            'summary' => 'required|string|max:100',
        ]);
        $genres = [
            'Drama' => $request->drama,
            'Action' => $request->action,
            'Animation' => $request->animation,
            'Sci-fi' => $request->scifi,
            'Horror' => $request->horror,
        ];
        $genresArr = [];
        foreach ($genres as $key => $value) {
            if ($value) array_push($genresArr, $key);
        }
        Movie::create([
            'title' => $request->title,
            'director' => $request->director,
            'summary' => $request->summary,
            'genres' => json_encode($genresArr),
        ]);
        return redirect()->route('movies.index')->with('berhasil', 'Movie berhasil ditambahkan');
    }
    public function edit($id)
    {
        $movie = Movie::find($id);
        $movie['genres'] = json_decode($movie['genres'], true);
        $genres = [
            'drama' => in_array('Drama', $movie['genres']) ? true : false,
            'animation' => in_array('Animation', $movie['genres']) ? true : false,
            'scifi' => in_array('Sci-fi', $movie['genres']) ? true : false,
            'horror' => in_array('Horror', $movie['genres']) ? true : false,
            'action' => in_array('Action', $movie['genres']) ? true : false,
        ];
        $data = ['movie' => $movie, 'genres' => $genres];
        return view('movies.edit', $data);
    }
    public function editAction(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'director' => 'required|string',
            'summary' => 'required|string|max:100',
        ]);
        $genres = [
            'Drama' => $request->drama,
            'Action' => $request->action,
            'Animation' => $request->animation,
            'Sci-fi' => $request->scifi,
            'Horror' => $request->horror,
        ];
        $genresArr = [];
        foreach ($genres as $key => $value) {
            if ($value) array_push($genresArr, $key);
        }
        $movie = Movie::find($id);
        $movie->update([
            'title' => $request->title,
            'director' => $request->director,
            'summary' => $request->summary,
            'genres' => json_encode($genresArr),
        ]);
        return redirect()->route('movies.index')->with('berhasil', 'Movie berhasil diubah');
    }
    public function delAction($id)
    {
        $movie = Movie::find($id);
        $movie->delete();
        return redirect()->route('movies.index')->with('berhasil', 'Movie berhasil dihapus');
    }
}
