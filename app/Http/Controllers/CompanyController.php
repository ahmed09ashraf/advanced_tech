<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCompanyRequest;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(10);
        
        return view('companies.index', compact('companies',));
    }

    public function create()
    {
        $companies =  Company::all();

        return view('companies.create');
    }



    public function store(StoreCompanyRequest $request)
    {
           $requestData =$request->all() ;
        $filename=time().$request->file('logo')->getClientOriginalName() ;
        $path = $request ->file('logo')->storeAs('images' , $filename , 'public');
        $requestData['logo'] ='/storage/'.$path ;
        Company::create($requestData);
        return to_route('companies.index');

    }


    public function show($id)
    {
        $company = Company::find($id);

        return view("companies.show", [
            'company' => $company,
        ]);
    }

    public function delete($company_id)
    {
        Company::where('id', $company_id)->delete();

        return to_route('companies.index');
    }
}
