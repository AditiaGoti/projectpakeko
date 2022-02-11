<div class="main-panel">
    <div class="content-wrapper">
        <div class="row page-title-header">
            <div class="col-12">
                <div class="page-header">
                    <h4 class="page-title">Tambah Admin</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Admin</h4>
                        <p class="card-description">
                            Add New Admin klub Ade Rai Ragunan
                        </p>
                        <br />
                        <form id="form_member" class="form sample">
                            <div class="form-group">
                                <label>Name</label>
                                <input id="member_name" type="text" class="form-control form-control-lg" placeholder="Masukan Nama Member" aria-label="name" required />
                            </div>
                            <div class="form-group">
                                <label>Place of Birth</label>
                                <input id="member_pob" type="text" class="form-control form-control-lg" placeholder="Masukan Tempat Lahir Member" aria-label="pob" required />
                            </div>
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input id="member_dob" type="date" class="form-control form-control-lg" placeholder="Masukan Tanggal Lahir Member" aria-label="dob" required />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input id="member_email" type="email" class="form-control form-control-lg" placeholder="Masukan Email Member" aria-label="email" required />
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" id="member_nohp" class="form-control form-control-lg" placeholder="Masukan No. Telepon Member" aria-label="pnumber" required />
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" id="member_address" class="form-control form-control-lg" placeholder="Masukan Alamat Member" aria-label="adress" required />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input id="member_pass" type="password" class="form-control form-control-lg" placeholder="Masukan Sandi Member" aria-label="password" required />
                            </div>
                            <div class="form-group">
                                <label> CPassword</label>
                                <input id="member_cpass" type="password" class="form-control form-control-lg" placeholder="Masukan Sandi Member" aria-label="password" required />
                            </div>
                        </form>
                        <button onclick="daftarMember()" type="submit" class="btn btn-success mr-3">
                            Submit
                        </button>
                        <button class="btn btn-danger">Cancel</button>
                        <script>
                            function daftarMember() {
                                var myHeaders = new Headers();
                                myHeaders.append("Authorization", "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMTYzOGNiNTA1NjNkMWYyMjExYTE5OGQ3ZGZmYmU4ZDQ1NWJmNWEwYTZlZGFiMjc4NmJlOWVjNjgzNDcwY2ZjYTdkODU4N2EyNTc5ZDQ2OWMiLCJpYXQiOjE2NDQ1NTY3MTcuODQxOTI2LCJuYmYiOjE2NDQ1NTY3MTcuODQxOTMzLCJleHAiOjE2NzYwOTI3MTcuNzc5OTMxLCJzdWIiOiIyMSIsInNjb3BlcyI6W119.OgyrCJmDAF0xWffREg429Jt9tUCOkMEZTE7_UKAZamIHCrwVM9Fh0y7ZD9qXwCd0bSObVtfbrrRySvXgYrkTRJj_7pt6mhdAaHbWvd7XWHPaCKW1g0vsRcrPqBZncnHU2LTNojOpZRMaxFI4bOc-ku3EEtV8PwEbXz_AdB7VtW4NFXrR2oISqPlutHGpGIDE--gXEZRrg55tmyHu65oq2KHOguYjqGpnlJkjBFX7mFg2IglydNl1P3r5b5D8eX0a1S-NKNHJLvB_0QtgcflYBHXusxoQEnR-CDpCwcltZzH3ncKkkAwkYePE8zjSSbb4tYamu6tGoTVg72Oq8gv678BaMzjs4LQfdknxFMG9jVM4vjYYg2CbeefYmb-7qgTstVAXA9iLPWAMAveOI0cHKx5zx8UH2wUQifDRT3r8xS-zyeske2GJgVUE6O5NEtPf8t1k_HEBvmyWDqKxI43qMQlGIkufEtJg86rGCeXlHVgQrb73iDJj28C-_UjP6C5RfwB5uTxY-NJF7D7LdaQRGpgIIuRpmg7JIAmu9hhLDPNf13dLfuVJhNWiAv4X691tLKsPyXt14wg1NAmIoQJTOq-EFzmsTlRz1STmE4e6vPX121aavUuodYrUNJ7YPrFpVoPYBp5BUnxQXkrQSaQYZ8mqzrbPg0GeDhE8m6FjH5g");
                                myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

                                var urlencoded = new URLSearchParams();
                                urlencoded.append(
                                    "name",
                                    document.getElementById("member_name").value
                                );
                                urlencoded.append(
                                    "email",
                                    document.getElementById("member_email").value
                                );
                                urlencoded.append(
                                    "password",
                                    document.getElementById("member_pass").value
                                );
                                urlencoded.append(
                                    "password_confirmation",
                                    document.getElementById("member_cpass").value
                                );
                                urlencoded.append(
                                    "tempat_lahir",
                                    document.getElementById("member_pob").value
                                );
                                urlencoded.append(
                                    "tanggal_lahir",
                                    document.getElementById("member_dob").value
                                );
                                urlencoded.append(
                                    "nohp",
                                    document.getElementById("member_nohp").value
                                );
                                urlencoded.append(
                                    "alamat",
                                    document.getElementById("member_address").value
                                );

                                var requestOptions = {
                                    method: "POST",
                                    headers: myHeaders,
                                    body: urlencoded,
                                    redirect: "follow",
                                };
                                fetch(
                                        "https://api.klubaderai.com/api/register",
                                        requestOptions
                                    )
                                    .then((response) => response.text())
                                    .then((result) => console.log(result))
                                    .catch((error) => console.log("error", error));
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