<?php

namespace App\Imports;

use App\Models\Customer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\withHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class CustomersImport implements 
    ToModel, 
    withHeadingRow,
    WithChunkReading,
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
            "branch_id" => $row['branch_id'],
            "first_name" => $row['first_name'],
            "last_name" => $row['last_name'],
            "email" => $row['email'],
            "phone" => $row['phone'],
            "gender" => $row['gender'],
        ]);
    }
 
    public function chunkSize(): int
    {
        return 1000;
    }


}
