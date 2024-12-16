$(function () {
  
    $('#example1').dataTable();
  
  });
  
  
  function deleteFunction(id) {
    $("#deleteRunningCreditsForm").attr("action", "/removeRunningCredits/" + id);
  }
  
  