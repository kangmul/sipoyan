$(document).ready(function() {
  let urldatawarga = $("table#table-2-data-master-warga").data("url");
  let urldatabalita = $("table#table-2-data-master-balita").data("url");
  let urldatalansia = $("table#table-2-data-master-lansia").data("url");
  let urlposyandubalita = $("table#table-1-data-posyandu-balita").data("url");
  $("table#table-2-data-master-warga").dataTable({
    processing: true,
    serverSide: true,
    ajax: {
      type: "POST",
      url: urldatawarga
    },

    ordering: true,
    pageLength: 10,
    searching: true,
    destroy: true,
    paging: true,
    responsive: true
  });

  $("table#table-2-data-master-balita").dataTable({
    processing: true,
    serverSide: true,
    ajax: {
      type: "POST",
      url: urldatabalita
    },

    // ordering: true,
    pageLength: 10,
    searching: false,
    destroy: true,
    filter: true,
    responsive: true,
    lengthChange: false
  });

  $("table#table-2-data-master-lansia").dataTable({
    processing: true,
    serverSide: true,
    ajax: {
      type: "POST",
      url: urldatalansia
    },

    ordering: true,
    pageLength: 10,
    searching: true,
    destroy: true,
    paging: true,
    responsive: true
  });

  $("button#posyandu-caribalita").on("click", function() {
    let nama = $("#posyandunamabalita").val();
    let usia = $("#posyanduusiabalita option:selected").val();
    alert("nama " + nama + " dan usia " + usia);
  });

  $("#posyandu-resetcaribalita").on("click", function(){
    $("#posyandunamabalita").val("");
    $("#posyanduusiabalita option[value='']").val("").change();
  })
  $("table#table-1-data-posyandu-balita").dataTable({
    processing: true,
    serverSide: true,
    ajax: {
      type: "POST",
      url: urldatabalita,
      data: {
        nama: nama,
        usia: usia
      }
    },

    // ordering: true,
    pageLength: 10,
    searching: false,
    destroy: true,
    filter: true,
    responsive: true,
    lengthChange: false
  });
});
