<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Whine;
use Auth;

class WhinesController extends Controller
{
    public function post(Request $request)
    {
        $request->validate([
            'whine' => 'required|max:2000',
        ]);
        $whine=Whine::create([
            'whine' => $request->whine,
            'ip' => $request->ip(),
            'user_id' => Auth::user()->id,
        ]);
        return redirect()
                ->back()
                ->with('whine','弱音を吐きました。すっきりしましたか？');
    }

    public function sympathy_users()
    {
        return $this->belongsToMany(User::class,'sympathys','whine_id','users_id');
    }

}
