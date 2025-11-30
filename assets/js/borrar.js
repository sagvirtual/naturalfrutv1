function eliminar(id) {
    var statusConfirm = confirm("Realmente lo desea borrar?");
    if (statusConfirm == true) {
            window.location.href = id;
    } else {
            ("Haces otra cosa");
    }
}