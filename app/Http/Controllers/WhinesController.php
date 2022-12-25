<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Whine;
use App\Events\WhinePostEvent;
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

        // pusherにwhineを送る
        event(new WhinePostEvent($whine));

        return redirect()
                ->back()
                ->with('whine','弱音を吐きました。すっきりしましたか？');
    }

    public function destroy($id)
    {
        $whine = Whine::findOrFail($id);
        $whine->delete();
        return redirect()->back()->with('delete','弱音を削除しました。');
    }
}
