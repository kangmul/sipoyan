$(document).ready(function() {
  let urldatawarga = $("table#table-2-data-master-warga").data("url");
  let urldatabalita = $("table#table-2-data-master-balita").data("url");
  let urldatalansia = $("table#table-2-data-master-lansia").data("url");
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
    paging: true
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
    paging: true
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
  });
});
