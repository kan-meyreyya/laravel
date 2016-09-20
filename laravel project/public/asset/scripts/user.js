$(function(){

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
		}
    })

   // GetUserList();

	AddValidationUser();

	function AddValidationUser(){
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
			e.preventDefault();
			var userData = {
				username: form.find('#username').val(),
				email: form.find('#email').val(),
				password: form.find('#password').val(),
				role: form.find('[name=role]').val()
			}

			$.ajax({
				type: 'POST',
				url: 'user',
				headers: { 'X-CSRF-Token': form.find('input[name=_token]').val() },
				data: userData,
			}).done(function(data){
				$('#myModal').on('hide.bs.modal', function(e){
					window.location.href = 'user';
				});
			})

			$('body').on('click', '.saveUser', function(e){
			 	e.preventDefault();
                form.bootstrapValidator('validate');
			});
		});
	}

	$('body').on('click', '.popup', function(e){
		var content = $('body').find('#myModal');
		var dataOptions = {
			target: $(this).data('item'),
			name: $(this).data('name'),
			id: $(this).data('id')
		}

		$('body').find('#myModal .modal-title').html(dataOptions.name);

		if(dataOptions.target == 'new'){

			$(content).find('.password-wrap').show();
			$(content).find('input[type=text],input[type=email],input[type=password]').val('');

		}else{

			$.ajax({
				type: 'GET',
				url: 'user/' + dataOptions.id
			}).done(function(data){
				data = JSON.parse(data);
				SetDataToForm(data['0']);
			});
		}		
	});

	$('body').on('click', '.deleteUser', function(e){
		var id = $(this).data('id');
		var token = $(this).data('token');
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
				window.location.href = 'user';
				swal('Deleted!', '' , 'success');
			});			
		});
	});

	function SetDataToForm(data){
		console.log(data);		
		var content = $('body').find('#myModal');
		$(content).find('.password-wrap').hide();
		$(content).find('#username').val(data.username);
		$(content).find('#email').val(data.email);
		$(content).find('[name=role]').val(data.role);
	}

	function RequestUserList(callback){
		$.ajax({
			type: 'GET',
			url: 'user'
		}).done(function(e){
			if( typeof callback === 'function'){
				return callback;
			}
		});
	}

	function GetUserList(){
		RequestUserList(function(data){
			console.log(data);
		});
	}

});