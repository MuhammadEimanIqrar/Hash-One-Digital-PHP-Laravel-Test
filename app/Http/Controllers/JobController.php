<?php

namespace App\Http\Controllers;

use App\DataTables\JobsDataTable;
use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Services\JobService;
use App\View\Components\Button;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    public $title, $icon, $content, $service;

    public function __construct()
    {
        $this->title = 'Job';
        $this->icon = 'lnr-pushpin';
        $this->content = (new Button(text: 'Listing', url: route('portal.job.index'), icon: 'fa fa-arrow-left'))->render();
        $this->service = new JobService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(JobsDataTable $dataTable)
    {
        $title = $this->title;
        $icon = $this->icon;
        $content = (new Button(text: 'Add New', url: route('portal.job.create'), icon: 'fa fa-plus'))->render();

        return $dataTable->render('portal.job.index', compact('title', 'icon', 'content'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Add New ' . $this->title;
        $icon = $this->icon;
        $content = $this->content;

        return view('portal.job.create', compact('title', 'icon', 'content'));
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

                return redirect()->route('portal.job.index')->with(successType(), 'Job created successfully');
            }

            DB::rollBack();
            return back()->with(errorType(), defaultErrorMessage());
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with(errorType(), errorMessage($th));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        $title = 'Edit ' . $this->title;
        $icon = $this->icon;
        $content = $this->content;

        $job = $this->service->getJobById($job->id);

        return view('portal.job.create', compact('title', 'icon', 'content', 'job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        try {
            // dd($request->all());

            DB::beginTransaction();

            $job = $this->service->updateJob($job->id, $request->all());

            if ($job) {
                DB::commit();

                return redirect()->route('portal.job.index')->with(successType(), 'Job updated successfully');
            }

            DB::rollBack();
            return back()->with(errorType(), defaultErrorMessage());
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with(errorType(), errorMessage($th));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
