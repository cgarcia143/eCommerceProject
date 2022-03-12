const btnsDanger = document.querySelectorAll('.btn-danger');

btnsDanger.forEach((btn) => {
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        console.log(btn.href);
        Swal.fire({
            title: 'Estas seguro?',
            text: "Esta accion puede ser irreversible!",
            icon: 'Peligro',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si!'
        }).then((result) => {
            if (result.isConfirmed) {
                const href = btn.href;
                window.location.href = href;
            }
        })
    })
});

$(document).ready(function() {
    $('#table_id').DataTable({

        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "ultimo",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing": "Procesando...",
        }
    });

});
