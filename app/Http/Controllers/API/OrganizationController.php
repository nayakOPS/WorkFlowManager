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
        return Organization::paginate(20);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrganizationStoreRequest $request)
    {
        //
if(Organization::create( $request->validated())){
    return response()->json(["message"=>"Successfully Stored"]);
}else{
    return response()->json(["message"=>"Error while storing"]);

}

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data =Organization::get($id);

        return new OrganizationResource($data);

    }

    /**
     * Update the specified resource in storage.
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
