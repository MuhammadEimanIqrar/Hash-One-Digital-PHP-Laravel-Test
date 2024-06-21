<?php

namespace App\Services;

use App\Models\Job;
use App\Models\JobRequirement;

class JobService
{
    public $model;

    public function __construct()
    {
        $this->model = new Job();
    }

    public function getAllJobs()
    {
        return $this->model->all();
    }

    public function getJobById($id)
    {
        return $this->model->find($id)->load(['requirements', 'user', 'applications']);
    }

    public function createJob($data)
    {
        $job = $this->model::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'company_detail' => $data['company_detail'],
            'posted_by' => user()->id,
        ]);

        if (isset($data['requirement'])) {
            $this->createJobRequirements($job->id, $data['requirement']);
        }

        return $this->getJobById($job->id);
    }

    public function updateJob($id, $data)
    {
        $job = $this->getJobById($id);
        $job->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'company_detail' => $data['company_detail'],
        ]);

        if (isset($data['requirement'])) {
            $this->createJobRequirements($job->id, $data['requirement']);
        }

        return $this->getJobById($job->id);
    }

    public function deleteJob($id)
    {
        return $this->getJobById($id)->delete();
    }

    public function deleteAllJobs()
    {
        return $this->model->truncate();
    }

    public function deleteAllJobsExcept($id)
    {
        return $this->model->where('id', '!=', $id)->delete();
    }

    public function deleteAllJobsExceptIds($ids)
    {
        return $this->model->whereNotIn('id', $ids)->delete();
    }

    public function createJobRequirements($id, $data)
    {
        $this->deleteJobRequirements($id);
        foreach ($data as $requirement) {
            JobRequirement::create([
                'job_id' => $id,
                'title' => $requirement
            ]);
        }
    }

    public function deleteJobRequirements($id)
    {
        return JobRequirement::where('job_id', $id)->delete();
    }
}
