<script>
    //Hapus
    $('.klikHapus').on('click', function() {
        var getLink = $(this).attr('href');
        Swal.fire({
            title: "Yakin !",
            text: "Anda Akan Menghapus Data Ini ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonColor: '#3085d6',
            cancelButtonText: "Batal"

        }).then(result => {
            if (result.isConfirmed) {
                $(document.body).load(getLink);
                // window.location.href = getLink;
            }
        })
        return false;
    });
</script>