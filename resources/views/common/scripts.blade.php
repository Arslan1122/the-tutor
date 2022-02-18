<!-- JQuery js-->
<script src="{{asset('backend/assets/js/jquery-3.2.1.min.js')}}"></script>

<!-- Bootstrap js -->
<script src="{{asset('backend/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

<!--JQuery Sparkline Js-->
<script src="{{asset('backend/assets/js/jquery.sparkline.min.js')}}"></script>

<!-- Circle Progress Js-->
<script src="{{asset('backend/assets/js/circle-progress.min.js')}}"></script>

<!-- Star Rating Js-->
<script src="{{asset('backend/assets/plugins/jquery-bar-rating/jquery.barrating.js')}}"></script>
<script src="{{asset('backend/assets/plugins/jquery-bar-rating/js/rating.js')}}"></script>

<!-- Fullside-menu Js-->
<script src="{{asset('backend/assets/plugins/sidemenu/sidemenu.js')}}"></script>

<!--Select2 js -->
<script src="{{asset('backend/assets/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{asset('backend/assets/js/select2.js')}}"></script>

<!-- Custom scroll bar Js-->
<script src="{{asset('backend/assets/plugins/pscrollbar/pscrollbar.js')}}"></script>
<script src="{{asset('backend/assets/plugins/pscrollbar/pscroll.js')}}"></script>

<!-- Data tables -->
<script src="{{ asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/datatable.js') }}"></script>

<!--Counters -->
<script src="{{asset('backend/assets/plugins/counters/counterup.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/counters/waypoints.min.js')}}"></script>

<!-- CHARTJS CHART -->
<script src="{{asset('backend/assets/plugins/chart/Chart.bundle.js')}}"></script>
<script src="{{asset('backend/assets/plugins/chart/utils.js')}}"></script>


<!-- Datepicker js -->
<script src="{{asset('backend/assets/plugins/date-picker/spectrum.js')}}"></script>
<script src="{{asset('backend/assets/plugins/date-picker/jquery-ui.js')}}"></script>
<script src="{{asset('backend/assets/plugins/input-mask/jquery.maskedinput.js')}}"></script>

<!-- Timepicker js -->
<script src="{{asset('backend/assets/plugins/time-picker/jquery.timepicker.js')}}"></script>
<script src="{{asset('backend/assets/plugins/time-picker/toggles.min.js')}}"></script>
<!-- Inline js -->
<script src="{{asset('backend/assets/js/select2.js')}}"></script>
<script src="{{asset('backend/assets/js/formelements.js')}}"></script>

<!--fileupload js -->
<script src="{{asset('backend/assets/js/file-upload.js')}}"></script>
<script src="{{asset('backend/assets/js/date-picker.js')}}"></script>

<!-- file uploads js -->
<script src="{{asset('backend/assets/plugins/fileuploads/js/fileupload.js')}}"></script>

<!--InputMask Js-->
<script src="{{asset('backend/assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js')}}"></script>


<!-- ECharts Plugin -->
<script src="{{asset('backend/assets/js/index1.js')}}"></script>

<!-- Switcher js -->
<script src="{{asset('backend/assets/switcher/js/switcher.js')}}"></script>

<script src="{{ asset('backend/assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/sweet-alert.js') }}"></script>


<!-- Custom Js-->
<script src="{{asset('backend/assets/js/admin-custom.js')}}"></script>

<script>
    @if(\Session::has('success'))
    swal("Success!", "{{ \Session::get('success') }}", "success");
    @elseif(\Session::has('error'))
    swal("Error!", "{{ \Session::get('error') }}", "error");
    @endif
</script>
