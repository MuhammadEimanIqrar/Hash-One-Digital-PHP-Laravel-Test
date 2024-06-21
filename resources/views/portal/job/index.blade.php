@extends('portal.layout.app')

@section('title', $title)

@section('content')
    <x-portal.page-title :icon="$icon" :title="$title" :content="$content" />

    <div class="col-12">
        {{ $dataTable->table() }}
    </div>

@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush

@section('script')
@endsection
