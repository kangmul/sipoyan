$(document).ready(function() {
  let urlreferenceagama = $(".refagama").data("url");
  $(".refagama").select2({
    minimumInputLength: 2,
    ajax: {
      url: urlreferenceagama,
      dataType: "JSON",
      type: "GET",
      quietMillis: 50,
      data: function(term) {
        return {
          key: term
        };
      },
      processResults: function(data, page) {
        return {
          results: data.map(function(item) {
            return {
              id: item.text,
              text: item.text
            };
          })
        };
      }
    }
  });
});
