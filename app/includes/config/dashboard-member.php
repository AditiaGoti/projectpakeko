<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <div id="MemberContainer" class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card text-center">
                    <div class="card-header">
                        Hello, ${data.name}
                    </div>
                    <div id="fotoqr" value="1" class="card-body">
                        <svg>
                            <g id="qrcode" />
                        </svg>
                    </div>
                    <div class="card-footer text-muted">
                        </br>
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Riwayat Kehadiran</h4>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Tanggal</th>
                                                        <th>Waktu </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var myArray = [];
            var cardqr = document.getElementById("MemberContainer");
            const url = "https://api.klubaderai.com/api/users/1";
            var qrcode = new QRCode(document.getElementById("qrcode"), {
                width: 100,
                height: 100,
                useSVG: true,
            });
            $.ajax({
                method: "GET",
                url: url,
                headers: {
                    Authorization: "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNzA1MmM3MDdkOTc2Yjk2MjlhNDk2Y2U0ZTkzMWJhYWE3ZmEzYTM2MGRkM2E2OGNlYjQwNTNjMjY5ZGVmMDI1ZDBmYzc2NDIxYWUzMTcwMjAiLCJpYXQiOjE2NDQ2MDM4ODIuMzI1NTM2LCJuYmYiOjE2NDQ2MDM4ODIuMzI1NTM4LCJleHAiOjE2NzYxMzk4ODIuMzI0MTExLCJzdWIiOiIzNSIsInNjb3BlcyI6W119.u8BUFg9LGPD1OM06zTctTbTbvCE92dUwmODh2WiMKvKKJraRxIEGWs0jPJrhrLdTUk4ghvk8an2py6bNs2wMr8lrwtUjPiAW2r4wwR_sKsdb_ViK20Nm-3OCo-CW21rsgSHP3QmmN-R0YQlv8EBPktLXWn1Uu0tstPAah6hf6_EhYkmk5kOTnj2aaBrDGNcKdy9XD3yFjzGe1qjO1WLcG92ufbLeRj6ecaUsZY6HfuiWIqyq0dNUGIKFyYa07RlNtLQ84tQrP1gqvFNB7bL34p5H7zayAxZ6SVkes1LQo5CK_JXXdUjxUqA9lJ0v9jK5l-1OG1C84NDbiqi261Yd9zdy9UD_KXGBJXiZGUbZOaoZWH934a1Wa-Oh_lXiwMQA4wcux-oUF7gdE5fW2-wC7rCAGYFxxea3EHW1F6p1SJBYLcE7LhhcB84l51P02HBRLCMXog-LZBgA7gv1jDKRfcjDF6ypNxKZNvUNjCT12y0Eso9JFsFhfCXxAEPrBLwAZya8gWKyqqZMfRtLH3oQvgGzl_uD0vG7_LeFsNWG8ckubNHRwpPM4kdxQyxJ5qNh4ujgjFTyQm6uHHdVQwPF2ymhnXpMTWCCL_sEiY3h9WdJq9RlgcbB4SvyBmytkcdTslNcnDfAkERAYSOVn6uV7ci9SYHnJCnIh1upmG-sRI4",
                },
                success: function(response) {
                    myArray = response.data;
                    build(myArray);
                    // makeCode(myArray);
                },
            });

            function build(data) {
                var elText = data.id;
                qrcode.makeCode(elText);
                console.log(data.id);
            }
            build();


            //         function build(data) {
            //             var row = `
            //         <div class="col-lg-12 grid-margin stretch-card">
            //             <div class="card text-center">
            //                 <div class="card-header">
            //                     Hello, ${data.name}
            //                 </div>
            //                 <div id="fotoqr" value="1" class="card-body">
            //                        <svg>
            //   <g id="qrcode" />
            // </svg>
            //                 </div>
            //                 <div class="card-footer text-muted">
            //                     </br>
            //                     <div class="col-lg-12 grid-margin stretch-card">
            //                         <div class="card">
            //                             <div class="card-body">
            //                                 <h4 class="card-title">Riwayat Kehadiran</h4>
            //                                 <div class="panel-body">
            //                                     <div class="table-responsive">
            //                                         <table class="table table-striped table-bordered table-hover">
            //                                             <thead>
            //                                                 <tr>
            //                                                     <th>Tanggal</th>
            //                                                     <th>Waktu </th>
            //                                                 </tr>
            //                                             </thead>
            //                                             <tbody>
            //                                             </tbody>
            //                                         </table>
            //                                     </div>
            //                                 </div>
            //                             </div>
            //                         </div>
            //                     </div>
            //                 </div>
            //             </div>
            //         </div>`;
            //             cardqr.innerHTML += row;

            //         }
        </script>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2022. All Rights Reserved</span>
        </div>
    </footer>


    <!-- partial -->
</div>