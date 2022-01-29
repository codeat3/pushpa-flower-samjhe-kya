<?php

namespace App\Http\Controllers;

use App\Models\Dialogue;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(Request $request) {
        $dialogues = Dialogue::orderBy('id', 'ASC')->paginate(1);
        return view('welcome', [
            'dialogues' => $dialogues,
            'type' => 'normal',
        ]);
    }

    public function random(Request $request) {
        $dialogues = Dialogue::inRandomOrder()->simplePaginate(1);
        return view('welcome', [
            'dialogues' => $dialogues,
            'type' => 'random',
        ]);
    }
}
