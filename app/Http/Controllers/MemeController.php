<?php

namespace App\Http\Controllers;

use App\Models\Dialogue;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Response;

class MemeController extends Controller
{
    private function getDialogue($slug)
    {
        $randomDialogue = Dialogue::whereSlug($slug)->first();
        if (empty($randomDialogue)) {
            $randomDialogue = Dialogue::inRandomOrder()->first();
        }
        return $randomDialogue;
        return [
            Str::before($randomDialogue->dialogue, '? ') . '?',
            Str::after($randomDialogue->dialogue, '? '),
        ];
    }

    private function getFileName($slug)
    {
    }

    public function __invoke(Request $request, $slug)
    {
        $randomDialogue = $this->getDialogue($slug);
        $intro = Str::before($randomDialogue->dialogue, '? ') . '?';
        $end = Str::after($randomDialogue->dialogue, '? ');
        if (!file_exists(storage_path('images/' . $randomDialogue->slug . '.jpg'))) {
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
            $img->save(storage_path('images/' . $randomDialogue->slug . '.jpg'), 100);
        }
        $img = Image::make(storage_path('images/' . $randomDialogue->slug . '.jpg'));
        return response()->stream(function () use ($img) {
            echo $img->stream('jpg', 100);
        }, 200, ['Content-Type' => 'image/jpg']);
    }
}
