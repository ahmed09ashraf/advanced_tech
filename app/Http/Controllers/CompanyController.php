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
        $companies = Company::paginate(7);
        
        return view('companies.index', compact('companies',));
    }

    public function create()
    {
        $companies =  Company::all();

        return view('companies.create');
    }



    public function store(StoreCompanyRequest $request)
    {
        if ($request->file('image')) {
             $imagePath = $request->file('logo')->store('public/images');
            Company::create([
                'name' =>  $request['name'],
                'email' =>  $request['email'],
                'website' => $request['website'],
                'logo' => str_replace('public', 'storage', $imagePath)
            ]);
        } else {
            company::create([
                'name' =>  $request['name'],
                'email' =>  $request['email'],
                'website' => $request['website'],
                'logo' => $request['logo'],


            ]);
        }

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
