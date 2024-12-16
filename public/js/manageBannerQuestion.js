function deleteFunction(id) {
    $("#deleteBannerQuestionForm").attr("action", "/removeBannerQuestion/" + id);
}

$('#example1').dataTable();