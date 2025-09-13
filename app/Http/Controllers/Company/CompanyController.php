<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StoreCompanyRequest;
use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return response()->json(['data' => $companies], 200);
    }
    public function store(StoreCompanyRequest $request)
    {
        $company = Company::create($request->validated());
        return response()->json([
            'message' => 'Company created successfully',
            'company' => $company
        ], 201);
    }

    public function show($id)
    {
        $company = Company::find($id);
        if (!$company) {
            return response()->json(['message' => "Company {$id} not found"], 404);
        }
        return response()->json(['data' => $company], 200);
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->update($request->validated());
        return response()->json(['message' => "Company {$company->id} updated!"]);
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return response()->noContent();
    }
}
