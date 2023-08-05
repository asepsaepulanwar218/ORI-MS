<?php
class Data_Barang_model
{
    private $table = 'barang';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBarang()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resulSet();
    }

    public function getBarangByPage($posisi, $limit)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' limit ' . $posisi . ',' . $limit);
        return $this->db->resulSet();
    }

    public function countDataBarang()
    {
        $this->db->query('SELECT count(kode_brg) as kode_brg FROM ' . $this->table);
        return $this->db->single();
    }

    public function getBarangBykode($kode_brg)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE kode_brg=:kode_brg');
        $this->db->bind('kode_brg', $kode_brg);
        return $this->db->single();
    }

    public function cariBarang($posisi, $limit, $keyword)
    {
        $this->db->query("SELECT * FROM " . $this->table . " where nm_barang like '%" . $keyword . "%' limit " . $posisi . "," . $limit);
        return $this->db->resulSet();
    }

    public function getNextKode()
    {
        $this->db->query("SELECT  concat('MK',lpad(substring(max(kode_brg),3,3) + 1,3,0)) as kode_brg FROM barang");
        return $this->db->single();
    }

    public function tambahDataBarang($data)
    {
        $last_kode_brg['kode'] = $this->getNextKode();
        //upload gambar
        $gambar = $this->upload('0');
        if (!$gambar) {
            "<script>
            alert('Upload gambar terlebih dahulugagal upload');
        </script>";
            return false;
        }

        $query = "INSERT INTO " . $this->table . " (kode_brg, nm_barang, stok, tipe_brg, posisi, gambar)
                    VALUES
                    (:kode_brg, :nm_barang, :stok, :tipe_brg, :posisi, :gambar)";
        $this->db->query($query);
        $this->db->bind('kode_brg', $last_kode_brg['kode']['kode_brg']);
        $this->db->bind('nm_barang', $data['nama_barang']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('tipe_brg', $data['tipe_brg']);
        $this->db->bind('gambar', $gambar);
        $this->db->bind('posisi', $data['posisi']);

        $this->db->execute();

        $kode = $last_kode_brg['kode']['kode_brg'];

        if ($this->db->rowCount() > 0) {
            return $kode;
        } else {
            return null;
        }
    }

    //fungsi upload
    public function upload($code)
    {
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        //generate ekstensi Gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        //generate nama gambar
        $kodeFileBaru['kode'] = $this->getNextKode();
        $namaFileBaru = $kodeFileBaru['kode']['kode_brg'];
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        if ($code == '0') {
            $namaFileBaru2 = $namaFileBaru;
        } else {
            $namaFileBaru2 = $code;
            $namaFileBaru2 .= '.';
            $namaFileBaru2 .= $ekstensiGambar;
        }

        $time = time();
        $upp = move_uploaded_file($tmpName, 'C:\xampp\htdocs\my-project\NiceAdmin\public\img/' . $time . '_' . $namaFileBaru2);

        if ($upp) {
            return $time . '_' . $namaFileBaru2;
        } else {
            return 'gagal';
        }

        // return $namaFileBaru2;

    }

    public function hapusDataBarang($kode_brg)
    {
        $query = "DELETE FROM " . $this->table . " WHERE kode_brg = :kode_brg";
        $this->db->query($query);
        $this->db->bind('kode_brg', $kode_brg);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataBarang($data)
    {

        if ($_FILES['gambar']['error'] === 4) {
            $gambar = $this->getBarangBykode($data['kode_brg']);
            $gambar = $gambar['gambar'];
        } else {
            $gambarLama = $this->getBarangBykode($data['kode_brg']);
            $gambarLama = $gambarLama['gambar'];
            $gambarLama = 'C:\xampp\htdocs\my-project\NiceAdmin\public\img/' . $gambarLama;
            unlink($gambarLama); // hapus gambar lama
            $gambar = $this->upload($data['kode_brg']);
        }

        $query = "UPDATE " . $this->table . "
                    SET
                    nm_barang = :nm_barang, 
                    stok = :stok, 
                    tipe_brg = :tipe_brg, 
                    gambar = :gambar,
                    posisi = :posisi
                WHERE kode_brg = :kode_brg ;
                ";

        $this->db->query($query);
        $this->db->bind('nm_barang', $data['nama_barang']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('tipe_brg', $data['tipe_brg']);
        $this->db->bind('gambar', $gambar);
        $this->db->bind('posisi', $data['posisi']);
        $this->db->bind('kode_brg', $data['kode_brg']);

        $this->db->execute();

        $kode = $data['kode_brg'];

        if ($this->db->rowCount() > 0) {
            return $kode;
        } else {
            return null;
        }
    }

    // public function cariMahasiswa() {
    //     $keyword = $_POST['keyword'];
    //     $query = 'SELECT * FROM ' . $this->table . ' WHERE nama LIKE :keyword';
    //     $this->db->query($query);
    //     $this->db->bind('keyword', "%$keyword%");
    //     return $this->db->resulSet();
    // }


    public function cekFileGambar()
    {
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        //cek apakah yg di upload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if ($_FILES['gambar']['error'] === 4) {
            return 1;
        } elseif (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            return 22;
        } elseif ($ukuranFile > 1000000) { //cek ukuran file
            return 23;
        } else {
            return 1;
        }
    }
}
