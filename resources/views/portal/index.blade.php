@extends('portal.layout.app')

@section('title', $title)

@section('content')
<x-portal.page-title :icon="$icon" :title="$title" />

@if (Session::has('welcome'))
<x-alert :message="Session::get('welcome')" />
@endif

@endsection

@section('script')
@endsection
