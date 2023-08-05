<?php

class Flasher
{
    public static function setFlash($pesan1, $pesan2, $tipe, $page)
    {
        $_SESSION['flash'] = [
            'pesan1' => $pesan1,
            'pesan2' => $pesan2,
            'tipe' => $tipe,
            'page' => $page
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            // echo 
            // '<div class="alert alert-'. $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
            //         Data Mahasiswa <strong>'. $_SESSION['flash']['pesan'] .'</strong> ' . $_SESSION['flash']['aksi'] . '
            //         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            //     </div>';

            echo "
                <script>
                    Swal.fire(
                    '" . $_SESSION['flash']['pesan1'] . "!',
                    '" . $_SESSION['flash']['pesan2'] . "',
                    '" . $_SESSION['flash']['tipe'] . "'
                    ).then(function(isConfirm) {
                        if (isConfirm) {
                            // $(document.body).load('" . BASEURL . "/" . $_SESSION['flash']['page'] . "');
                        } else {
                        //if no clicked => do something else
                        }
                    })
                </script>
                ";


            unset($_SESSION['flash']);
        }
    }
}
