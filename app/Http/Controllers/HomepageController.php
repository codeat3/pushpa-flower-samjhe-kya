<?php

namespace App\Http\Controllers;

use App\Models\Dialogue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomepageController extends Controller
{
    public function index(Request $request) {
        return Redirect::to(route('random-meme'));
    }

    public function random(Request $request) {
        $dialogue = Dialogue::inRandomOrder()->first();
        return view('welcome', [
            'dialogue' => $dialogue,
            'type' => 'random',
        ]);
    }

    public function meme(Request $request, $slug)
    {
        $dialogue = Dialogue::whereSlug($slug)->first();
        return view('welcome', [
            'dialogue' => $dialogue,
            'type' => 'random',
        ]);
    }
}
