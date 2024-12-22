<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Organization\OrganizationStoreRequest;
use App\Http\Requests\Organization\OrganizationUpdateRequest;
use App\Http\Resources\OrganizationResource;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return OrganizationResource::collection(Organization::paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrganizationStoreRequest $request)
    {
        //

    return new OrganizationResource(Organization::create( $request->validated()));

    }

    /**
     * Display the specified resource.
     */
    public function show(Organization $organization)
    {
        //



        return new OrganizationResource($organization);

    }

    /**
     * Update the specified resources in storage.
     */
    public function update(OrganizationUpdateRequest $request, Organization $organization)
    {
        //
        $organization->update($request->validated());
return new OrganizationResource($organization);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        Organization::destroy($id);

    }
}
