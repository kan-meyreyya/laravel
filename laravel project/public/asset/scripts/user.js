$(function(){	
	var dataObject = {
		url: null,
		type: null
	}

	$('body').find('.overlay').css('display','block');
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
		}
    })

    GetUserList();

	$('body').on('click', '.popup', function(e){
		var content = $('body').find('#myModal');
		var dataOptions = {
			target: $(this).data('item'),
			name: $(this).data('name'),
			id: $(this).data('id')
		}

		$('body').find('#myModal .modal-title').html(dataOptions.name);

		if(dataOptions.target == 'new'){
			dataObject.type = 'POST';
			dataObject.url = 'user';
			
			$(content).find('.password-wrap').show();
			$(content).find('input[type=text],input[type=email],input[type=password]').val('');

		}else{
			dataObject.type = 'PUT';
			dataObject.url = 'user/' + dataOptions.id;
			$.ajax({
				type: 'GET',
				url: 'user/' + dataOptions.id
			}).done(function(data){
				data = JSON.parse(data);
				SetDataToForm(data['0']);
			});
		}	
		AddValidationUser(dataObject);	
	});

	$('body').on('click', '.deleteUser', function(e){
		var id = $(this).data('id');
		var token = $('meta[name=token]').attr('content');
		swal({   
			title: 'Do you want to delete this user?',   
			text: 'This user will be delete from database!',   
			type: 'warning',   
			showCancelButton: true,   
			confirmButtonColor: '#DD6B55',   
			confirmButtonText: 'Yes, delete it!',   
			closeOnConfirm: false 
		}, function(){		
			$.ajax({
				type: 'DELETE',
				url: 'user/' + id,
				data: { '_token' : token }				
			}).done(function(e){
				GetUserList();
				swal('Deleted!', '' , 'success');
			});			
		});
	});

	function SetDataToForm(data){	
		var content = $('body').find('#myModal');
		$(content).find('.password-wrap').hide();
		$(content).find('#username').val(data.username);
		$(content).find('#email').val(data.email);
		$(content).find('[name=role]').val(data.role);
	}
	
	function GetUserList(){
		RequestUserList(function(data){
			SetUserData(data);
		});
	}

	function SetUserData(user){
		var table = $('body').find('.userTable');
		$(table).find('tbody').empty();
		var element = '';
		if((user != null) && (user != undefined)){
			$.each(user, function(i,v){
				element += '<tr><td>'+ v.username +'</td><td>'+ v.email +'</td><td>'+ v.role +'</td><td>'+ v.created_at.toString('dd-mm-Y') +'</td>' +
						  '<td><button type="button" data-item="edit" class="btn btn-sm btn-primary editUser popup" data-name="'+ v.username +'" data-id="'+ v.id +'" data-toggle="modal" data-target="#myModal">' +
						  '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>&nbsp;' +
						  '<button type="button" class="btn btn-sm btn-danger deleteUser" data-name="'+ v.username +'" data-id="'+ v.id +'"​​​​>' +
						  '<i class="fa fa-trash" aria-hidden="true"></i> Delete</button>' +
						  '</td></tr>';
			});
			$(table).find('tbody').append(element);
		}		
	}

	function AddValidationUser(url){
		var form = $('body').find('.mainForm');
		form.bootstrapValidator({
			feedbackIcons: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	        },
	        fields:{
	        	username: {
	        		validators: {
	                    notEmpty: {
	                        message: 'The username is required and cannot be empty'
	                    }
	                }
	        	},
	        	email: {
	        		validators: {
	        			notEmpty: {
	                        message: 'The input is not a valid email address'
	                    }
	        		}
	        	},
	        	password: {
	                validators: {
	                    notEmpty: {
	                        message: 'The password is required and cannot be empty'
	                    },
	                    identical: {
	                        field: 'comfirm_password',
	                        message: 'The password and its confirm are not the same'
	                    },
	                    different: {
	                        field: 'username',
	                        message: 'The password cannot be the same as username'
	                    }
	                }
	            },
	            comfirm_password: {
	                validators: {
	                    notEmpty: {
	                        message: 'The confirm password is required and cannot be empty'
	                    },
	                    identical: {
	                        field: 'password',
	                        message: 'The password and its confirm are not the same'
	                    },
	                    different: {
	                        field: 'username',
	                        message: 'The password cannot be the same as username'
	                    }
	                }
	            }
	        }
		}).on('success.form.bv', function (e){			
			var userData = {
				username: form.find('#username').val(),
				email: form.find('#email').val(),
				password: form.find('#password').val(),
				role: form.find('[name=role]').val()
			}

			$.ajax({
				type: dataObject.type,
				url: dataObject.url,
				headers: { 'X-CSRF-Token': form.find('input[name=_token]').val() },
				data: userData,
			}).done(function(data){
				$('#myModal').modal('hide');
				window.location.href = 'user';
			})

			$('body').on('click', '.saveUser', function(e){
			 	e.preventDefault();
                form.bootstrapValidator('validate');
			});
		});
	}

	function RequestUserList(callback){
		$.ajax({
			type: 'GET',
			url: 'userlist'
		}).done(function(data){
			if( typeof callback === 'function'){
				callback(JSON.parse(data));
			}
		}).complete(function(data){
			$('body').find('.overlay').css('display','none');
		});
	}

});