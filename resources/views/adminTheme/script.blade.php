  <script src="{{ asset('adminTheme/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('adminTheme/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('adminTheme/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('adminTheme/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('adminTheme/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>

  <!-- Argon JS -->
<script src="{{ asset('adminTheme/js/argon.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.3/jquery.inputmask.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>
<script src="{{ asset('adminTheme/js/custom.js') }}"></script>
<script src="{{ asset('serviceworker.js') }}"></script>
<script>
  $(document).ready(function(){
      $('.phoneMask').inputmask('(999)-999-9999');
  });
</script>