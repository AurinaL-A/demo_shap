<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Report;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index() {
        $works = Work::where('user_id', Auth::user()->id)->get();
        $categories = Categorie::all();
        $userId = Auth::id();
        return view('reports.index', compact('works','categories', 'userId'));
    }

    public function create() {
        $reports = Work::all();
        $categories = Categorie::all();
        return view('reports.create', compact('reports','categories'));
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'path_img' => 'image|mimes:png,jpg,jpeg,gif|max:800',
        ]);

        $imageName = time() . '.' . $request['path_img']->extension();
        $request['path_img']->move(public_path('images'), $imageName);

        Work::create([
            'title' => $request->title,
            'path_img' => $imageName,
            "user_id" => Auth::user()->id,
            "categorie_id" => $request->categorie,
            "score" => "0",
        ]);

        return redirect()->route('dashboard');
    }

    public function update(Request $request) {
        $request->validate([
            'score' => ['required'],
            'id' => ['required']
        ]);

        Work::where('id', $request->id)->update([
            'score' => $request->score,
        ]);
        return redirect()->back();
    }
}
