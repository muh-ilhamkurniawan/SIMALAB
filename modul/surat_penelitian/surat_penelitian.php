        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Surat Selesai Penelitian</h3>
                <p class="text-subtitle text-muted">
                  Data surat selesai penelitian laboratorium jurusan Informatika Universitas Jenderal Soedirman.
                </p>
                <div class="buttons">
                      <a href="index.php" class="btn btn-success">Kembali</a>
                </div>
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav
                  aria-label="breadcrumb"
                  class="breadcrumb-header float-start float-lg-end"
                >
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      Surat Selesai Penelitian
                    </li>
                    <li class="breadcrumb-item active">
                      Lihat Surat
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>

          <!-- Basic Tables start -->
          <section class="section">
            <div class="card">
              <div class="card-header">Data surat selesai penelitian yang sudah dibuat</div>
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
                    $sqlkelas = "select no_surat, nama, nim, judul, tanggal, namaDospem, nipDospem from surat_penelitian";
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
                                  <a href="index.php?r=edit_surat_penelitian&id=<?php echo $row['no_surat']?>"  class="badge bg-warning">Edit</a>
                                </td>
                                <td>
                                  <a href="././hapus.php?k=hapus_surat_penelitian&id=<?php echo $row['no_surat']?>" onclick="return confirm('Yakin Hapus Surat \'<?php echo $row['no_surat'];?> : <?php echo $row['nama'];?>\' ?')" class="badge bg-danger">Hapus</a>
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