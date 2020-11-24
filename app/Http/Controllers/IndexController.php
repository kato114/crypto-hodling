<?php
namespace App\Http\Controllers;

class IndexController extends Controller
{

    /**
     * IndexController constructor.
     */
    public function __construct()
    {
    }

    public function index()
    {
        return view('index.index');
    }
}
