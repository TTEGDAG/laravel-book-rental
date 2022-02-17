<!-- js placed at the end of the document so the pages load faster -->
<script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"></script>
<script src="{{ asset('plugins/summernote/summernote.min.js') }}"></script>
<script src="{{ asset('plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<!-- App Js -->
<script src="{{ asset('js/jquery.app.js') }}"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 150,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: false,                // set focus to editable area after initializing summernote
            toolbar:[

                // This is a Custom Button in a new Toolbar Area
                ['custom', ['examplePlugin']],

            ]
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.category').select2();
    });
</script>
<script type="text/javascript">
    $('#datepicker').datepicker({
        format: 'dd/mm/yyyy'
    });
</script>