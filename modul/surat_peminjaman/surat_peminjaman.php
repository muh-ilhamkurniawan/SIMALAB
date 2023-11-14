        <div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>Surat Peminjaman</h3>
                <p class="text-subtitle text-muted">
                Data surat peminjaman laboratorium jurusan Informatika Universitas Jenderal Soedirman.
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
                      Surat Peminjaman
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
              <div class="card-header">Data surat peminjaman yang sudah dibuat</div>
              <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>No HP</th>
                            <th>Pengembalian</th>
                            <th>Durasi Hari</th>
                            <th>Alat</th>
                            <th>Jumlah</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM surat_peminjaman";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo $row['nama']; ?></td>
                                    <td><?php echo $row['nim']; ?></td>
                                    <td><?php echo $row['noHp']; ?></td>
                                    <td><?php echo $row['kembali']; ?></td>
                                    <td><?php echo $row['durasi']; ?></td>
                                    <td><?php echo $row['alat']; ?></td>
                                    <td><?php echo $row['jumlah']; ?></td>
                                    <td class="text-center">
                                        <a href="index.php?r=edit_surat_peminjaman&id=<?php echo $row['id']; ?>" class="badge bg-warning m-2">Detail</a>
                                        <a href="././hapus.php?k=hapus_surat_peminjaman&id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin Hapus Surat <?php echo $row['nama']; ?>?')" class="badge bg-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php
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