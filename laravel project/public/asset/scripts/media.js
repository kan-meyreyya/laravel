$(function(e){
	$('body').find('.overlay').css('display','block');	

	GetImageList();

	$('body').on('click', '#imgRefresh', function(e){
		$('body').find('#imageTable tbody').empty();
		$('body').find('.overlay').css('display','block');
		GetImageList();
	});

	function SetDataImageTable(data){
		var table = $('body').find('#imageTable tbody');
		var element = '';

		if((data != null) && (data != undefined)){	
			console.log(data);
			// $.each(data, function(i,v){
			// 	var path = window.location.protocol + '//' + window.location.host + '/uploads/' + v.file_name;

			// 	element +=	'<tr>' +
			// 				'<td><img src="'+ path +'" class="img-responsive" alt=""/></td>' +
			// 		  		'</tr>';
			// });
			// $(table).append(element);
			$('body').find('#imageTable').DataTable({
				'ajax' : data,
				'columns' : [
					{ 'data' : 'Data.created_date' }
				]
			});
		}
	}

	function GetImageList(){
		RequestImageList(function(data){
			SetDataImageTable(data)
		});
	}

	function RequestImageList(callback){
		$.ajax({
			type: 'GET',
			url: 'imageList'
		}).done(function(data){
			if( typeof callback === 'function'){
				callback(JSON.parse(data));
			}
		}).complete(function(data){
			$('body').find('.overlay').css('display','none');
		});
	}
});