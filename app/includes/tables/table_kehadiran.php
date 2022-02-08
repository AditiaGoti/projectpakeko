<style>
           * {
    outline: none;
  }
  
  .tb {
    display: table;
    width: 100%;
  }
  
  .td {
    display: table-cell;
    vertical-align: middle;
  }
  
  input,
  button {
    color: black;
    font-family: Nunito;
    padding: 0;
    margin: 0;
    border: 0;
    background-color: transparent;
  }
  
  #cover {
    position: absolute;
    top: 30%;
    left: 675px;
    right: 0;
    width: 400px;
    height: 1px;
    padding: 30px;
    margin: -83px auto 0 auto;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px yellow, 0 0 0 5px #ffffffeb;
    transform: scale(0.6);
  }
  
  form {
    height: 96px;
  }
  
  input[type="text"] {
    width: 100%;
    height: 96px;
    font-size: 30px;
    line-height: 1;
    margin-top: -50px;
    float: right;
    color: black;
  }
  
  input[type="text"]::placeholder {
    color: black;
  }
  
  #s-cover {
    width: 1px;
    padding-left: 35px;
  }
  
  button {
    position: relative;
    display: block;
    width: 5px;
    height: 5px;
    cursor: pointer;
    font-size: 10px;
  }
  
  #s-circle {
    position: relative;
    top: -5px;
    left: -30px;
    width: 37px;
    height: 37px;
    margin-top: -38px;
    border-width: 15px;
    border: 10px solid black;
    background-color: transparent;
    border-radius: 50%;
    transition: 0.5s ease all;
  }
  
  button span {
    position: absolute;
    top: 68px;
    left: 43px;
    display: block;
    width: 45px;
    height: 15px;
    background-color: transparent;
    border-radius: 10px;
    transform: rotateZ(52deg);
    transition: 0.5s ease all;
  }
  
  button span:before,
  button span:after {
    content: "";
    position: absolute;
    bottom: 5px;
    right: 112px;
    width: 25px;
    height: 10px;
    background-color: black;
    border-radius: 7px;
    transform: rotateZ(0);
    transition: 0.5s ease all;
  }
  
  #s-cover:hover #s-circle {
    top: 10px;
    width: 50px;
    height: 10px;
    margin-left: -30px;
    border-width: 0;
    background-color: yellow;
    border-radius: 20px ;
  }
  
  #s-cover:hover span {
    top: 50%;
    left: 56px;
    width: 25px;
    margin-top: -9px;
    transform: rotateZ(0);
  }
  
  #s-cover:hover button span:before {
    bottom: 11px;
    transform: rotateZ(52deg);
  }
  
  #s-cover:hover button span:after {
    bottom: -11px;
    transform: rotateZ(-52deg);
  }
  #s-cover:hover button span:before,
  #s-cover:hover button span:after {
    margin-right: -20px;
    width: 25px;
    margin-bottom: 25px;
    background-color: yellow;
  }
  @media screen and (max-width:1052px){
   
  }
  
  </style>
      <div class="main-panel">
            <div class="content-wrapper">
                <div class="row page-title-header">
                    <div class="col-12">
                        <div class="page-header">
                            <h4 class="page-title">Data Kehadiran</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Daftar Kehadiran</h4>
                                <br />
                                <div id="cover" style="margin-top: -50px; position:absolute;">
                            <form method="get" action="">
                                <div class="tb">
                                    <div class="td"><input id="1" onkeyup="searchTable(1)" type="text" placeholder="Search" required></div>
                                        <div class="td" id="s-cover">
                                            <button type="submit">
                                                <div id="s-circle"></div>
                                                    <span></span>
                                                        </button>
                                                    </div>
                                                                </div>
                                                                </form>
                                                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Email</th>
                                                    <th>Nama</th>
                                                    <th>Waktu Absen</th>
                                                    <th>Sisa Jam</th>
                                                    <th>Sisa Hari</th>
                                                    <th>Sisa Bulan</th>
                                                    <th>Sisa Tahun</th>
                                                    <th>Sisa Token</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>syahrulhusna@gmail.com</td>
                                                    <td>Syahrul Husna</td>
                                                    <td>1</td>
                                                    <td>1</td>
                                                    <td>1</td>
                                                    <td>1</td>
                                                    <td>1</td>
                                                    <td>1</td>
                                                    <td>   <button class="button-29" role="button">Update</button>
                                                    <button class="button-30" role="button">Update</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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