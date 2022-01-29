<?php

namespace App\Http\Controllers;

use App\Models\Dialogue;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Response;

class MemeController extends Controller
{
    private function getDialogue($slug) {
        $randomDialogue = Dialogue::whereSlug($slug)->first();
        if(empty($randomDialogue)) {
            $randomDialogue = Dialogue::inRandomOrder()->first();
        }
        return [
            Str::before($randomDialogue->dialogue, '? '). '?',
            Str::after($randomDialogue->dialogue, '? '),
        ];
    }

    public function __invoke(Request $request, $slug)
    {
        list($intro, $end) = $this->getDialogue($slug);
        $img = Image::make(storage_path('images/pushpa.jpg'));
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
