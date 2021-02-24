<html>
<title>
    Adapost pentru animale
</title>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0cd324ccff.js" crossorigin="anonymous"></script>
    <style>

    </style>
</head>
<body>
    <button onclick="getVeterinari">Afiseaza toti veterinarii</button>
    <button onclick="getClinici()">Afiseaza toate clinicile</button>
    <button onclick="getCusti()">Afiseaza toate custile</button>

        <div id="cages_div" style="display:none">
            <table id="cages_table" class="display">
                <thead>
                    <tr>
                        <th>Nr. cusca</th>
                        <th>Lungime</th>
                        <th>Latime</th>
                    </tr>
                </thead>
            </table>
        </div>
    </body>
</html>

<script>
    var table;

    function getCusti() {
        if(table) {
            table.destroy();
        }
        table = $('#cages_table').dataTable( {
            'custi.php'
        });
    }
</script>

<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
    } );
</script>