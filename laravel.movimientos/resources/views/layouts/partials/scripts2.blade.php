<script src="{{ asset('assets/js/vendors.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/main.bundle.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.9.1/highlight.min.js"></script>
<script src="{{ asset('assets/js/pages/doc.script.min.js') }}"></script>
<script src="{{ asset('assets/vendors/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/forms/select2.scripts.min.js') }}"></script>

<script src="{{ asset('assets/vendors/jqBootstrapValidation/dist/jqBootstrapValidation-1.3.7.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/forms/formValidations.min.js') }}"></script>

{{-- Este script tiene algun error --}}
{{-- <script src="{{asset('assets/js/pages/dashboard/cryptoCurrency.js')}}"></script> --}}

<script src="{{ asset('assets/vendors/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/forms/forms.bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/datatables/basicDatatable.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/components.formsLayout.js') }}"></script>
{{-- <script src="{{asset('assets/vendors/jqBootstrapValidation/dist/jqBootstrapValidation-1.3.7.min.js')}}"></script> --}}
{{-- <script src="{{asset('assets/js/pages/forms/formValidations.min.js')}}"></script> --}}
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

{!! Toastr::message() !!}


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


{{-- <script> --}}
{{--    window.addEventListener('load', () => { --}}

{{--        // Grab all the forms --}}
{{--        var forms = document.getElementsByClassName('needs-validation'); --}}

{{--        // Iterate over each one --}}
{{--        for (let form of forms) { --}}

{{--            // Add a 'submit' event listener on each one --}}
{{--            form.addEventListener('submit', (evt) => { --}}

{{--                // check if the form input elements have the 'required' attribute --}}
{{--                if (!form.checkValidity()) { --}}
{{--                    evt.preventDefault(); --}}
{{--                    evt.stopPropagation(); --}}
{{--                    console.log('Bootstrap will handle incomplete form fields'); --}}
{{--                } else { --}}
{{--                    // Since form is now valid, prevent default behavior.. --}}
{{--                    evt.preventDefault(); --}}
{{--                    console.info('All form fields are now valid...'); --}}
{{--                } --}}

{{--                form.classList.add('was-validated'); --}}

{{--            }); --}}

{{--        } --}}

{{--    }); --}}
{{-- </script> --}}
