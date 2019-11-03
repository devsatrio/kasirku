$(document).ready(function(){
	
	$('#cari_barang').select2({
		ajax: {
			url:'/#',
			dataType:'json',
			delay:250,
			processResults: function (data){
				return {
					results : $.map(data, function (item){
						return {
							id: item.id,
							text: item.tujuan
						}

					})
				}
			},
			cache: true
		}
	});

	window.onload = function(){
		carikode();
	}
	
	$('#tambahdetail').click(function(e){
		$('#panelnya').loading('toggle');
	});
});

function carikode(){
	$('#panelnya').loading('toggle');
	$.ajax({
		url:'../php/carikode.php',
		dataType:'json',
		success:function(data){
			$('#kode').val(data);
			},complete:function(){
                $('#panelnya').loading('stop');
            }
		});
}