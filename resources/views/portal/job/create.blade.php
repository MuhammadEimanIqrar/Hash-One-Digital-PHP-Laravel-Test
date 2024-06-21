@extends('portal.layout.app')

@section('title', $title)

@section('content')
    <x-portal.page-title :icon="$icon" :title="$title" :content="$content" />

    <div class="col-12">
        <form action="{{ isset($job) ? route('portal.job.update', $job->id) : route('portal.job.store') }}" method="post" id="submitForm">
            @csrf
            @if (isset($job))
                @method('PUT')
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required
                            value="{{ isset($job) ? $job->title : old('title') }}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" required rows="5">{{ isset($job) ? $job->description : old('description') }}</textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="company_detail">Company Detail</label>
                        <textarea class="form-control" id="company_detail" name="company_detail" required rows="5">{{ isset($job) ? $job->company_detail : old('company_detail') }}</textarea>
                    </div>
                </div>
                <div class="col-10">
                    <label for="requirement">Requirement</label>
                    @if (!isset($job))
                        <input type="text" class="form-control" id="requirement" name="requirement[]" required>
                    @endif
                </div>
                <div class="col-2 mt-4">
                    <button type="button" id="addMore" class="btn btn-sm btn-outline-primary float-right">
                        <i class="fa fa-plus"></i>
                        Add More
                    </button>
                </div>
                <div class="col-12" id="requirementsArea">
                    @if (isset($job))
                        @foreach ($job->requirements as $requirement)
                            <div class="row my-2" id="req{{ $requirement->id }}">
                                <div class="col-10">
                                    <input type="text" class="form-control" name="requirement[]" value="{{ $requirement->title }}">
                                </div>
                                <div class="col-2"><a class="btn btn-sm btn-outline-danger text-danger remove"
                                        data-uid="req{{ $requirement->id }}"><i class="fa fa-trash-alt"></i></a></div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="col-12 text-right">
                    <input type="submit" class="btn btn-outline-success mt-3" id="submitFormButton" value="{{ isset($job) ? 'Update' : 'Submit' }}">
                </div>
            </div>
        </form>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '#addMore', function() {
                let uid = 'req' + randomNumber();
                let requirementInput = `<div class="row my-2" id="` + uid + `">
                    <div class="col-10">
                        <input type="text" class="form-control" name="requirement[]">
                    </div>
                    <div class="col-2"><a class="btn btn-sm btn-outline-danger text-danger remove" data-uid="` + uid + `"><i class="fa fa-trash-alt"></i></a></div>
                </div>`;
                $('#requirementsArea').append(requirementInput);
            });

            $(document).on('click', '.remove', function() {
                let uid = $(this).attr('data-uid');
                $('#' + uid).remove();
            });

            $(document).on('click', '#submitFormButton', function (e) {
                e.preventDefault();
                let requirementInputs = $('input[name="requirement[]"]').length;
                if (requirementInputs < 1) {
                    alert('Please add at least 1 requirement');
                    return false;
                }
                $('#submitForm').submit();
            });
        });
    </script>
@endsection
