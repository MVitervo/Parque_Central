
<div id="sectionListPatients">

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

<script>

    $(document).ready(function() {
        tabla();
    });

    function tabla() {
        $('#tableListPatients').DataTable({
            language: {
                url: '/config/datatables-bs5/language-spanish.json'
            },
            order: [0, 'desc'],
            responsive: true,
            keys: false,
            ajax: {
                url: '/controllers/list_patients_controller.php',
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
                let windowHeight = $(window).height();
                let pagelen = (windowHeight * 0.62) / 29;
                $('#tableListPatients').DataTable().page.len(pagelen).draw();
                $('.tab-1').fadeIn();
            }
        });
    }

    // function buscarDatos() {
    //     $('#tableListPatients').DataTable().ajax.reload(null, false);
    // }

</script>