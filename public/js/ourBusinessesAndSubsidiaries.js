$(function () {
  
    $('#example1').dataTable();
  
  });
  
  
  function deleteFunction(id) {
    $("#deleteOurBasForm").attr("action", "/removeOurBas/" + id);
  }
  
  