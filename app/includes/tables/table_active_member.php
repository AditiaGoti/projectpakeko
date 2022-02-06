        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row page-title-header">
                    <div class="col-12">
                        <div class="page-header">
                            <h4 class="page-title">Data Member Active</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Active Member</h4>
                                <br />
                                <div class="topnav">
                      <div class="search-container">  
                    <input type="text" id="1" onkeyup="searchTable(1)" size="20" placeholder="Search" style="margin-left:700px;"></input>
                    </div></div>
                    <div class="panel-body">
                      <div class="table-responsive" style="width: auto;">
                        <table id="table1"
                          class="table table-striped table-bordered table-hover" style="white-space: normal;"
                        >
                      
                                            <thead>
                                                <tr>
                                                    <th onclick="sortTable('num',0)">#</th>
                                                    <th onclick="sortTable('alfa',1)">Nama</th>
                                                    <th>Tempat Lahir</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Email</th>
                                                    <th>No. HP</th>
                                                    <th>Alamat</th>
                                                    <th>Expired</th>
                                                    <th>Token</th>
                                                    <th onclick="sortTable('date',3)">Tgl Bergabung</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Syahrul Husna</td>
                                                    <td>Jakarta</td>
                                                    <td>22 Maret 2000</td>
                                                    <td>Syahrul Husna</td>
                                                    <td>syahrulhusna@gmail.com</td>
                                                    <td>Jl. Sapta No. 88</td>
                                                    <td>27 Maret 2022</td>
                                                    <td>15</td>
                                                    <td>1 Januari 2022</td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Husna Sy</td>
                                                    <td>Jakarta</td>
                                                    <td>23 Maret 2000</td>
                                                    <td>husna@gmail.com</td>
                                                    <td>09302382093</td>
                                                    <td>Jl. Sapta No. 90</td>
                                                    <td>30 Maret 2022</td>
                                                    <td>15</td>
                                                    <td>1 Januari 2022</td>
                                                </tr>
                                            
                                                </tbody>
                                                <tbody>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Rizki kun</td>
                                                    <td>Jakarta</td>
                                                    <td>23 Feb 2000</td>
                                                    <td>kunrizki@gmail.com</td>
                                                    <td>09302388093</td>
                                                    <td>Jl. cahaya No. 90</td>
                                                    <td>12 Maret 2022</td>
                                                    <td>15</td>
                                                    <td>1 Januari 2022</td>
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
            <script>
      function searchTable(col) {
  var input, filter, table, tr, td, i;
  input = document.getElementById(col);
  filter = input.value.toUpperCase();
  table = document.getElementById("table1");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    if(col=='1') td = tr[i].getElementsByTagName("td")[1];
    else if(col=='3') td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }     
  }
}
    function sortTable(d,n) {
      var table, rows, col_header, switching, i, x, y, a,b,shouldSwitch, dir = "asc", switchcount = 0;
      table = document.getElementById("table1");
      rows = table.getElementsByTagName("tr");
      col_header  = rows[0].getElementsByTagName("th")[n];
      switching = true;
      while (switching) {
        switching = false;    
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("td")[n];
            y = rows[i + 1].getElementsByTagName("td")[n];
            if (d=="num")
            {   a = Number(x.innerHTML);
                b = Number(y.innerHTML);
            } else if (d=="alfa")
            {   a = x.innerHTML.toLowerCase();
                b = y.innerHTML.toLowerCase();
            } else if (d=="date")
            {   a = Date.parse(x.innerHTML);
                b = Date.parse(y.innerHTML);
            }
            if (dir == "asc") {
                if (a > b) {
                  shouldSwitch = true;
                  break;
                }
            } else if (dir == "desc") {
                if (a < b) {
                  shouldSwitch = true;
                  break;
                }
            }
        }
        if (shouldSwitch) {
          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
          switchcount ++;
        } else {
          if (switchcount == 0 && dir == "asc") {
            dir = "desc";
            switching = true;
          }
        }   
      }
      resetHeader();
      if (dir == "asc") {col_header.textContent =  headerCol[n] + " \u2191";}
      if (dir == "desc") {col_header.textContent = headerCol[n] + " \u2193";}
    }
    </script>
   
            <footer class="footer">
                <div class="container-fluid clearfix">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2022. All Rights Reserved</span>
                </div>
            </footer>
            <!-- partial -->
        </div>