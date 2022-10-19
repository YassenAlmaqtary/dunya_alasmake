@extends('admin.layouts.master')

@section('title')
    عرض الوصف

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('asset/dashboard/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/dashboard/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/dashboard/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('asset/dashboard/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('asset/dashboard/assets/plugins/toastr/toastr.min.css')}}">
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css" rel="stylesheet">   

@endsection

@section('page_title1')
  عرض الوصف
@endsection

@section('content')
@include('admin.alerts.success')
@include('admin.alerts.errors') 

  <div class="card">
    <!-- /.card-header -->
    
    <div class="modal fade" id="modal-danger">
      <div class="modal-dialog">
        <div class="modal-content bg-danger">
          <div class="modal-header">
            <h4 class="modal-title">تحذير</h4>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>هل تريد ان تقوم بعملية الحذف؟</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">تراجع</button>
            <button type="button" id="save-chaing" onclick="deletItem('{{route('admin.apout.delete')}}',event)" class="btn btn-outline-light">حفظ التغيرات</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="row">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
              
                <th>الرؤية</th>
                <th>الهدف</th>
                <th>نبذة عنا</th>
                <th>العمليات</th>
              </tr>
              </thead>
              <tbody>
                  @isset($abouts)
                  @foreach ($abouts as $about)
                  <tr>
                      
                      <td style="width:20%;height:5%;">{{$about->vision_details}}</td>
      
                      <td style="width:20%;height:5%;">{{$about->objectives_details}}</td>
                      <td style="width:20%;height:5%;">{{$about->Aboutus_details}}</td>
    
                      <td>
                      
                          <a class="btn btn-info btn-sm" href="{{route('admin.apout.edit',$about->id)}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            تعديل
                          </a>
          
                        <a class="btn btn-danger btn-sm" href="#" onclick="setIDItem({{$about->id}})" data-toggle="modal" data-target="#modal-danger">
                          <i class="fas fa-trash">
                          </i>
                          حذف
                         </a>
                    
                          <input type="checkbox" onchange="clickFn({statu:`${statu=this.checked?'1':'0'}`,about_id:`${this.value}`},
                          '{{route('apoutStatus')}}')" value="{{$about->id}}" data-toggle="switchbutton" data-onlabel="مفعل" data-offlabel="غير مفعل"@if ($about->status)
                           checked 
                           @endif 
                          data-onstyle="success" data-offstyle="danger"
                          data-size="sm">              
                        </td>
                    </tr>
                  @endforeach
                  @endisset 
              </tbody>
              <tfoot>
              <tr>
                
                <th>الرؤية</th>
                <th>الهدف</th>
                <th>نبذة عنا</th>
                <th>العمليات</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
    </div>
  </div>
 

@endsection

@section('scripts')
 <!-- SweetAlert2 -->
<script src="{{asset('asset/dashboard/assets/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('asset/dashboard/assets/plugins/toastr/toastr.min.js')}}"></script>

<!-- DataTables  & Plugins -->
<script src="{{asset('asset/dashboard/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('asset/dashboard/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('asset/dashboard/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('asset/dashboard/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('asset/dashboard/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('asset/dashboard/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('asset/dashboard/assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('asset/dashboard/assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('asset/dashboard/assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('asset/dashboard/assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('asset/dashboard/assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('asset/dashboard/assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
  </script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js"></script>

@include('admin.layouts.js.delet-item')

@include('admin.layouts.js.chang-statuse')

@endsection