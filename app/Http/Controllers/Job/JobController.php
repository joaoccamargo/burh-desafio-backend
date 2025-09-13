<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use App\Http\Requests\Job\StoreJobRequest;
use App\Http\Requests\Job\UpdateJobRequest;
use App\Models\Company;
use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return response()->json(['data' => $jobs], 200);
    }

    public function store(StoreJobRequest $request)
    {
        $company = Company::findOrFail($request->company_id);

        if (!$company) {
            return response()->json(['error' => 'Company not found'], 404);
        }

        $maxJobs = $company->plan === 'Free' ? 5 : 10;

        if ($company->jobs()->count() >= $maxJobs) {
            return response()->json(['error' => 'Limit reached for the company plan'], 403);
        }

        $job = Job::create($request->validated());

        return response()->json([
            'message' => 'Job created successfully',
            'job' => $job
        ], 201);
    }

    public function show($id)
    {
        $job = Job::find($id);
        if (!$job) {
            return response()->json(['message' => "Job {$id} not found"], 404);
        }
        return response()->json(['data' => $job], 200);
    }

    public function update(UpdateJobRequest $request, Job $job)
    {
        $job->update($request->validated());
        return response()->json(['message' => "Job {$job->id} updated!"]);
    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();
        return response()->noContent();
    }
}
