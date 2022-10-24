@extends('admin.layouts.master')

@section('title')

    الرد على الرسالة

@endsection
@section('css')
@endsection
@section('page_title1')
الرد على الرسالة
@endsection

@section('content')

@include('admin.alerts.success')
@include('admin.alerts.errors') 

@include('admin.subscript._form_store')

@endsection



