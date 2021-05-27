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

  ordering: true,
  pageLength: 10,
  searching: true,
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
  $.ajax({
    url: urlposyandubalita,
    data: {
      nama: nama,
      usia: usia,
      start: 0,
      length: 10
    },
    type: "POST"
  });
});

$("#posyandu-resetcaribalita").on("click", function() {
  console.log("okokok");
  $("#posyandunamabalita").val("");
  $("#posyanduusiabalita select").val("");
});

$("table#table-1-data-posyandu-balita").dataTable({
  processing: true,
  serverSide: true,
  ajax: {
    type: "POST",
    url: urlposyandubalita
  },

  // ordering: true,
  pageLength: 10,
  searching: false,
  destroy: true,
  filter: true,
  responsive: true,
  lengthChange: false
});
