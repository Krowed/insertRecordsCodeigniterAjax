$(document).ready(function() {

	// Load users...
	function load_users() {
		var url = 'http://localhost/insert_records/home/loadusers';

		$.ajax({
			url: url,
			method: 'POST',
			success: function(r) {
				html_tbody  = '';
				empty_users = '';
				if(r.status) {
					for(k in r.data) {
						html_tbody += `<tr class="text-center">
										<td>${r.data[k]['id_user']}</td>
										<td>${r.data[k]['name']}</td>
										<td>${r.data[k]['email']}</td>
										<td>${r.data[k]['phone']}</td>
										</tr>
						`;
					}

					$('#wrapper table #tbody').html(html_tbody);

					$('#user_empty').remove();
				}

				else {
					empty_users += `<div id="user_empty" class="text-center">
						<img src="assets/images/empty_user.jpg" class="img-fluid" witdh="300px">
						<p class="text-muted "><span class="text-danger">No hay ningún registro, agregue para comenzar*</span></p>
					</div>`;

					$('table').after(empty_users);
				}
				

			},
			dataType: 'json'
		});

		return false;
	}

	load_users();


	$('.btn_adduser').on('click', function(e) {
		e.preventDefault();

		var url  = 'http://localhost/insert_records/home/adduser',
			data = $('#form_adduser').serialize();

			if($('input[name="nombre"]').val() == '') {
				$('input[name="nombre"]').addClass('is-invalid');
			} 
			else {
				$('input[name="nombre"]').removeClass('is-invalid');
			}

			if($('input[name="email"]').val() == '') {
				$('input[name="email"]').addClass('is-invalid');
			} 
			else {
				$('input[name="email"]').removeClass('is-invalid');
			}

			if($('input[name="telefono"]').val() == '') {
				$('input[name="telefono"]').addClass('is-invalid');
			} 
			else {
				$('input[name="telefono"]').removeClass('is-invalid');
			}


			if(	$('input[name="nombre"]').val() != '' &&
				$('input[name="email"]').val() != '' &&
				$('input[name="telefono"]').val() != '') {


				$.ajax({
					url      : url,
					method   : 'POST',
					data     : data,
					success  : function(r){
						if(r.status) {
							$('#form_adduser').waitMe({
								effect: 'ios',
								waitTime: 2000,
								onClose : function() {
									load_users();
									$('#form_adduser').trigger('reset');
								}
							});

							return;
						}


						$('#form_adduser').waitMe({
							effect: 'ios',
							waitTime: 800,
							onClose : function() {
								alertify.alert(r.msg);
							}
						});
						
					},
					dataType : 'json'
				});

				return false; 
			}

			return false;
	});

});