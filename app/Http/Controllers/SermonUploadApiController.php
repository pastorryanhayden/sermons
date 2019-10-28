<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Sermon;

class SermonUploadApiController extends Controller
{
    public function store(Request $request)
    {
        $sermon = Sermon::find($request->sermon);
        $name = $sermon->date . '-' . $sermon->title;
        $name = $this->slugify($name) . '.mp3';
        $disk = Storage::disk('wasabi');
        $sermon->update([
                'mp3' => $request->file->storeAs('sermons', $name, 'wasabi')
            ]);
        $disk->setVisibility($sermon->mp3, 'public');
        return 'it worked';
    }
    public static function slugify($text)
    {
      // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

      // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

      // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

      // trim
        $text = trim($text, '-');

      // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

      // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}
