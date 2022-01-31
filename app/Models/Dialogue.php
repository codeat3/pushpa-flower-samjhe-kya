<?php

namespace App\Models;

use Sushi\Sushi;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Symfony\Component\Yaml\Yaml;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dialogue extends Model
{
    use HasFactory;
    use Sushi;

    private const YAML_FILE_PATH = 'vendor/codeat3/pusha-samjhe-kya-memes/collections.yaml';

    private function getYamlData()
    {
        if (empty($this->yamlData)) {
            $collectionPath = base_path() . '/' . self::YAML_FILE_PATH;

            $this->yamlData = (new Yaml())->parse(file_get_contents($collectionPath));
        }

        return $this->yamlData;
    }

    public function getRows()
    {
        return collect($this->getYamlData())
            ->map(function ($row) {
                return [
                    'dialogue' => Arr::get($row, 'dialogue'),
                    'slug' => Str::slug(Arr::get($row, 'dialogue')),
                ];
            })->toArray();
    }

    public function getLinkAttribute() {
        return route('meme', [
            'slug' => $this->slug,
        ]);
    }
    public function getImageLinkAttribute() {
        return route('meme-image', [
            'slug' => $this->slug,
        ]);
    }

    public function next()
    {
        return Dialogue::where('id', '>', $this->id)->orderBy('id','asc')->first();
    }

    public  function previous()
    {
        return Dialogue::where('id', '<', $this->id)->orderBy('id','desc')->first();
    }
}
