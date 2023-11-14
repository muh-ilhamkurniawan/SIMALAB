<div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Manajemen Alat dan Barang Laboratorium</h3>
                <p class="text-subtitle text-muted">
                  Data alat dan barang per laboratorium jurusan Informatika Universitas Jenderal Soedirman.
                </p>
                <div class="buttons">
                      <a href="index.php?r=inventaris" class="btn btn-success">Kembali</a>
                      <a href="index.php?r=tambah_inventarisLab" class="btn btn-success">Tambah Data</a>
                </div>
              </div>
              <div class="col-12 col-md-6 order-md-2 order-first">
                <nav
                  aria-label="breadcrumb"
                  class="breadcrumb-header float-start float-lg-end"
                >
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      Inventarisasi
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Alat dan Barang Laboratorium
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>

          <!-- Basic Tables start -->
          <section class="section">
            <div class="card">
              <div class="card-header">Data Informasi Inventaris per Laboratorium </div>
              <div class="card-body">
                <table class="table" id="table1">
                  <thead>
                    <tr>
                      <th>Lokasi</th>
                      <th>Nama Alat/Barang</th>
                      <th>Merk</th>
                      <th>Unit</th>
                      <th>Keterangan</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $sqlkelas = "select id, id_laboratorium, id_alat, jumlah, keterangan from inventaris_lab";
                    $resultkelas = $conn->query($sqlkelas);
                    if ($resultkelas->num_rows>0) {
                        while ($row = $resultkelas->fetch_assoc()) {
                          
                          $namaAlatId = $row['id_alat'];
                          $queryNamaAlat = "SELECT nama FROM inventaris WHERE id = '$namaAlatId'";
                          $resultNamaAlat = $conn->query($queryNamaAlat);
                          $namaAlat = ($resultNamaAlat->num_rows > 0) ? $resultNamaAlat->fetch_assoc()['nama'] : 'Nama Alat Tidak Ditemukan';

                          $namaLabId = $row['id_laboratorium'];
                          $queryNamaLab = "SELECT nama FROM laboratorium WHERE id = '$namaLabId'";
                          $resultNamaLab = $conn->query($queryNamaLab);
                          $namaLab = ($resultNamaLab->num_rows > 0) ? $resultNamaLab->fetch_assoc()['nama'] : 'Nama Laboratorium Tidak Ditemukan';

                          $merkId = $row['id_alat'];
                          $queryMerk = "SELECT merk FROM inventaris WHERE id = '$merkId'";
                          $resultMerk = $conn->query($queryMerk);
                          $merk = ($resultMerk->num_rows > 0) ? $resultMerk->fetch_assoc()['merk'] : 'Nama Laboratorium Tidak Ditemukan';

                            ?>
                            <tr>
                                <td><?php echo $namaLab;?></td>
                                <td><?php echo $namaAlat;?></td>
                                <td><?php echo $merk;?></td>
                                <td><?php echo $row['jumlah'];?></td>
                                <td><?php echo $row['keterangan'];?></td>
                                <td>
                                  <a href="index.php?r=edit_inventarisLab&id=<?php echo $row['id']?>"  class="badge bg-warning">Detail</a>
                                </td>
                                <td>
                                  <a href="././hapus.php?k=hapus_inventaris_lab&id=<?php echo $row['id']?>" onclick="return confirm('Yakin Hapus \'<?php echo $namaAlat;?>\' ?')" class="badge bg-danger">Hapus</a>
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