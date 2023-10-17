$(function() {
	// EXIBIR MODAIS
	$("#btn_add_site").click(function(){
		clearErrors();
		$("#form_site")[0].reset();
		$("#site_img_path").attr("src", "");
		$("#modal_site").modal();
	});

	$("#btn_add_member").click(function(){
		clearErrors();
		$("#form_member")[0].reset();
		$("#member_photo_path").attr("src", "");
		$("#modal_member").modal();
	});

	$("#btn_add_user").click(function(){
		clearErrors();
		$("#form_user")[0].reset();
		$("#modal_user").modal();
	});

	$("#btn_upload_member_photo").change(function() {
		uploadImg($(this), $("#member_photo_path"), $("#member_photo"));
	});

	$("#form_site").submit(function() {
		$.ajax({
			type: "POST",
			url: BASE_URL + "restrict/save_site",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function() {
				clearErrors();
				$("#btn_save_site").siblings(".help-block").html(loadingImg("Verificando..."));
			},
			success: function(response) {
				clearErrors();
				if (response["status"]) {
					$("#modal_site").modal("hide");
					swal("Sucesso!","Site salvo com sucesso!", "success");
					dt_site.ajax.reload();
				} else {
					showErrorsModal(response["error_list"])
				}
			}
		})

		return false;
	});

	$("#form_member").submit(function() {

		$.ajax({
			type: "POST",
			url: BASE_URL + "restrict/ajax_save_member",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function() {
				clearErrors();
				$("#btn_save_member").siblings(".help-block").html(loadingImg("Verificando..."));
			},
			success: function(response) {
				clearErrors();
				if (response["status"]) {
					$("#modal_member").modal("hide");
					swal("Sucesso!","Membro salvo com sucesso!", "success");
					dt_member.ajax.reload();
				} else {
					showErrorsModal(response["error_list"])
				}
			}
		})

		return false;
	});

	$("#form_user").submit(function() {

		$.ajax({
			type: "POST",
			url: BASE_URL + "restrict/ajax_save_user",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function() {
				clearErrors();
				$("#btn_save_user").siblings(".help-block").html(loadingImg("Verificando..."));
			},
			success: function(response) {
				clearErrors();
				if (response["status"]) {
					$("#modal_user").modal("hide");
					swal("Sucesso!","Usuário salvo com sucesso!", "success");
					dt_user.ajax.reload();
				} else {
					showErrorsModal(response["error_list"])
				}
			}
		})

		return false;
	});

	$("#btn_your_user").click(function() {

		$.ajax({
			type: "POST",
			url: BASE_URL + "restrict/ajax_get_user_data",
			dataType: "json",
			data: {"user_id": $(this).attr("user_id")},
			success: function(response) {
				clearErrors();
				$("#form_user")[0].reset();
				$.each(response["input"], function(id, value) {
					$("#"+id).val(value);
				});
				$("#modal_user").modal();
			}
		})

		return false;
	});

	function active_btn_site()
	{
		$(".btn-edit-site").click(function()
		{
			$.ajax({
				type: "POST",
				url: BASE_URL + "restrict/edit_site/" + $(this).attr("site_id"),
				dataType: "json",
				data: new FormData(this),
				contentType: false,
				processData: false,
				success: function(response) {
					clearErrors();
					$("#modal_site").modal();
				}
			})
		});
	 
		$(".btn-del-site").click(function()
		{
		  site_id = $(this);
		  swal({
			 title: "Atenção!",
			 text: "Deseja excluir esse site?",
			 type: "warning",
			 showCancelButton: true,
			 confirmButtonColor: "#d9534f",
			 confirmButtonText: "Sim",
			 cancelButtontext: "Não",
			 closeOnConfirm: true,
			 closeOnCancel: true,
		  }).then((result) => {
			 if (result.value) {
				$.ajax({
				  type: "POST",
				  url: BASE_URL + "restrict/delete_site",
				  dataType: "json",
				  data: {"site_id": site_id.attr("site_id")},
				  success: function(response) {
					 swal("Sucesso!", "Exlusão executada com sucesso", "success");
					 dt_site.ajax.reload();
				  }
				})
			 }
		  })
		});
	}

	var dt_site = $("#dt_sites").DataTable(
	{
      "oLanguage": DATATABLE_PTBR,
		"autoWidth": false,
      "ajax": BASE_URL + "restrict/site_ajax_list",
      "columns": [
         {"data": "nome"},
         {"data": "imagem"},
         {"data": "url"},
			{"data": "acoes"},
      ],
      "order": [],
      "deferRender": true,
      "processing" : true,
      "language" : {
         processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',
      },
      "responsive" : true,
      "pagingType" : $(window).width() < 768 ? "simple" : "simple_numbers",
	   "columnDefs": [
			{ targets: "no-sort", orderable: false },
			{ targets: "dt-center", className: "dt-center" },
		],		
		"drawCallback": function() {
			active_btn_site();
		},
	});

	function active_btn_member() 
	{		
		$(".btn-edit-member").click(function()
		{
			$.ajax({
				type: "POST",
				url: BASE_URL + "restrict/ajax_get_member_data",
				dataType: "json",
				data: {"member_id": $(this).attr("member_id")},
				success: function(response) {
					clearErrors();
					$("#form_member")[0].reset();
					$.each(response["input"], function(id, value) {
						$("#"+id).val(value);
					});
					$("#member_photo_path").attr("src", response["img"]["member_photo_path"]);
					$("#modal_member").modal();
				}
			})
		});

		$(".btn-del-member").click(function()
		{			
			member_id = $(this);
			swal({
				title: "Atenção!",
				text: "Deseja excluir esse membro?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#d9534f",
				confirmButtonText: "Sim",
				cancelButtontext: "Não",
				closeOnConfirm: true,
				closeOnCancel: true,
			}).then((result) => {
				if (result.value) {
					$.ajax({
						type: "POST",
						url: BASE_URL + "restrict/ajax_delete_member_data",
						dataType: "json",
						data: {"member_id": member_id.attr("member_id")},
						success: function(response) {
							swal("Sucesso!", "Exclusão executada com sucesso", "success");
							dt_member.ajax.reload();
						}
					})
				}
			})			
		});
	}

	var dt_member = $("#dt_team").DataTable(
	{
      "oLanguage": DATATABLE_PTBR,
		"autoWidth": false,
      "ajax": BASE_URL + "restrict/ajax_list_member",
      "columns": [
         {"data": "nome"},
         {"data": "imagem"},
         {"data": "descricao"},
			{"data": "acoes"},
      ],
      "order": [],
      "deferRender": true,
      "processing" : true,
      "language" : {
         processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',
      },
      "responsive" : true,
      "pagingType" : $(window).width() < 768 ? "simple" : "simple_numbers",
	   "columnDefs": [
			{ targets: "no-sort", orderable: false },
			{ targets: "dt-center", className: "dt-center" },
		],		
		"drawCallback": function() {
			active_btn_member();
		},
	});

	function active_btn_user()
	{		
		$(".btn-edit-user").click(function()
		{
			$.ajax({
				type: "POST",
				url: BASE_URL + "restrict/ajax_get_user_data",
				dataType: "json",
				data: {"user_id": $(this).attr("user_id")},
				success: function(response) {
					clearErrors();
					$("#form_user")[0].reset();
					$.each(response["input"], function(id, value) {
						$("#"+id).val(value);
					});
					$("#modal_user").modal();
				}
			})
		});

		$(".btn-del-user").click(function()
		{
			user_id = $(this);
			swal({
				title: "Atenção!",
				text: "Deseja excluir esse usuário?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#d9534f",
				confirmButtonText: "Sim",
				cancelButtontext: "Não",
				closeOnConfirm: true,
				closeOnCancel: true,
			}).then((result) => {
				if (result.value) {
					$.ajax({
						type: "POST",
						url: BASE_URL + "restrict/ajax_delete_user_data",
						dataType: "json",
						data: {"user_id": user_id.attr("user_id")},
						success: function(response) {
							swal("Sucesso!", "Exclusão executada com sucesso", "success");
							dt_user.ajax.reload();
						}
					})
				}
			})
		});
	}

	var dt_user = $("#dt_users").DataTable(
	{
      "oLanguage": DATATABLE_PTBR,
		"autoWidth": false,
      "ajax": BASE_URL + "restrict/ajax_list_user",
      "columns": [
         {"data": "nome"},
         {"data": "email"},
			{"data": "acoes"},
      ],
      "order": [],
      "deferRender": true,
      "processing" : true,
      "language" : {
         processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>',
      },
      "responsive" : true,
      "pagingType" : $(window).width() < 768 ? "simple" : "simple_numbers",
	   "columnDefs": [
			{ targets: "no-sort", orderable: false },
			{ targets: "dt-center", className: "dt-center" },
		],		
		"drawCallback": function() {
			active_btn_user();
		},
	});
})
