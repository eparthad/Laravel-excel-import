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

    public function customersList(Request $request)
    {
        if($request->keyword){
            $customers = Customer::where('branch_id', 'like', '%'.$request->keyword.'%')
                                ->orWhere('gender', 'like', '%'.$request->keyword.'%')
                                ->get();
        }else{
            $customers = Customer::get();
        }

        return response()->json([
            'message' => 'Customer list',
            'data'    => $customers
        ], 200);
        
    }

    public function createCustomer(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'branch_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required',
            'gender' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $customer = new Customer();
        $customer->branch_id = $request->branch_id;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->gender = $request->gender;
        $customer->save();

        return $customer;
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
