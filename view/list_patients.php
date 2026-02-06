
<div id="sectionListPatients">
    <div class="d-flex justify-content-center">
        <button class="btn btn-success col-12 col-md-3 col-lg-md-2" onclick="addPatientForm()">Agregar</button>
    </div>

    <table id="tableListPatients" class="table table-striped table-hover table-responsive" style="width:100%">
        <thead class="table-primary">
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>CURP</th>
                <th>RFC</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<div id="form_section">

</div>

<script>

    $(document).ready(function() {
        console.log(jQuery.fn.jquery);
        tabla();
    });

    function searchData() {
        $('#tableListPatients').DataTable().ajax.reload(null, false);
    }

    function tabla() {
        $('#tableListPatients').DataTable({
            // language: {
            //     url: '/config/datatables-bs5/language-spanish.json'
            // },
            ordering: false,
            responsive: true,
            keys: false,
            pageLength: 10,
            lengthMenu: [10, 25, 50, 100],
            ajax: {
                url: 'controllers/list_patients_controller.php',
                type: 'GET',
                dataSrc: ''
            },
            columns: [
                {
                    data: 'Name'
                },
                {
                    data: 'Lastname'
                },
                {
                    data: 'CURP'
                },
                {
                    data: 'RFC'
                }
            ],
            initComplete: function() {
                // let windowHeight = $(window).height();
                // let pagelen = (windowHeight * 0.62) / 29;
                // $('#tableListPatients').DataTable().page.len(pagelen).draw();
                $('.tab-1').fadeIn();
            }
        });
    }
    
    function addPatientForm(){
        $.ajax({
            url: 'view/forms/add_patient.php',
            method: 'POST',
            success: function(response){
                $('#sectionListPatients').hide();
                $('#form_section').html(response).fadeIn();
            }
        });
    }

</script>