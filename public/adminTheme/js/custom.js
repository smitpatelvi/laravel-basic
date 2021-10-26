$("body").on("click",".remove-crud",function(){
    var current_object = $(this);
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "error",
        showCancelButton: true,
        dangerMode: true,
        cancelButtonClass: '#DD6B55',
        confirmButtonColor: '#dc3545',
        confirmButtonText: 'Delete!',
    },function (result) {
        if (result) {
            var action = current_object.attr('data-action');
            var token = jQuery('meta[name="csrf-token"]').attr('content');
            var id = current_object.attr('data-id');

            $('body').html("<form class='form-inline remove-form' method='post' action='"+action+"'></form>");
            $('body').find('.remove-form').append('<input name="_method" type="hidden" value="delete">');
            $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
            $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+id+'">');
            $('body').find('.remove-form').submit();
        }
    });
});


// tooltip
$(function () {
  $('[data-tooltip="tooltip"]').tooltip();
})

// Add the following code if you want the name of the file appear on select
$("body").on("change",'.custom-file-input', function() {
  var fileName = $(this).val().split("\\").pop();
  console.log($(this).siblings(".custom-file-label").parent().html());
  $(this).parent().find(".custom-file-label").addClass("selected").html(fileName);
});

//summernote
$('.summernote').summernote({
     height: 350,
     placeholder:'Enter Description',
});

$(document).ready( function () {
    $('.datatable').DataTable({
            "language": {
            "paginate": {
              "previous": '<i class="fas fa-chevron-left"></i>',
              "next": '<i class="fas fa-chevron-right"></i>'
            }
          }
    });
});

$(document).ready( function() {
$(document).on('change', '.btn-file :file', function() {
var input = $(this),
    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
input.trigger('fileselect', [label]);
});

$('.btn-file :file').on('fileselect', function(event, label) {
    
    var input = $(this).parents('.input-group').find(':text'),
        log = label;
    
    if( input.length ) {
        input.val(log);
    } else {
        if( log ) alert(log);
    }

});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            $('#img-upload').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});     
});