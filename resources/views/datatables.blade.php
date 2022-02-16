<?php session_start(); ?>

<head>
    <link href="  https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap.min.js"></script>
</head>

<body>

    <table id="table-data">
        <thead>
            <tr>
                <th>id</th>
                <th>Paket</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            <script>
                var tokenSession = '<?php echo $_SESSION['token']; ?>';
                var token = "Bearer" + " " + tokenSession;
                var myArray = [];
                var tablePaket = document.getElementById("tabel-data");
                const url = "https://api.klubaderai.com/api/pakets";
                $(document).ready(function() {
                    $.ajax({
                        method: "GET",
                        url: url,
                        headers: {
                            Authorization: token,
                        },
                        success: function(response) {
                            data = response.data;
                            $.each(data, function(i, data) {
                                var body = "<tr>";
                                body += "<td>" + data.id + "</td>";
                                body += "<td>" + data.paket + "</td>";
                                body += "<td>" + data.harga + "</td>";
                                body += "</tr>";
                                $("#table-data tbody").append(body);
                            });
                            /*DataTables instantiation.*/
                            $("#table-data").DataTable();
                        },
                        error: function() {
                            alert('Fail!');
                        }
                    });

                });
            </script>
        </tbody>

    </table>
</body>