<?php

namespace App\Http\Controllers;
use Excel;
use App\Exports\UsersExport;
// use Illuminate\Support\Facades\Excel;
use Illuminate\Http\Request;
use DB;

class ExportExcelController extends Controller
{ 
    function index()
    {
     $customer_data = DB::table('users')->get();
     //dd($customer_data);
     return view('export_excel')->with('customer_data', $customer_data);
    }

    function excel()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
        
    //  $customer_data = DB::table('users')->get()->toArray();
    //  $customer_array[] = array('Name', 'Email', 'Password');
    //  foreach($customer_data as $customer)
    //  {
    //   $customer_array[] = array(
    //    ' Name'  => $customer->name,
    //    'Email'   => $customer->email,
    //    'Password'    => $customer->password
       
    //   );
    //  }
     
    //  Excel::download/Excel::store('Customer Data', function($excel) use ($customer_array){
    //   $excel->setTitle('Customer Data');
    //   $excel->sheet('Customer Data', function($sheet) use ($customer_array){
    //    $sheet->fromArray($customer_array, null, 'A1', false, false);
    //   });
    //  })->download('xlsx');
   
     }
}

// Excel::download/Excel::store