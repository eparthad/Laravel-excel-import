<?php

namespace App\Http\Controllers;

use App\Imports\CustomersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Customer;
use Validator;
use Illuminate\Support\Facades\DB;

class CustomersImportController extends Controller
{
    public function index()
    {
        $getCustomerCountData = DB::select('CALL total_customer_count_info');
        
        $customers = Customer::paginate(10);
        return view('customers.index', compact(['customers', 'getCustomerCountData']));
    }


    public function show()
    {
        return view('customers.import');
    }

    public function store(Request $request)
    {
        $file = $request->file('file')->store('import');

        Excel::import(new CustomersImport, $file);

        return back()->withStatus('Excel file imported successfully');
    }
}
