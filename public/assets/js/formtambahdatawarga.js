// script untuk insert kelurahan dan kecamatan
$(".keunumber").keypress(function(e) {
  let keynum = e.charCode;
  if (keynum >= 48 && keynum <= 57) {
    var nokk = $("#nokk").val();
    // console.log(nokk);
    // $("#kelurahan").val(nokk);
    // $("#kecamatan").val(nokk);
  } else {
    swal("Failed", "Hanya angka yang dapat di input !", "error");
  }
});

let yearnow = new Date();
let oldyears = yearnow.getFullYear() - 80;
let rangebirthYears = oldyears + ":" + yearnow.getFullYear();
$("#tgl_lahir").datepicker({
  changeMonth: true,
  changeYear: true,
  yearRange: rangebirthYears,
  dateFormat: "dd-mm-yy",
  autoclose: true,
  todayHighlight: true
});

// simpan ke tabel temporary
function tambahketabel() {
  // ambil semua isi form
  var formdata = $("form#formtambahwarga").serializeArray();
  let formterisi = false;
  $.each(formdata, function(i, val) {
    hasil = true;
    if (val.value == "" || val.value == null) {
      let namaform = $("#" + val.name).html();
      swal("Gagal", namaform + "  belum di isi !", "error");
      hasil = false;
    }
    formterisi = hasil;
    return hasil;
  });
  if (formterisi) {
    temporarytabel(formdata);
  }
}

function temporarytabel(data) {
  var jmlchild = $("table#tbl_temp_1 tbody:last-child");
  // let nomor = $("table#tbl_temp_1 tbody tr").length + 1;
  jmlchild.append(
    "<tr><td>" +
      data[0].value.toUpperCase() +
      "</td><td>" +
      data[1].value +
      "</td><td>" +
      data[2].value +
      "</td><td>" +
      data[3].value +
      "</td><td>" +
      data[4].value +
      "</td><td>" +
      data[5].value.toUpperCase() +
      "</td><td>" +
      data[6].value +
      "</td><td>" +
      data[7].value +
      "</td><td>" +
      data[8].value.toUpperCase() +
      "</td><td>" +
      data[9].value.toUpperCase() +
      "</td><td>" +
      data[10].value.toUpperCase() +
      "</td><td>" +
      data[11].value +
      "</td><td>" +
      data[12].value +
      "</td><td>" +
      data[13].value.toUpperCase() +
      "</td><td>" +
      data[14].value.toUpperCase() +
      "</td><td><a class='badge badge-danger badge-sm' onclick='hapusdatatemp(this)'><i class='fas fa-trash'></i></a></td></tr>"
  );
  $.each(data, function(index, cod) {
    $("." + cod.name).val("");
  });
  $(".jk")
    .prop("selectedIndex", 0)
    .selectric("refresh");

  $(".agama, .tmp_lahir, .jenis_pekerjaan, .pendidikan, .status_perkawinan, .statushubkel")
    .val(null)
    .trigger("change");
}

function hapusdatatemp(id) {
  swal({
    title: "Hapus",
    text: "hapus dari tabel ??",
    icon: "warning",
    buttons: true,
    dangerMode: true
  }).then(result => {
    if (result) {
      $(id)
        .parents("tr")
        .remove();
      swal("Sukses! Data berhasl dihapus!", {
        icon: "success"
      });
    } else {
      swal("Data batal dihapus!");
    }
  });
}

$("#savealltodatabase").on("click", function() {
  let jmlrowtemp = $("table#tbl_temp_1 tbody tr").length;
  if (jmlrowtemp < 1) {
    swal("Failed! Data di dalam tabel masih kosong", {
      icon: "error"
    });
  } else {
    swal({
      title: "Simpan",
      text: "Data dari tabel akan di simpan ke database ?? ??",
      icon: "info",
      buttons: true,
      dangerMode: true
    }).then(result => {
      if (result) {
        let datatabel_temp = [];
        $("table#tbl_temp_1 tr").each(function(i, data) {
          if (
            $(data)
              .find("td:eq(0)")
              .text() == ""
          ) {
            // jika data pada item tabel baris pertama kosong
          } else {
            var subdatawrga = {
              nokk: $("#nokk").val(),
              rt: $("#rt").val(),
              rw: $("#rw").val(),
              kel: $("#kelurahan").val(),
              kec: $("#kecamatan").val(),
              kepalakk: $("#kepkk").val(),
              nama: $(data)
                .find("td:eq(0)")
                .text(),
              nik: $(data)
                .find("td:eq(1)")
                .text(),
              jk: $(data)
                .find("td:eq(2)")
                .text(),
              tmp_lahir: $(data)
                .find("td:eq(3)")
                .text(),
              tgl_lahir: $(data)
                .find("td:eq(4)")
                .text(),
              agama: $(data)
                .find("td:eq(5)")
                .text(),
              pendidikan: $(data)
                .find("td:eq(6)")
                .text(),
              jenis_pekerjaan: $(data)
                .find("td:eq(7)")
                .text(),
              status: $(data)
                .find("td:eq(8)")
                .text(),
              hubkel: $(data)
                .find("td:eq(9)")
                .text(),
              kewarganegaraan: $(data)
                .find("td:eq(10)")
                .text(),
              nopassport: $(data)
                .find("td:eq(11)")
                .text(),
              nokitap: $(data)
                .find("td:eq(12)")
                .text(),
              namaayah: $(data)
                .find("td:eq(13)")
                .text(),
              namaibu: $(data)
                .find("td:eq(14)")
                .text(),
              username: $("#beli_username").val()
            };
            datatabel_temp.push(subdatawrga);
          }
        });
        url = $(this).data("url");

        $.ajax({
          data: {
            datatabel: datatabel_temp
          },
          method: "POST",
          dataType: "json",
          url: url,
          success: function(hasil) {
            console.log(hasil);
            if (hasil.success) {
              swal({
                title: "Berhasil !",
                text: "Data Berhasil disimpan ke Database",
                icon: "success"
              });
              $("table#tbl_temp_1 tbody tr").remove();
            } else {
              swal({
                icon: "error",
                title: "Oooops.....",
                text: "Gagal disimpan ke database"
              });
            }
          }
        });
      }
    });
  }
});
