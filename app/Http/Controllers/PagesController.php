<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller {

    public function page(string $viewName)
    {
        return view($viewName);
    }
}
