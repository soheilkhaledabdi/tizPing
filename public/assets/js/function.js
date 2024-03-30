function change_role_handeler(role) {
    var role = role
    if (role != 'admin'){
        $("#company_div").slideDown()
        $("#company_val").val($("#company").find(':selected').val())
    }
    else{
        $("#company_div").slideUp()
        $("#company_val").val('')
    }
}
