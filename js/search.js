// $(document).ready(function(){
// 	$('#cari').hide();
// });

$(document).ready(function(){
	//event
	$('#keyword').on('keyup',function(){
		$('#isi').load('ajax/buku.php?keyword=' + $('#keyword').val());
	});
});

