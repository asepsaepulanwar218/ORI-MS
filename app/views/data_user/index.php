<div class="pagetitle">
    <h1>Data User</h1>
    <!-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav> -->
</div><!-- End Page Title -->

<section class="section">


    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body " style="min-height: 700px; position:relative; overflow: auto;">
                    <div class="row">
                        <div class="col-sm-6">
                            <h5 class="card-title">List Data User</h5>
                        </div>
                        <div class="col-sm-6">
                            <a type="" class="tombolTambahData  float-end  mt-3 fs-4" data-bs-toggle="modal" data-bs-target="#formBarang"><i class="ri-add-circle-fill"></i></a>
                        </div>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table table-striped tabel-barang display " id="tabelBarang">
                        <thead>
                            <tr>
                                <th></th>
                                <th scope="col" class="text-center" width="7%">No</th>
                                <th scope="col" width="15%">Nama</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col" width="15%">Divisi</th>
                                <th scope="col" width="15%">Status Aktif</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $i = 1; ?>
                            <?php foreach ($data['user'] as $dataUser) : ?>
                                <tr class="tr-data">
                                    <div id="dataBarang">
                                        <td></td>
                                        <td class="text-center dataRowNum"></td>
                                        <td class="px-2 kodBar"><?= $dataUser['first_name']; ?> <?= $dataUser['last_name']; ?></td>
                                        <td class="px-2"><?= $dataUser['username']; ?></td>
                                        <td class="pe-5"><?= $dataUser['email']; ?></td>
                                        <td class="px-2"><?= $dataUser['divisi']; ?></td>
                                        <td class="px-2"><?= $dataUser['activated']; ?></td>
                                    </div>
                                    <td class="text-center">
                                        <a href="<?= BASEURL; ?>/data_barang/hapus/<?= $dataUser['kode_brg']; ?>" class="text-decoration-none  me-1 text-danger klikHapus" type="button" title="Hapus"><i class="ri-delete-bin-2-line"></i></a>
                                        <a class="text-decoration-none me-1 text-success tampilModalUbah" type="button" data-bs-toggle="modal" data-bs-target="#formBarang" data-kode_brg="<?= $dataUser['kode_brg']; ?>" title="Ubah"><i class="ri-edit-box-fill"></i></a>
                                        <a class="text-decoration-none me-1 text-primary klikDetail" type="button" data-bs-toggle="modal" data-bs-target="#detailBarang" data-kode_brg="<?= $dataUser['kode_brg']; ?>" title="<?= $dataUser['kode_brg']; ?>"><i class="bx bxs-detail"></i></a>
                                    </td>
                                </tr>
                                <?php $i++ ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                    <!-- Pagination -->
                    <!-- <?php
                            $totalData    = $data['allBrg']['kode_brg'];
                            $totalHalaman = ceil($totalData / 12);
                            ?>
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end halaman-class">
              <li>
                <span class="page-link" aria-disabled="true" id="captionPage" data-totalData="<?= $totalData ?>" data-totHal="<?= $totalHalaman ?>">Page 1 of <?= $totalHalaman ?></span>
              </li>
              <?php for ($x = 1; $x <= $totalHalaman; $x++) { ?>
                <li class="page-item"><a class="page-link klikHalaman" data-halaman="<?= $x ?>" data-tothal="<?= $totalHalaman ?>" id="<?= $x ?>" type="button"><?= $x; ?></a></li>
              <?php } ?>
            </ul>
          </nav> -->

                </div>
            </div>

        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="formBarang" tabindex="-1" aria-labelledby="formBarangLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formBarangLabel">Tambah Data Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASEURL; ?>/data_barang/tambah" method="post" enctype="multipart/form-data" class="formBarang">
                <input type="hidden" name="kode_brg" id="kode_brg">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                        </div>
                        <label for="stok" class="form-label">Persediaan</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" id="stok" name="stok" readonly>
                        </div>
                        <label for="tipe_brg" class="form-label">Tipe Barang</label>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" name="tipe_brg" required>
                                <option selected></option>
                                <option value="Inventaris">Inventaris</option>
                                <option value="Gimmick">Gimmick</option>
                            </select>
                            <label for="floatingSelect">Pilih Tipe Barang ...</label>
                        </div>
                        <label for="posisi" class="form-label">Posisi</label>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect2" name="posisi">
                                <option selected></option>
                                <option value="Gudang">Gudang</option>
                                <option value="Ruang FV">Ruang FV</option>
                            </select>
                            <label for="floatingSelect2">Pilih Posisi Barang ...</label>
                        </div>
                        <label for="gambar" class="form-label">Gambar</label>
                        <div class="input-group mb-2">
                            <!-- image preview -->
                            <img class="d-none" id="output" height="150" width="150">
                        </div>
                        <div class="input-group">
                            <input type="file" class="form-control" name="gambar" id="gambar" accept="image/*" onchange="loadFile(event)">
                        </div>
                    </div>
                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary" id="tombolTambah">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="detailBarang" tabindex="-1" aria-labelledby="detailBarangLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailBarangLabel">Data Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <input type="hidden" name="kode_brg" id="kode_brg">
            <div class="modal-body">
                <div class="d-flex  justify-content-center">
                    <table>
                        <tr>
                            <td colspan="5"><img id="output" height="250" width="300"></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="py-2"></td>
                        </tr>
                        <tr>
                            <td class="pb-1">Kode Barang</td>
                            <td class="px-2">:</td>
                            <td id="kode_barang_id"></td>
                        </tr>
                        <tr>
                            <td class="pb-1">Nama Barang</td>
                            <td class="px-2">:</td>
                            <td id="nama_barang_id"></td>
                        </tr>
                        <tr>
                            <td class="pb-1">Persediaan</td>
                            <td class="px-2">:</td>
                            <td id="persediaan_id"></td>
                        </tr>
                        <tr>
                            <td class="pb-1">Tipe Barang</td>
                            <td class="px-2">:</td>
                            <td id="tipe_barang_id" td>
                        </tr>
                        <tr>
                            <td class="pb-1">Posisi</td>
                            <td class="px-2">:</td>
                            <td id="posisi_id"></td>
                        </tr>
                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-detail btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>