<?php


namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutModel;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function aboutPage()
    {
        $list = AboutModel::get();
        return view('pc.pages.About', compact('list'));
    }
}