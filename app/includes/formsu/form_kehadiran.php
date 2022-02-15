<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Menambahkan Kehadiran Member Klub Ade Rai</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div style="display: none;" class="alert alert-success " id="alert">
                            <span class="close">&times;</span>
                            <strong>Data Berhasil Disimpan</strong>
                        </div>
                        <div style="display: none;" class="alert alert-danger" id='alertfail'>
                            <span class="close">&times;</span>
                            <strong>Terjadi Kesalahan</strong>
                        </div>
                        <form class="form sample">
                            <div class="form-group">
                                <label>QR Code Value</label>
                                <input type="text" class="form-control form-control-lg" aria-label="name" required />
                            </div>
                            <button type="submit" class="btn btn-success mr-3">
                                Submit
                            </button>
                            <button class="btn btn-danger">Cancel</button>

                        </form>

                        <script>
                            var myalert = document.getElementById("alert");
                            var failalert = document.getElementById("alertfail");
                            var close = document.getElementsByClassName("closebtn");
                            var i;
                            for (i = 0; i < close.length; i++) {
                                close[i].onclick = function() {
                                    var div = this.parentElement;
                                    div.style.opacity = "0";
                                    setTimeout(function() {
                                        div.style.display = "none";
                                    }, 600);
                                }
                            }
                            myalert.style.display = 'none'
                            failalert.style.display = 'none'

                            function alertsuccess() {
                                myalert.style.display = 'block'
                            }

                            function alertfailed() {
                                failalert.style.display = 'block'
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
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