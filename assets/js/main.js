document.addEventListener('DOMContentLoaded', function () {

    // EVENTOS NOTIFICACIONES 
    const btnsDanger = document.querySelectorAll('.btn-danger');

    btnsDanger.forEach((btn) => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            console.log(btn.href);
            Swal.fire({
                title: 'Estas seguro?',
                text: "No se podra recuperar!",
                icon: 'Peligro',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Borrar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const href = btn.href;
                    window.location.href = href;
                }
            })
        })
    });

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

    // VALIDACIONES GENERALES
    const inputsText = document?.querySelectorAll('input[type="text"]');
    const inputsNuber = document?.querySelectorAll('input[type="number"]');
    const inputsDate = document?.querySelectorAll('input[type="date"]');
    const inpCedula = document?.querySelector('.cedula');
    const inpPassword = document?.querySelector('#password');
    const inpPassword2 = document?.querySelector('#password2');
    const submit = document?.querySelector('#confirmacion');

    const date = new Date();
    const today = new Date(date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate());

    inputsText?.forEach(input => {
        input.addEventListener('input', function () {
            input.value = input.value.replace(/[0123456789/.*+\-?^${}()|[\]\\]/g, '');
        });
    });

    inputsNuber?.forEach(inputNumber => {
        inputNumber.addEventListener('input', function () {
            inputNumber.value = inputNumber.value.replace(/[/.*+\-?^${}()|[\]\\]/g, '');
        });
    });

    inputsDate?.forEach(inputDate => {
        inputDate.addEventListener('change', function () {
            if (new Date(inputDate.value) > today) {
                Swal.fire('La fecha no puede ser futura');
                inputDate.value = today;
            }
        });
    });

    inpCedula?.addEventListener('change', function () {
        if (inpCedula.value.length < 7) {
            Swal.fire('La cantidad minima es de 7 digitos')
        } else if (inpCedula.value.length > 10) {
            Swal.fire('La cantidad maxima es de 10 digitos')
        }
    });

    inpPassword2?.addEventListener('change', () => {
        if (inpPassword2.value !== inpPassword.value) {
            Swal.fire('Las contraseñas deben de ser iguales');
            inpPassword.value = '';
            inpPassword2.value = '';
            submit.addClass();
        }
    });



});

//validacion campo file

$(document).on('change', 'input[type="file"]', function () {
    // this.files[0].size recupera el tamaño del archivo
    // alert(this.files[0].size);

    //variables para obtener el nombre y el tamaño de la imagen
    var fileName = this.files[0].name;
    var fileSize = this.files[0].size;

    //que el tamaño no sea mayor 
    if (fileSize > 150000000) {
        alert('El archivo no debe superar los 15MB');
        this.value = '';
        this.files[0].name = '';
    } else {
        // recuperamos la extensión del archivo
        var ext = fileName.split('.').pop();

        // Convertimos en minúscula porque 
        // la extensión del archivo puede estar en mayúscula
        ext = ext.toLowerCase();

        // console.log(ext);
        switch (ext) {
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'pdf': break;
            default:
                alert('El archivo no tiene la extensión adecuada');
                this.value = ''; // reset del valor
                this.files[0].name = '';
        }
    }
});