<script src="{{ asset('assets/js/vendors.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/main.bundle.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.9.1/highlight.min.js"></script>

<script src="{{ asset('assets/js/pages/doc.script.min.js') }}"></script>
<!-- Date & time picker calendario-->
<script src="{{ asset('assets/vendors/gijgo/js/gijgo.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/forms/forms.datepicker.min.js') }}"></script>


<!-- fin calendario-->
<script src="{{ asset('assets/js/pages/doc.script.min.js') }}"></script>
<script src="{{ asset('assets/vendors/select2/dist/js/select2.min.js') }}"></script>
{{-- <script src="{{asset('assets/js/pages/forms/select2.scripts.min.js')}}"></script> --}}
<script>
    $(document).ready(function() {
        $(".select2basico").select2();
    });
</script>
<script>
    $(document).ready(function() {
        $(".select2basicoEdit").select2();
    });
</script>

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>

{{-- Validacion --}}
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>

<script src="{{ asset('assets/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/datatables/basicDatatable.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/components.formsLayout.js') }}"></script>


<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
<script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>


<script src="{{ asset('assets/js/pages/datatables/scrollDatatable.min.js') }}"></script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
<script>
    function mayusculas(e) {
        e.value = e.value.toUpperCase();
    }
</script>
<script>
    function minusculas(e) {
        e.value = e.value.toLowerCase();
    }
</script>
<script>
    // $("input[name='calendar']").daterangepicker({
    $(function() {
        $('#date,#date2,#date3,#date4,#date5,#date6,#date7,#date8').daterangepicker({
            singleDatePicker: true,
            parentEl: ".main-content-body",
            "locale": {
                "format": "DD/MM/YYYY",
                "separator": " - ",
                "applyLabel": "Guardar",
                "cancelLabel": "Cancelar",
                "fromLabel": "Desde",
                "toLabel": "Hasta",
                "customRangeLabel": "Personalizar",
                "daysOfWeek": [
                    "Do",
                    "Lu",
                    "Ma",
                    "Mi",
                    "Ju",
                    "Vi",
                    "Sa"
                ],
                "monthNames": [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Septiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre"
                ],
                "firstDay": 1
            },

        });
    });
</script>
{{-- Sin espacios en los input y textarea --}}
<script>
    $(document).ready(function() {
        jQuery.validator.addMethod("noSpace", function(value, element) {
            return value.indexOf("  ") < 0 && value != " ";
        }, "No deje espacio por favor");
    });
</script>
{{-- Fin de sin espacios --}}

<script>
    function validarInput(input) {
        // Reemplazar caracteres no permitidos con una expresión regular
        input.value = input.value.replace(/[^0-9\-]/g, '');
    }
</script>

{{-- sube archivo formato pdf y reconoce si no es un pdf solo sube tamaña maximo a 1MB --}}
{{--  poner en el form e input en el class=""  --}}
{{--  <form class="uploadForm">  --}}
{{--  <input type="file" class="fileInput" name="fileInput">  --}}
<script>
    class FileValidator {
        constructor(formClass, inputFileClass) {
            this.form = document.querySelector(`.${formClass}`);
            this.fileInput = this.form.querySelector(`.${inputFileClass}`);

            this.fileInput.addEventListener("change", this.validateFile.bind(this));
        }

        validateFile(event) {
            var file = this.fileInput.files[0];
            if (!file) {
                this.showAlert("Por favor selecciona un archivo.");
                this.clearInput();
                return;
            }

            if (file.type !== "application/pdf") {
                this.showAlert("Por favor selecciona un archivo PDF.");
                this.clearInput();
                return;
            }

            if (file.size > 1024 * 1024) {
                this.showAlert("El archivo debe ser menor o igual a 1MB.");
                this.clearInput();
                return;
            }
        }

        showAlert(message) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: message,
            });
        }

        clearInput() {
            this.fileInput.value = "";
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        new FileValidator("uploadForm", "fileInput");
    });
</script>
{{-- fin --}}


<script>
    // Función para manejar los errores y agregar efecto de parpadeo
    function handleValidationError(error, element) {
        error.addClass("blink");
        error.insertAfter(element);
    }
    // Función para limpiar los errores y detener el parpadeo
    function clearValidationError(label) {
        $(label).removeClass("blink");
    }
</script>
{{-- fin Para poner alertas --}}


{{--  Para eliminar registro y que confuncione con el input, aplicando el sweetalert  --}}
{{--  aplicar el codigo en el class="delete-record"  --}}
{{-- Ejemplo: <a href="{{route('adquisicion_proveedores.edit',$l->pk_id_adquisicion_proveedor)}}" class="btn btn-raised btn-raised-danger rounded-circle btn-icon delete-record"> --}}
{{--    <span class="fa fa-trash-alt"></span> --}}
{{-- </a> --}}
<script>
    // Tu script para manejar el clic en los botones de eliminar
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-record');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                // Obtener la URL del enlace
                const url = button.getAttribute('href');

                // Mostrar SweetAlert2 para confirmar la eliminación
                Swal.fire({
                    title: '¿Está seguro de eliminar el registro?',
                    text: 'Esta acción no se puede deshacer.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redireccionar a la URL al confirmar la eliminación
                        window.location.href = url;
                    }
                });
            });
        });
    });
</script>
