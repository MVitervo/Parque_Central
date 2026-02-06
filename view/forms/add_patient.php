 <div class="d-flex justify-content-center card-body">
    <div class="col-12 col-md-6 col-lg-6" style="position: relative; bottom: 55px">
        <h4>Datos de la persona</h4>
        <form id="form_patient">
          <?php include ('form_template.php'); ?>
          <div class="d-flex justify-content-center">
              <button type="submit" class="mt-3 btn btn-primary col-12 col-md-6 col-lg-6">Guardar</button>
          </div>
      </form>
    </div>
       <!-- style="position: relative; bottom: 55px" -->
 </div>
 <script>
    $(document).ready(function() {
         enviarFormulario();
    });

    function enviarFormulario() {
        const form = $('#form_patient')[0];
        $(form).on('submit', function(event) {
            event.preventDefault();
            
            if (!form.checkValidity()) {
                event.stopPropagation();
                $(form).addClass('was-validated');
                Swal.fire({
                    template: '#warning_template',
                    title: "Campos Vacíos!",
                    text: "Por favor, complete todos los campos requeridos",
                });
                return;
            }
            const formData = new FormData(form);
            $.ajax({
                type: 'POST',
                url: 'controllers/add_patients_controller.php',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == true) {

                        Swal.fire({
                            template: '#success_template',
                            title: "Persona registrada!",
                            html: '<label style="font-size:24px; font-weight:bold">' + response.message + '</label>',
                        }).then(() => {
                            $('#form_section').hide();
                            $('#sectionListPatients').show();
                            searchData();
                        });
                    } else if (response.status == false) {
                        Swal.fire({
                            template: '#error_template',
                            title: "Oops!",
                            html: '<label style="font-size:24px; font-weight:bold">' + response.message + '</label>',
                        });
                    }
                },
                error: function(error) {
                    Swal.fire({
                        template: '#error_template',
                        title: "Oops!",
                        html: '<label style="font-size:24px; font-weight:bold">Hubo un error en la solicitud</label>',
                    });
                }
            });
        });
    }
</script>