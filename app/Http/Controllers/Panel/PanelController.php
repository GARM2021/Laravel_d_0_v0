<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class PanelController extends Controller
{
    public function index() //!C78
    {
        Return view('panel');
    }
}
