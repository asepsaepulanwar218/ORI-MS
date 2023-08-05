$(function () {
  var BASEURL = "http://localhost/my-project/NiceAdmin/public/";

  $(".tampilModalUbah").on("click", function () {
    $("#formBarangLabel").html("Ubah Data Barang");
    $(".modal-footer button[type=submit]").html("Ubah Data");
    $(".modal-content form").attr(
      "action",
      "http://localhost/my-project/NiceAdmin/public/data_barang/ubah"
    );
    $("#gambar").removeAttr("required");

    var kode_barang = $(this).data("kode_brg");

    $.ajax({
      url: "http://localhost/my-project/NiceAdmin/public/data_barang/getBarang",
      data: { kode_brg: kode_barang },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#nama_barang").val(data.nm_barang);
        $("#stok").val(data.stok);
        $("#floatingSelect").val(data.tipe_brg);
        $("#floatingSelect2").val(data.posisi);
        // $('#gambar').val(data.gambar);
        $("#kode_brg").val(data.kode_brg);

        $(".modal-content img").attr("class", " ");
        $(".modal-content img").attr(
          "src",
          "http://localhost/my-project/NiceAdmin/public/img/".concat(
            data.gambar
          )
        );
      },
    });
  });

  $(".tombolTambahData").on("click", function () {
    $("#formBarangLabel").html("Tambah Data Barang");
    $(".modal-footer button[type=submit]").html("Tambah Data");
    $("#gambar").attr("required", " ");
    $(".modal-content img").attr("class", "d-none");
    $(".modal-content form")[0].reset();
    $("#stok").val(0);
  });

  // klik detail
  $(".klikDetail").on("click", function () {
    var kode_barang = $(this).data("kode_brg");

    $.ajax({
      url: "http://localhost/my-project/NiceAdmin/public/data_barang/getBarang",
      data: { kode_brg: kode_barang },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#nama_barang_id").html(data.nm_barang);
        $("#persediaan_id").html(data.stok);
        $("#tipe_barang_id").html(data.tipe_brg);
        $("#posisi_id").html(data.posisi);
        // $('#gambar').val(data.gambar);
        $("#kode_barang_id").html(data.kode_brg);

        $(".modal-content img").attr("class", " ");
        $(".modal-content img").attr(
          "src",
          "http://localhost/my-project/NiceAdmin/public/img/".concat(
            data.gambar
          )
        );
      },
    });
  });

  //klik close
  $(".btn-close").on("click", function () {
    console.log("close");
    $("#gambar").removeAttr("required");
    $("#gambar").removeAttr("oninvalid");
  });

  // // Klik Page
  // $(".klikHalaman").on("click", function () {
  //   var halaman = $(this).data("halaman");
  //   var totHal = $(this).data("tothal");
  //   $(".page-link").attr("class", "page-link klikHalaman");
  //   $(document.body).load(
  //     BASEURL.concat("data_barang/", halaman),
  //     function (responseTxt, statusTxt, xhr) {
  //       if (statusTxt == "success")
  //         $("#".concat(halaman)).attr("class", "page-link klikHalaman active");
  //       $("#captionPage").html("Page ".concat(halaman, " of ", totHal));
  //       if (statusTxt == "error")
  //         alert("Error: " + xhr.status + ": " + xhr.statusText);
  //     }
  //   );
  // });

  // Halaman Aktif
  var urlnya = $(location).attr("href");
  if (urlnya == BASEURL.concat("data_barang")) {
    $(".data_barang").removeClass("collapsed");
  }

  var cariDataBarang = document.getElementById("search");

  cariDataBarang.addEventListener("keyup", function () {
    // buat object ajax
    var xhr = new XMLHttpRequest();

    //cek kesiapan ajax
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        if (cariDataBarang.value == "") {
          $(document.body).load(BASEURL.concat("data_barang/"));
        } else {
          $(".tabel-barang").html(this.response);
          // $(document.main).load(this.response);
          $(".pagination").hide();
        }
        // $("#search").val(cariDataBarang.value);
      }
    };

    // eksekusi ajax
    xhr.open(
      "GET",
      BASEURL.concat("data_barang/cari/", cariDataBarang.value),
      true
    );
    // xhr.open("GET", BASEURL.concat("assets/js/script.js"), true);
    xhr.send();
  });

  new DataTable("#tabelBarang", {
    // order: [[3, "desc"]],
    // info: false,
    // ordering: false,
    // paging: false,
    // pagingType: "full_numbers",
    lengthMenu: [5, 10, 15, 25, 50],
    displayLength: 10,
    order: [[2, "asc"]],
    columnDefs: [
      {
        orderable: false,
        className: "select-checkbox",
        targets: 0,
      },
      {
        orderable: false,
        targets: 1,
      },
    ],
    select: {
      style: "multi",
      selector: "td:first-child",
    },
  });

  // row number
  function setRowNum() {
    var rows = $(".dataRowNum");
    for (var i = 0, len = rows.length; i < len; i++) {
      $(rows[i]).html(i + 1);
      rows[i].children[0] = i + ": " + rows[i].children[0];
    }
  }
  setRowNum();
  $("#tabelBarang_paginate").on("click", setRowNum);
  $('select[name="tabelBarang_length"]').on("click", setRowNum);
  $("thead").on("click", setRowNum);

  // akhir jquery
});

//tampil gambar sebelum simpan
var loadFile = function (event) {
  var output = document.getElementById("output");
  output.classList = "";
  output.src = URL.createObjectURL(event.target.files[0]);
};
