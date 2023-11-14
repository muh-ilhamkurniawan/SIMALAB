        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Surat Bebas</h3>
                <p class="text-subtitle text-muted">
                  Data surat bebas laboratorium jurusan Informatika Universitas Jenderal Soedirman.
                </p>
                <div class="buttons">
                      <a href="index.php?r=lihat_surat_bebas" class="btn btn-success">Kembali</a>
                </div>
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav
                  aria-label="breadcrumb"
                  class="breadcrumb-header float-start float-lg-end"
                >
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      Surat Bebas
                    </li>
                    <li class="breadcrumb-item active">
                      Lihat Surat
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
          <?php
            if (isset($_POST['tgl1']) && isset($_POST['tgl2'])) {
              $var1 = $_POST['tgl1'];
              $var2 = $_POST['tgl2'];
              $tgl1 = str_replace('/', '-', $var1);
              $date1 = date('Y-m-d', strtotime($tgl1));
              $tgl2 = str_replace('/', '-', $var2);
              $date2 = date('Y-m-d', strtotime($tgl2));
              $rentang = $var1." Sampai ".$var2;
            
              $sqlkelas = "select no_surat, nama, nim, judul, tanggal from surat_bebas where tanggal between '".$date1."' and '".$date2."' order by tanggal asc";
            } else {
              // Handle jika tgl1 atau tgl2 tidak diatur
              $sqlkelas = "select no_surat, nama, nim, judul, tanggal from surat_bebas order by tanggal asc";
              $rentang = '';
            }
            
          ?>
          <!-- Basic Tables start -->
          <section class="section">
            <div class="card">
              <div class="card-header">Data surat bebas yang sudah dibuat <?php echo $rentang; ?></div>
              <div class="card-body">
                <table class="table" id="table1">
                  <thead>
                    <tr>
                      <th>No Surat</th>
                      <th>Nama</th>
                      <th>NIM</th>
                      <th>Judul</th>
                      <th>Tanggal</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $resultkelas = $conn->query($sqlkelas);
                      if ($resultkelas->num_rows>0) {
                          while ($row = $resultkelas->fetch_assoc()) {
                              ?>
                              <tr>
                                  <td>
                                    <?php echo $row['no_surat'];?>
                                  </td>
                                  <td>
                                    <?php echo $row['nama'];?>
                                  </td>
                                  <td>
                                    <?php echo $row['nim'];?>
                                  </td>
                                  <td>
                                    <?php echo $row['judul'];?>
                                  </td>
                                  <td>
                                    <?php echo $row['tanggal'];?>
                                  </td>
                                  <td>
                                    <a href="index.php?r=edit_surat_bebas&id=<?php echo $row['no_surat']?>"  class="badge bg-warning">Edit</a>
                                  </td>
                                  <td>
                                    <a href="././hapus.php?k=hapus_surat_bebas&id=<?php echo $row['no_surat']?>" onclick="return confirm('Yakin Hapus Surat \'<?php echo $row['no_surat'];?> : <?php echo $row['nama'];?>\' ?')" class="badge bg-danger">Hapus</a>
                                  </td>
                              </tr><?php
                          }
                        }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </section>
          <!-- Basic Tables end -->
        </div>