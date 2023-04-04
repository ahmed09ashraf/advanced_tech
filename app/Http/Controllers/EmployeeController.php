<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeeRequest;
class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(7);
        
        return view('employees.index', compact('employees',));
    }

    public function create()
    {
        $employees = Employee::all();
        $companies = Company::all() ;

        return view('employees.create' , compact('companies'));
    }



    public function store(StoreEmployeeRequest $request)
    {
        
            Employee::create([
                'first_name' =>  $request['first_name'],
                'last_name' =>  $request['last_name'],
                'email' =>  $request['email'],
                'phone' => $request['phone'],
                'company_id' =>$request['company_id'] ,
            ]);
         

        return to_route('employees.index');
    }


    public function show($id)
    {
        $employee = Employee::find($id);

        return view("employees.show", [
            'employee' => $employee,
        ]);
    }

    public function delete($employee_id)
    {
        Employee::where('id', $employee_id)->delete();

        return to_route('employees.index');
    }
}
