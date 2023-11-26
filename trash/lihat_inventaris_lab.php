<div class="page-heading">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>Manajemen Alat dan Barang Laboratorium</h3>
                <p class="text-subtitle text-muted">
                  Data alat dan barang per laboratorium jurusan Informatika Universitas Jenderal Soedirman.
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
              <div class="card-header">Data Informasi Inventaris per Laboratorium</div>
              <div class="card-body">
              <form class="form form-horizontal" action="index.php?r=inventarisLab" method="POST">
                        <div class="form-body">
                        <div class="row">
                            <div class="col-md-3">
                              <label>Lokasi Alat dan Bahan</label>
                            </div>
                            <div class="col-md-9 form-group">
                            <select id="idLab" name="idLab" class="choices form-select" required>
                              <option value="" disabled selected>---</option>
                                  <?php
                                  $sql = "select id, nama from laboratorium";
                                  $hasil = $conn->query($sql);
                                  if ($hasil->num_rows>0) {
                                    while ($row = $hasil->fetch_assoc()) {
                                      ?>
                                      <option value="<?php echo $row['id'];?>"><?php echo $row['nama'];?></option>
                                      <?php
                                    }
                                  }
                                  ?>
                                <option value="semua" >SEMUA LOKASI</option>
                              </select>
                            </div>
                            <div class="col-sm-12 d-flex justify-content-end">
                              <button
                                type="submit"
                                class="btn btn-primary me-1 mb-1"
                                name="lihat" 
                              >
                              Lihat Surat
                              </button>
                              <button
                                type="reset"
                                class="btn btn-light-secondary me-1 mb-1"
                              >
                                Reset
                              </button>
                            </div>
                          </div>
                        </div>
                      </form>
              </div>
            </div>
          </section>
          <!-- Basic Tables end -->
        </div>