<?php

namespace App\Http\Controllers;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function import()
    {
        Excel::import(new UsersImport, \request('file'));

        return redirect('/')->with('success', 'All good!');
    }
}
