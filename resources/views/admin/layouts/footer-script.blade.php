
<!-- jQuery -->
<script src="{{asset('asset/dashboard/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('asset/dashboard/assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script> 
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('asset/dashboard/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('asset/dashboard/assets/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('asset/dashboard/assets/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('asset/dashboard/assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('asset/dashboard/assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
 <!-- jQuery Knob Chart --> 
<script src="{{asset('asset/dashboard/assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('asset/dashboard/assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('asset/dashboard/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('asset/dashboard/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('asset/dashboard/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('asset/dashboard/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('asset/dashboard/assets/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('asset/asset/dashboard/assets/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('asset/dashboard/assets/dist/js/pages/dashboard.js')}}"></script>

<!--laravel echo and  socketio-->
{{-- <script>window.laravel_echo_port='{{env("LARAVEL_ECHO_PORT")}}';</script>
<script src="http://{{ Request::getHost()}}:{{env('LARAVEL_ECHO_PORT')}}/socket.io/socket.io.js"></script>
<script src="{{ url('js/app.js') }}" type="text/javascript"></script>--}}
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script src="{{asset('asset/dashboard/assets/js/subscript-message-pusher.js')}}"></script>
@yield('scripts') 