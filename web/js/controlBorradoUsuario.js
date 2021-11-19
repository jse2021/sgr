function controlBorradoUsuario(path, usuario) {

    swal({
            title: "¿Estas seguro?",
            text: "Estas a punto de borrar un Usuario",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location.replace(path);
            }
        });


    return false;
}