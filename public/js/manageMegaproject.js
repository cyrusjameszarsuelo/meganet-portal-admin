function deleteFunction(id) {
    $("#deleteMegaprojectForm").attr("action", "/removeMegaproject/" + id);
}

$('.example1').dataTable({
    order: [[0, 'desc']]
});