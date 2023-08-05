<script src="<?= BASEURL; ?>/assets/js/sweetalert2.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<script src="<?= BASEURL; ?>/assets/js/jquery-3.6.1.min.js"></script>
<script type="text/javascript" src="<?= BASEURL; ?>/assets/js/script.js"></script>
<!-- Table with stripped rows -->
<table class="table table-striped tabel-barang">
    <thead>
        <tr>
            <th scope="col" class="text-center" width="7%">No</th>
            <th scope="col" width="15%">Kode Barang</th>
            <th scope="col">Nama Barang</th>
            <th scope="col" class="text-end">Persediaan</th>
            <th scope="col" class="px-3"></th>
            <th scope="col" width="15%">Tipe Barang</th>
            <th scope="col" width="15%">Posisi</th>
            <th scope="col" class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $i = 1; ?>
        <?php foreach ($data['brg'] as $brg) : ?>
            <tr>
                <td class="text-center"><?= $i; ?></td>
                <td class="px-2"><?= $brg['kode_brg']; ?></td>
                <td class="px-2"><?= $brg['nm_barang']; ?></td>
                <td class="text-end px-2"><?= $brg['stok']; ?></td>
                <td class="px-2"></td>
                <td class="px-2"><?= $brg['tipe_brg']; ?></td>
                <td class="px-2"><?= $brg['posisi']; ?></td>
                <td class="text-center">
                    <a href="<?= BASEURL; ?>/data_barang/hapus/<?= $brg['kode_brg']; ?>" class="text-decoration-none  me-1 text-danger klikHapus" type="button"><i class="ri-delete-bin-2-line"></i></a>
                    <a class="text-decoration-none me-1 text-success tampilModalUbah" type="button" data-bs-toggle="modal" data-bs-target="#formBarang" data-kode_brg="<?= $brg['kode_brg']; ?>"><i class="ri-edit-box-fill"></i></a>
                    <a class="text-decoration-none me-1 text-primary klikDetail" type="button" data-bs-toggle="modal" data-bs-target="#detailBarang" data-kode_brg="<?= $brg['kode_brg']; ?>"><i class="bx bxs-detail"></i></a>
                </td>
            </tr>
            <?php $i++ ?>
        <?php endforeach; ?>
    </tbody>
</table>
<!-- End Table with stripped rows -->