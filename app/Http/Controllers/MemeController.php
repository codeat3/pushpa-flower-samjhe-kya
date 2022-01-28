<?php

namespace App\Http\Controllers;

use App\Models\Dialogue;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Response;

class MemeController extends Controller
{
    public function __invoke()
    {
        $img = Image::make(storage_path('images/pushpa.jpg'));
        $randomDialogue = Dialogue::inRandomOrder()->first();
        $intro = Str::before($randomDialogue->dialogue, '? '). '?';
        $end = Str::after($randomDialogue->dialogue, '? ');

        $img->text($intro, 500, 400, function ($font) {
            $font->file(storage_path('fonts/font.ttf'));
            $font->size(32);
            $font->align('center');
            $font->color([255, 255, 255, 1]);
        });
        $img->text($end, 500, 830, function ($font) {
            $font->file(storage_path('fonts/font.ttf'));
            $font->size(32);
            $font->align('center');
            $font->color([255, 255, 255, 1]);
        });
      return response()->stream(function() use($img) {
            echo $img->stream('jpg', 100);
        },200,['Content-Type' => 'image/jpg']);
    }
}
