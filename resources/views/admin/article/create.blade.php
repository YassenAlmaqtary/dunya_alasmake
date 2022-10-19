@extends('admin.layouts.master')

@section('title')
 @if ($flags==true)
   تعديل مقالة
   @else
   اضافة تعيل
 @endif

@endsection
@section('css')
@endsection
@section('page_title1')
@if ($flags==true)
تعديل  المقالة
@else
اضافة المقالة
@endif
@endsection

@section('content')

@include('admin.alerts.success')
@include('admin.alerts.errors') 

@include('admin.article._form_store')

@endsection

@section('scripts')

<!-- bs-custom-file-input -->
<script src="{{asset('asset/dashboard/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

<!-- Page specific script -->
<script>
$(function () {
    bsCustomFileInput.init();
  });
  </script>

@include('admin.layouts.js.load-image')


@endsection