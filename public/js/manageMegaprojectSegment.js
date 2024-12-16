function deleteFunction(id) {
    $("#deleteMegaprojectSegmentForm").attr("action", "/removeMegaprojectsegment/" + id);
}

$('#example1').dataTable();