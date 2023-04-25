<?php

namespace App\Http\Controllers;

use App\Jobs\SalesCsvProcess;
use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{

    public function index()
    {
        return view('upload-file');
    }

    public function upload()
    {
        if (request()->has('mycsv')) {
            $csv = file(request('mycsv'));

            $chunks = array_chunk($csv, 1000);

            // convert 1000 of records in new csv file

            foreach ($chunks as $key => $chunk) {
                $name = "/tmp{$key}.csv";
                $path = resource_path('temp');
                file_put_contents($path . $name, $chunk);
            }

            $this->store();

        } else {
            return "Please upload the file";
        }
    }

    public function store()
    {
        $path = resource_path('temp');

        $files = glob("$path/*.csv");

        $header = [];

        foreach ($files as $key => $file) {

            $data = array_map('str_getcsv', file($file));

            if ($key === 0) {
                $header = $data[0];
                unset($data[0]);
            }

            SalesCsvProcess::dispatch($data, $header);
            unlink($file);

        }

        return "Stored";

    }


}
