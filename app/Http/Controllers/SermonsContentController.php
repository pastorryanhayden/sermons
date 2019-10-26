<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Sermon;

class SermonsContentController extends Controller
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
         $validatedData = $request->validate([
                'manuscript' => 'nullable',
                'handout' => 'nullable | file | mimes:pdf,docx',
                'slides' => 'nullable | file | mimes:pdf,pptx'
         ]);
     
        if ($request->handout) {
            $sermon->update([
                'handout' => $request->handout->store('handouts', 'public')
            ]);
        }
        if ($request->manuscript) {
            $sermon->update([
                'manuscript' => $request->manuscript
            ]);
        }
        if ($request->slides) {
            $sermon->update([
                'slides' => $request->slides->store('slides', 'public')
            ]);
        }
        return redirect("/sermons");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $user = Auth::user();
        $church = $user->church;
        $sermon = Sermon::findOrFail($id);
        return view('sermons.content', compact('sermon', 'user'));
    }
}
