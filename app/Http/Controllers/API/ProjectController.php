<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Requests\Project\ProjectRequest;
use App\Http\Resources\ProjectResource;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProjectResource::collection(Project::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $project = Project::create($request->validated());
        return ProjectResource($project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project = Project::findorFail($project);
        return ProjectResource($project);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $project = Project::find($project);
        if(!$project){
            return response()->json(['error'=>'Project not found'],404);
        }
        $project->update($request->validated());
        return ProjectResource($project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project= Project::find($project);
        if(!$project){
            return response()->json(['error'=>'Project not found'],404);
        }
        $project->delete();
        return response()->json(['message'=>'Project deleted successfully'],200);
    }


}
