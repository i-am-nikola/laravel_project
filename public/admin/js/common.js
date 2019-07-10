$(document).ready(function() {
  $('#dataTables-example').DataTable({
    responsive: true
  });
});

$('.alert').delay(2000).fadeOut(2000);

function deleteWarning($message){
  if(window.confirm($message)){
    return true;
  }else{
    return false;
  }
}

$(document).ready(function() {
  CKEDITOR.replace( 'intro' );
  CKEDITOR.replace( 'content' );
});
