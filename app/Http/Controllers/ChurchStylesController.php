<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Rules\Googlefont;
use App\Rules\Fontfamily;
use App\Church;

class ChurchStylesController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        $church = $user->church;
        if($church->styles)
        {
            $styles = $church->styles()->first();
        }
        else 
        {
            $styles = $church->styles()->create();
        }
        return view('styles.edit', compact('church', 'user', 'styles'));
    }
    public function store( Request $request)
    {
        $validatedData = $request->validate([
            'rounding_style' => [ 'nullable', Rule::in(['Square', 'Small Rounding', 'Medium Rounding', 'Completely Round']), ],
            'text_color' => [ 'nullable' , 'regex:^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$^' ],
            'accent_color' => [ 'nullable' , 'regex:^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$^' ],
            'font_link' => ['nullable', new Googlefont, 'required_with:font_name'],
            'font_name' => ['nullable', new Fontfamily, 'required_with:font_link'],
        ]);
        $user = Auth::user();
        $church = $user->church;
        $church->styles()->update($validatedData);
        return redirect('/styles');
    }
}
