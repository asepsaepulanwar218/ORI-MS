<?php

class Data_Barang extends Controller
{

    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/login');
        }
    }

    public function index($paramHal = 1)
    {
        $halaman        = isset($paramHal) ? (int)$paramHal : 1;
        $halaman_awal = ($halaman > 1) ? ($halaman * 12) - 12 : 0;
        // $data['brg'] = $this->model('Data_Barang_model')->getBarangByPage($halaman_awal, 1000000000);
        $data['brg'] = $this->model('Data_Barang_model')->getAllBarang();
        $data['judul'] = 'Data Barang';
        $data['allBrg'] = $this->model('Data_Barang_model')->countDataBarang();
        $data['nama'] = $this->model('User_model')->getUser();
        $data['menu'] = $this->model('Menu_model')->getRoleMenu('asa2');
        foreach ($data['menu'] as $menus) :
            $data[$menus['id']] = $this->model('Menu_model')->getMenuLevel2($menus['id']);
        endforeach;
        $this->view('templates/header', $data);
        $this->view('templates/menus', $data);
        $this->view('data_barang/index', $data);
        $this->view('templates/footer');
        $this->view('templates/sweetalert');
    }

    public function hapus($kode_brg)
    {
        $stok = $this->model('Data_Barang_model')->getBarangBykode($kode_brg);
        $stok = $stok['stok'];
        if ($stok == 0) {
            if ($this->model('Data_Barang_model')->hapusDataBarang($kode_brg) > 0) {
                Flasher::setFlash('Berhasil', 'Data barang ' . $kode_brg . ' berhasil dihapus.', 'success', 'data_barang');
                header('Location: ' . BASEURL . '/data_barang');
                exit;
            } else {
                Flasher::setFlash('Gagal',  'Data barang ' . $kode_brg . ' gagal dihapus.', 'error', 'data_barang');
                header('Location: ' . BASEURL . '/data_barang');
                exit;
            }
        } else {
            Flasher::setFlash('Gagal', 'Stok barang ' . $kode_brg . ' = ' . $stok . ', data tidak bisa dihapus.', 'error', 'data_barang');
            header('Location: ' . BASEURL . '/data_barang');
            exit;
        }
    }

    public function tambah()
    {
        $cekFile = $this->model('Data_Barang_model')->cekFileGambar();

        if ($cekFile == 22) {
            Flasher::setFlash('Gagal', 'Format file yang di-upload harus jpg/jpeg/png', 'error', 'data_barang');
            header('Location: ' . BASEURL . '/data_barang');
            exit;
        } elseif ($cekFile == 23) {
            Flasher::setFlash('Gagal', 'Ukuran gambar terlalu besar, gambar tidak boleh lebih dari 1 MB', 'error', 'data_barang');
            header('Location: ' . BASEURL . '/data_barang');
            exit;
        } else {
            $kirim = $this->model('Data_Barang_model')->tambahDataBarang($_POST);
            if ($kirim != null) {
                Flasher::setFlash('Berhasil', 'Data barang berhasil ditambahkan', 'success', 'data_barang');
                header('Location: ' . BASEURL . '/data_barang');
                exit;
            } else {
                Flasher::setFlash('Gagal', 'Data barang gagal ditambahkan', 'error', 'data_barang');
                header('Location: ' . BASEURL . '/data_barang');
                exit;
            }
        }
    }

    public function getBarang()
    {
        echo json_encode($this->model('Data_Barang_model')->getBarangBykode($_POST['kode_brg']));
    }

    public function ubah()
    {
        $cekFile = $this->model('Data_Barang_model')->cekFileGambar();

        if ($cekFile == 22) {
            Flasher::setFlash('Gagal', 'Format file yang di-upload harus jpg/jpeg/png', 'error', 'data_barang');
            header('Location: ' . BASEURL . '/data_barang');
            exit;
        } elseif ($cekFile == 23) {
            Flasher::setFlash('Gagal', 'Ukuran gambar terlalu besar, gambar tidak boleh lebih dari 1 MB', 'error', 'data_barang');
            header('Location: ' . BASEURL . '/data_barang');
            exit;
        } else {
            $edit = $this->model('Data_Barang_model')->ubahDataBarang($_POST);
            if ($edit != null) {
                Flasher::setFlash('Berhasil', 'Data barang ' . $edit . ' berhasil diubah', 'success', 'data_barang');
                header('Location: ' . BASEURL . '/data_barang');
                exit;
            } else {
                Flasher::setFlash('Gagal', 'Data barang gagal diubah', 'error', 'data_barang');
                // header('Location: ' . BASEURL . '/data_barang');
                echo "<script>$(document.main).load( " . BASEURL . "/data_barang/main);</script>";
                exit;
            }
        }
    }

    public function cari($keyword = '', $paramHal = 1)
    {
        $halaman        = isset($paramHal) ? (int)$paramHal : 1;
        $halaman_awal = ($halaman > 1) ? ($halaman * 12) - 12 : 0;
        $data['brg'] = $this->model('Data_Barang_model')->cariBarang($halaman_awal, 12, $keyword);
        $data['judul'] = 'Data Barang';
        $data['allBrg'] = $this->model('Data_Barang_model')->countDataBarang();
        $data['nama'] = $this->model('User_model')->getUser();
        // $this->view('templates/header2', $data);
        // $this->view('templates/header', $data);
        $this->view('data_barang/index_cari', $data);
        // $this->view('templates/footer');
        $this->view('templates/sweetalert');
    }

    public function main()
    {
        $data['brg'] = $this->model('Data_Barang_model')->getAllBarang();
        // echo json_encode($this->model('Data_Barang_model')->getAllBarang());
        // $this->view('templates/header2', $data);
        $this->view('data_barang/index', $data);
    }
}
