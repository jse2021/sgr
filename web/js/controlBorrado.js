function controlBorrado(path, cliente) {

    swal({
            title: "¿Estas seguro?",
            text: "Estas a punto de borrar un cliente",
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