$(document).ready(function(){
	carikode();
	$('#cari_barang').select2({
		placeholder:'cari berdasarkan nama barang',
		ajax: {
			url:'../php/caribarang.php',
			dataType:'json',
			delay:250,
			processResults: function (data){
				return {
					results : $.map(data, function (item){
						return {
							id: item.id,
							text: item.nama_barang
						}

					})
				}
			},
			cache: true
		}
	});
	//=================================================
	$('#cari_barang').on('select2:select',function(e){
		$('#panelnya').loading('toggle');
			var kode = $(this).val();
			$.ajax({
                type: 'GET',
                url: '../php/caridetailbarang.php?kode='+kode,
                dataType:'json',
                success:function (data){
				return {
					results : $.map(data, function (item){
						$("#namabarang").val(item.nama_barang);
						$("#hargabarang").val(item.harga);
					})}
				 
				},complete:function(){
                    	$('#panelnya').loading('stop');
                    }
            });
		});
	$('#bersihdetail').click(function(e){
		bersihform();
	});
	$('#tambahdetail').click(function(e){
		if($('#kode').val()=='' || $('#jumlah').val()=='0' || $('#namabarang').val()=='' || $('#hargabarang').val()=='0' || $('#subtotal').val()=='0'){
			alert('Data Tidak Boleh Kosong')
		}else{
		$.ajax({
                    url: '../php/tambahdetailtransaksi.php',
                    type: 'POST',
                    data:{
                    	'kode': $('#kode').val(),
                    	'namabarang': $('#namabarang').val(),
						'harga': $('#hargabarang').val(),
    					'jumlah': $('#jumlah').val(),
    					'subtotal': $('#subtotal').val(),
    					},
                    success: function () {
                    	alert('Data Disimpan');
                    	getdata();
                    	bersihform();
                    },complete:function(){
                    	$('#panelnya').loading('stop');
                    }
                });	
		}
		
	});

	function hitungsubtotal(){
	var jumlah = $('#jumlah').val();
	var harga = $('#hargabarang').val();
	var subtotal = parseInt(jumlah) * parseInt(harga);
	$('#subtotal').val(subtotal);
}
window.hitungsubtotal=hitungsubtotal;
});

function carikode(){
	$('#panelnya').loading('toggle');
	$.ajax({
		url:'../php/carikode.php',
		dataType:'json',
		success:function(data){
			$('#kode').val(data);
			getdata();
			},complete:function(){
                $('#panelnya').loading('stop');
            }
		});
}

function bersihform(){
	$('#jumlah').val('');
		$('#namabarang').val('');
		$('#hargabarang').val('0')
		$('#subtotal').val('0');
		$('#cari_barang').val(null).trigger('change');
}
//==================================================
	function getdata(){
		$('#paneldatanya').loading('toggle');
		var noresi = $('#kode').val();
		$.ajax({
            type:'GET',
            dataType:'json',
            url: '../php/caridetailtransaksi.php?kode='+noresi,
            success:function(data){
                managerow(data);
            },error:function(){
            },complete:function(){
                $('#paneldatanya').loading('stop');
            }
        });
	}
	//=================================================
	function managerow(data){
		var rows ='';
		var no=0;
			$.each(data,function(key, value){
				no +=1;
                rows = rows + '<tr class="gradeX">';
                rows = rows + '<td class="text-center"><button type="button" class="btn btn-warning btn-sm""><i class="fa fa-trash"></i></button></td>';
                rows = rows + '<td class="text-center">'+no+'</td>';
                rows = rows + '<td class="text-center">' +value.barang+'</td>';
                rows = rows + '<td class="text-center">' +value.jumlah+'</td>';
                rows = rows + '<td class="text-right"> Rp. ' +rupiah(value.harga)+'</td>';
                rows = rows + '<td class="text-right"> Rp. ' +rupiah(value.subtotal)+'</td>';
                rows = rows + '</tr>';

            });
            $("#tubuh").html(rows);
	}
	//==================================================
		function rupiah(bilangan){
			var	number_string = bilangan.toString(),
			sisa 	= number_string.length % 3,
			rupiah 	= number_string.substr(0, sisa),
			ribuan 	= number_string.substr(sisa).match(/\d{3}/gi);
			
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}
			return rupiah;
		}