<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Http\Requests\Member\IndexRequest;
use App\Http\Requests\Member\StoreRequest;
use App\Http\Requests\Member\UpdateRequest;
use App\Http\Requests\Member\DestroyRequest;
use App\Http\Resources\MemberResource;
use Illuminate\Http\JsonResponse;


class MemberController extends Controller
{
    public function index(IndexRequest $indexRequest):JsonResponse
    {
        $members = Member::query() //chaining to build the desired query
        // first arg check for truthiness, second args applies filter to the query
        ->when($indexRequest->role, fn($query) => $query->where('role', $indexRequest->role))
        ->when($indexRequest->status, fn($query) => $query->where('status', $indexRequest->status))
        ->when($indexRequest->org_id, fn($query) => $query->where('org_id', $indexRequest->org_id))
        ->when($indexRequest->user_id, fn($query) => $query->where('user_id', $indexRequest->user_id))
        ->get();

        return response()->json([
            'message' => 'Members Retrieved Successfully.',
            'data' => MemberResource::collection($members),
        ],200);
    }

    public function store(StoreRequest $storeRequest):JsonResponse
    {
        $member = Member::create($storeRequest->validated());

        return response()->json([
            'message' => 'Member Created Successfully',
            'data'=> new MemberResource($member),
        ],201);
    }

    public function show(Member $member): JsonResponse
    {
        return response()->json([
            'message'=> 'Member Retrieved Successfully',
            'data'=> new MemberResource($member),
        ],200);
    }

    public function update(UpdateRequest $updateRequest, Member $member): JsonResponse
    {
        $member -> update($updateRequest->validated());

        return response()->json([
            'message' => 'Member Updated Successfully',
            'data' => new MemberResource($member)
        ],200);
    }

    public function destroy(DestroyRequest $destroyRequest, Member $member): JsonResponse
    {
        $member -> delete();

        return response()->json([
            'message' => 'Member Deleted Successfully'
        ],200);
    }
}
