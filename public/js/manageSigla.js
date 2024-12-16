function deleteNomineeFunction(id) {
    // console.log(window.location.origin + '/removeSiglaNominee/' + id);
    $("#deleteSiglaNomineeForm").attr("action", window.location.origin + '/removeSiglaNominee/' + id);
}

function deleteDepartmentFunction(id) {
    console.log(window.location.origin + '/removeSiglaDepartment/' + id);
    $("#deleteSiglaDepartmentForm").attr("action", window.location.origin + '/removeSiglaDepartment/' + id);
}

$('.table').dataTable();