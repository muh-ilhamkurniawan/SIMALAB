        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Organisasi</h3>
                <p class="text-subtitle text-muted">
                  Data Organisasi laboratorium jurusan Informatika Universitas Jenderal Soedirman.
                </p>
                <div class="buttons">
                      <a href="index.php" class="btn btn-success">Kembali</a>
                      <a href="index.php?r=tambah_petugas" class="btn btn-success">Tambah Data</a>
                </div>
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav
                  aria-label="breadcrumb"
                  class="breadcrumb-header float-start float-lg-end"
                >
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      Laboratorium
                    </li>
                    <li class="breadcrumb-item active">
                      Organisasi
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>

          <!-- Basic Tables start -->
          <section class="section">
            <div class="card">
              <div class="card-header">Data Organisasi Laboratorium</div>
              <div class="card-body">
                <table class="table" id="table1">
                  <thead>
                    <tr>
                      <th>NIP</th>
                      <th>Nama Lengkap</th>
                      <th>Jabatan</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $sqlkelas = "select nip, nama, jabatan from petugas";
                    $resultkelas = $conn->query($sqlkelas);
                    if ($resultkelas->num_rows>0) {
                        while ($row = $resultkelas->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row['nip'];?></td>
                                <td><?php echo $row['nama'];?></td>
                                <td><?php echo $row['jabatan'];?></td>
                                <td>
                                  <a href="index.php?r=edit_petugas&id=<?php echo $row['nip']?>"  class="badge bg-warning">Edit</a>
                                </td>
                                <td>
                                  <a href="././hapus.php?k=hapus_petugas&id=<?php echo $row['nip']?>" onclick="return confirm('Yakin Hapus Petugas \'<?php echo $row['nama'];?>\' ?')" class="badge bg-danger">Hapus</a>
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