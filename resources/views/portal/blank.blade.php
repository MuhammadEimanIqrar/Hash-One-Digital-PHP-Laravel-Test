@extends('portal.layout.app')

@section('title', $title)

@section('content')
<x-portal.page-title :icon="$icon" :title="$title"  :content="$content"/>
@endsection

@section('script')
@endsection
