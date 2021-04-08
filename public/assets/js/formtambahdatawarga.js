// script untuk insert kelurahan dan kecamatan
$("#nokk").on("change", function() {
  var nokk = $(this).val();
  console.log(nokk);
  $("#kelurahan").val(nokk);
  $("#kecamatan").val(nokk);
});

let yearnow = new Date();
let oldyears = yearnow.getFullYear() - 80;
let rangebirthYears = oldyears + ":" + yearnow.getFullYear();
$("#tgl_lahir").datepicker({
  changeMonth: true,
  changeYear: true,
  yearRange: rangebirthYears,
  dateFormat: "dd-mm-yy"
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
  var jmlchild = $("table#tbl_temp_1 tbody");
  let nomor = $("table#tbl_temp_1 tbody tr").length;
  jmlchild.append("<tr></tr>");
  jmlchild.append("<td>" + nomor + "</td>");
  $.each(data, function(index, key) {
    jmlchild.append("<td>" + key.value.toLowerCase() + "</td>");
  });
  jmlchild.append(
    '<td><div class="badge badge-danger badge-sm" onclick="hapusdatatemp(' +
      data[1].value +
      ')"><i class="fas fa-trash"></i></div></td>'
  );
  let forrem = $("#formtambahwarga")[0].reset();
}

function hapusdatatemp(id) {
  alert("ini ni nya " + id);
}
