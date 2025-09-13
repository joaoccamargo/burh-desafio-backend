<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\StoreApplicationRequest;
use App\Http\Requests\Application\UpdateApplicationRequest;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::all();
        return response()->json(['data' => $applications], 200);
    }

    public function store(StoreApplicationRequest $request)
    {
        $application = Application::create($request->validated());
        return response()->json(['data' => $application], 201);
    }

    public function show($id)
    {
        $application = Application::find($id);
        if (!$application) {
            return response()->json(['message' => "Application {$id} not found"], 404);
        }
        return response()->json(['data' => $application], 200);
    }

    public function update(UpdateApplicationRequest $request, Application $application)
    {
        $application->update($request->validated());
        return response()->json(['message' => "Application {$application->id} updated!"]);
    }

    public function destroy($id)
    {
        $application = Application::findOrFail($id);
        $application->delete();
        return response()->noContent();
    }
}
