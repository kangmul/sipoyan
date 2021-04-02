// script untuk insert kelurahan dan kecamatan
$('#nokk').on('change', function(){
	var nokk = $(this).val();
	console.log(nokk)
	$('#kelurahan').val(nokk)
	$('#kecamatan').val(nokk)
});

// simpan ke tabel temporary
function tambahketabel(){
	// ambil semua isi form
	var formdata = $('form#formtambahwarga').serializeArray();
	var jmlchild = $('table#tbl_temp_1 tbody');
	let nomor = $('table#tbl_temp_1 tbody tr').length;
	jmlchild.append('<tr></tr>');
	jmlchild.append('<td>'+nomor+'</td>');
	$.each(formdata, function(index,key){
		jmlchild.append('<td>'+key.value+'</td>');
	});
	jmlchild.append('<td><div class="badge badge-danger badge-sm" onclick="hapusdatatemp('+formdata[1].value+')"><i class="fas fa-trash"></i></div></td>');
	let forrem = $('#formtambahwarga')[0].reset();
}

function hapusdatatemp(id){
	alert('ini ni nya ' + id);
}

	

