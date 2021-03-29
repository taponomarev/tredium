<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * @param Tag $tag
     * @return RedirectResponse
     */
    public function show(Tag $tag): RedirectResponse
    {
        return back();
    }
}
