<tbody>
    <?php

    $i = 1; ?>
    <?php foreach ($data['brg'] as $brg) : ?>
        <tr class="tr-data">
            <div>
                <td></td>
                <td class="text-center dataRowNum"></td>
                <td class="px-2"><?= $brg['kode_brg']; ?></td>
                <td class="px-2"><?= $brg['nm_barang']; ?></td>
                <td class="text-end pe-5"><?= $brg['stok']; ?></td>
                <td class="px-2"><?= $brg['tipe_brg']; ?></td>
                <td class="px-2"><?= $brg['posisi']; ?></td>
            </div>
            <td class="text-center">
                <a href="<?= BASEURL; ?>/data_barang/hapus/<?= $brg['kode_brg']; ?>" class="text-decoration-none  me-1 text-danger klikHapus" type="button" title="Hapus"><i class="ri-delete-bin-2-line"></i></a>
                <a class="text-decoration-none me-1 text-success tampilModalUbah" type="button" data-bs-toggle="modal" data-bs-target="#formBarang" data-kode_brg="<?= $brg['kode_brg']; ?>" title="Ubah"><i class="ri-edit-box-fill"></i></a>
                <a class="text-decoration-none me-1 text-primary klikDetail" type="button" data-bs-toggle="modal" data-bs-target="#detailBarang" data-kode_brg="<?= $brg['kode_brg']; ?>" title="<?= $brg['kode_brg']; ?>"><i class="bx bxs-detail"></i></a>
            </td>
        </tr>
        <?php $i++ ?>
    <?php endforeach; ?>
</tbody>