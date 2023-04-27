<?php

namespace App\Imports;

use App\Models\Test;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class UsersImport implements ToModel, WithChunkReading, ShouldQueue
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Test([
            'region' => $row[0],
            'country' => $row[1],
            'item_type' => $row[2],
            'sales' => $row[3],
            'priority' => $row[4],
            'date' => $row[5],
            'order_id' => $row[6],
            'ship_date' => $row[7],
            'unit_sold' => $row[8],
            'unit_price' => $row[9],
            'unit_cost' => $row[10],
            'total_revenue' => $row[11],
            'total_cost' => $row[12],
            'total_profit' => $row[13],
        ]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
