<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Sermon;

class SermonsMediaController extends Controller
{
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
       
        $sermon = Sermon::findOrFail($id);
        // Validate the request
        if ($request->mp3 || $request->video_url) {
             $validatedData = $request->validate([
                'mp3' => 'nullable | file | max:30000 | mp3_ogg_extension',
                'video_url' => 'nullable| url',
             ]);
        } else {
            return back()->with('error', 'You must either use include an MP3 or a Vimeo or Youtube URL.');
        }
        $name = $sermon->date . '-' . $sermon->title;
        $name = $this->slugify($name) . '.mp3';

        // Store the file & Persist to the DB
        if ($request->mp3) {
            $disk = Storage::disk('wasabi');
            
            $sermon->update([
                'mp3' => $request->mp3->storeAs('sermons', $name, 'wasabi')
            ]);
            $disk->setVisibility($sermon->mp3, 'public');
        }
        if ($request->video_url) {
            $sermon->update([
                'video_url' => $request->video_url,
            ]);
        }
      
        
        // Redirect to the next section
         return redirect("/sermons/{$id}/content");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $sermon = Sermon::findOrFail($id);
            $user = Auth::user();
        $church = $user->church;
        return view('sermons.media', compact('sermon', 'user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
