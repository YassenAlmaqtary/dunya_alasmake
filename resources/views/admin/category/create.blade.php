@extends('admin.layouts.master')

@section('title')
 @if ($flags==true)
   تعديل  القسم
   @else
   اضافة قسم
 @endif

@endsection
@section('css')
 <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="{{asset('dashboard/assets/plugins/fontawesome-free/css/all.min.css')}}">
 <!-- Theme style -->
 <link rel="stylesheet" href="{{asset('dashboard/dist/css/adminlte.min.css')}}">
@endsection
@section('page_title1')
@if ($flags==true)
تعديل  القسم
@else
اضافة قسم
@endif
@endsection

@section('content')

@include('admin.alerts.success')
@include('admin.alerts.errors') 

@include('admin.category._form_store')

@endsection

@section('scripts')
<!-- bs-custom-file-input -->
<script src="{{asset('dashboard/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
$(function () {
    bsCustomFileInput.init();
  });
  </script>

@include('admin.layouts.js.load-image')


@endsection