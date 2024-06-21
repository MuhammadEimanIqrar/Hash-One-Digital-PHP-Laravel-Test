<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Http\Resources\JobResource;
use App\Services\JobService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    public $service;

    public function __construct(JobService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = $this->service->getAllJobs();

        return JobResource::collection($jobs);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
        try {
            // dd($request->all());

            DB::beginTransaction();

            $job = $this->service->createJob($request->all());

            if ($job) {
                DB::commit();

                return response()->json([
                    'status' => successType(),
                    'message' => 'Job created successfully',
                    'data' => new JobResource($job),
                ], 201);
            }

            DB::rollBack();
            return response()->json([
                'status' => errorType(),
                'message' => defaultErrorMessage(),
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => errorType(),
                'message' => errorMessage($th),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = $this->service->getJobById($id);

        return new JobResource($job);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, string $id)
    {
        try {
            // dd($request->all());

            DB::beginTransaction();

            $job = $this->service->updateJob($id, $request->all());

            if ($job) {
                DB::commit();

                return response()->json([
                    'status' => successType(),
                    'message' => 'Job updated successfully',
                    'data' => new JobResource($job),
                ]);
            }

            DB::rollBack();
            return response()->json([
                'status' => errorType(),
                'message' => defaultErrorMessage(),
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => errorType(),
                'message' => errorMessage($th),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->deleteJob($id);

        return response()->json([
            'status' => successType(),
            'message' => 'Job deleted successfully',
        ]);
    }
}
