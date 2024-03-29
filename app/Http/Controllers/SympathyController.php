<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Whine;
use Illuminate\Support\Facades\Auth;

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
        $whine = Whine::findOrFail($whineId);
        $whine->relationshipLoadCount();
    }
}
