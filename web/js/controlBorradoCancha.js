function controlBorradoCancha(path, cancha) {

    swal({
            title: "¿Estas seguro?",
            text: "Estas a punto de borrar una Cancha",
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