<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class SympathyController extends Controller
{
    public function add_sympathy($whineId)
    {
        Auth::user()->add_sympathy($whineId);
        return redirect()->back();
    }

    public function remove_sympathy($whineId)
    {
        Auth::user()->remove_sympathy($whineId);
        return redirect()->back();
    }

    public function liked($whineId)
    {
        $whine = Whine::findOrFail($id);
        $whine->relationshipLoadCount();
    }
}
