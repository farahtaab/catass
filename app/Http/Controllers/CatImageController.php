<?php

namespace App\Http\Controllers;

use App\Models\CatImage;
use Illuminate\Http\Request;

class CatImageController extends Controller
{
    public function index()
    {
        $cats = CatImage::paginate(12); // Mostrem 12 gats per pàgina
        return view('cats.index', compact('cats'));
    }
}
