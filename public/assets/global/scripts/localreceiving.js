var count_batch = 0;
$(function() {
	getLocalMaterialData('',$('#loc_info_id').val());
	checkAllCheckboxesInTable('.group-checkable','.checkboxes');

	$('#btn_save').on('click', function(e) {
		var data = {
			_token: token,
			id: $('#loc_info_id').val(),
			receive_no: $('#controlno').val(),
			invoice_no: $('#invoice_no').val(),
			orig_invoice: $('#orig_invoice').val(),
			invoicedate: $('#invoicedate').val(),
			receivingdate: $('#receivingdate').val(),
			save_type: $('#save_type').val(),
		}
		
		$.ajax({
			url: savematlocURL,
			type: 'POST',
			dataType: 'JSON',
			data: data,
		}).done(function(data,textStatus,jqXHR) {
			msg(data.msg,data.status);
			getLocalMaterialData();
		}).fail(function(data,textStatus,jqXHR) {
			console.log(data);
		});
	});

	$('#controlno').on('change', function() {
		getLocalMaterialData('',$('#controlno').val());
	});

	$('#uploadbatchfiles').on('submit', function(e) {
		$('#progress-close').prop('disabled', true);
		$('#progressbar').addClass('progress-striped active');
		$('#progressbar-color').addClass('progress-bar-success');
		$('#progressbar-color').removeClass('progress-bar-danger');
		$('#progress').modal('show');

		var formObj = $('#uploadbatchfiles');
		var formURL = formObj.attr("action");
		var formData = new FormData(this);
		var fileName = $("#localitems").val();
		var ext = fileName.split('.').pop();
		var tbl_batch = '';
		e.preventDefault(); //Prevent Default action.

		if ($("#localitems").val() == '') {
			$('#progress-close').prop('disabled', false);
			$('#progress-msg').html("Upload field is empty");
		} else {
			if (fileName != ''){
				if (ext == 'xls' || ext == 'xlsx' || ext == 'XLS' || ext == 'XLSX') {
					$('.myprogress').css('width', '0%');
					$('#progress-msg').html('Uploading in progress...');
					var percent = 0;

					$.ajax({
						url: formURL,
						type: 'POST',
						data:  formData,
						mimeType:"multipart/form-data",
						contentType: false,
						cache: false,
						processData:false,
						xhr: function() {
							var xhr = new window.XMLHttpRequest();
							if (xhr.upload) {
								xhr.upload.addEventListener("progress", function (evt) {

									var loaded = evt.loaded;
									var total = evt.total;

									if (evt.lengthComputable) {
										percent = Math.ceil(loaded / total * 100);
										// var percentComplete = evt.loaded / evt.total;
										// percentComplete = parseInt(percentComplete * 100);

										//if (percentComplete < 100) {
										// $('.myprogress').text(percent + '%');
										$('.myprogress').css('width', percent + '%');
										//}
										if (percent == 100) {
											$('.myprogress').css('width', percent + '%');
											$('#progress-msg').html('Finalizing upload...');
										}
									}
								}, false);
							}
							return xhr;
						}
					}).done(function(data) {
						$('#progressbar').removeClass('progress-striped active');
						var datas = JSON.parse(data);
						console.log(datas);

						if (datas.status == 'success') {
							getLocalMaterialData();
							$('#progress-close').prop('disabled', false);
							$('#progress-msg').html("Items were successfully uploaded.");
						} else {
							$('#progress-close').prop('disabled', false);
							$('#progressbar-color').removeClass('progress-bar-success');
							$('#progressbar-color').addClass('progress-bar-danger');
							$('#progress-msg').html(datas.msg);
						}
					}).fail(function(data) {
						$('#progress-close').prop('disabled', false);
						$('#progressbar').removeClass('progress-striped active');
						$('#progressbar-color').removeClass('progress-bar-success');
						$('#progressbar-color').addClass('progress-bar-danger');
						$('#progress-msg').html("There's some error while processing.");
					});
				} else {
					$('#progress-close').prop('disabled', false);
					$('#progress-msg').html("Please upload a valid excel file.");
				}
			}
		}
	});

	$('#btn_excel').on('click', function() {
		$('#reportModal').modal('show');
	});

	$('#tbl_batch_body').on('click', '.barcode_item_batch', function(e) {
        $('#lodaing').modal('show');
        var id = $(this).attr('data-id');
        var txnno = $(this).attr('data-txnno');
        var txndate = $(this).attr('data-txndate');
        var itemno = $(this).attr('data-itemno');
        var itemdesc = $(this).attr('data-itemdesc');
        var qty = $(this).attr('data-qty');
        var bcodeqty = $(this).attr('data-bcodeqty');
        var lotno = $(this).attr('data-lotno');
        var location = $(this).attr('data-location');
        var exp_date = $(this).attr('data-exp_date');
        var barcode = $(this).attr('data-barcode');
        
        var data = {
            _token: token,
            receivingno: $('#controlno').val(),
            receivingdate: $('#receivingdate').val(),
            id: id,
            txnno : txnno,
            txndate : txndate,
            itemno : itemno,
            itemdesc : itemdesc,
            qty: qty,
            bcodeqty : bcodeqty,
            lotno : lotno,
            location : location,
            exp_date : exp_date,
            barcode : barcode,
            state: 'single'
        };


        if ($('#invoice_no').val() == '' || $('#controlno').val() == '') {
             msg("Please provide some values for Invoice Number or Local Receiving Number.",'failed');
             $('#err_msg').html("");
        } else {
             $.ajax({
                  url: localBarcodeURL,
                  type: "POST",
                  data: data,
             }).done( function(data, textStatus, jqXHR) {
                  $('#lodaing').modal('hide');
                  if (data.request_status == 'success') {
                       msg(data.msg,data.request_status);
                       $('#print_br_'+itemno).val(itemno);
                       $('#print_br_'+itemno).prop('checked', 'true');
                  } else {
                       msg(data.msg,data.request_status);
                  }
             }).fail( function(data, textStatus, jqXHR) {
                  $('#loading').modal('hide');
                  msg("There's some error while processing.",'error');
             });
        }
    });

    $('#tbl_batch_body').on('click', '.edit_batch', function(e) {
    	$('.clearbatch').val('');
    	e.preventDefault();
    	$('#batch_save_status').val('EDIT');
    	getPackageCategory();

    	$('#edt_item').prop('readonly', true);
    	$('#edt_lot_no').prop('readonly', true);
    	$('#edt_loc').prop('readonly', true);

    	$('#edt_id').val($(this).attr('data-id'));
		$('#edt_item').val($(this).attr('data-item'));
		// $().val($(this).attr('data-item_desc'));
		$('#edt_qty').val($(this).attr('data-qty'));
		$('#edt_box').val($(this).attr('data-box'));
		$('#edt_box_qty').val($(this).attr('data-box_qty'));
		$('#edt_lot_no').val($(this).attr('data-lot_no'));
		$('#edt_loc').val($(this).attr('data-location'));
		$('#edt_supplier').val($(this).attr('data-supplier'));
		$('#edt_exp_date').val($(this).attr('data-exp_date'));

		if ($(this).attr('data-nr') === '1') {
			$('#nr_iqc').attr('checked',true);
		} else {
			$('#nr_iqc').attr('checked',false);
		}

		$('#EditbatchItemModal').modal('show');
    });

    $('input#nr_iqc').on('change', function(e) {
		if ($(this).is(':checked')) {
			$(this).val(1);
		} else {
			$(this).val(0);
		}
	});

    $('#btn_edit_batch').on('click', function() {
    	var nr = 0;
        if ($('#nr_iqc').is(':checked')) {
            nr = 1;
        }

    	var data = {
    		_token: token,
    		id: $('#edt_id').val(),
			item: $('#edt_item').val(),
			qty: $('#edt_qty').val(),
			box: $('#edt_box').val(),
			box_qty: $('#edt_box_qty').val(),
			lot_no: $('#edt_lot_no').val(),
			supplier: $('#edt_supplier').val(),
			exp_date: $('#edt_exp_date').val(),
			controlno: $('#controlno').val(),
			invoice_no: $('#invoice_no').val(),
			save_status: $('#batch_save_status').val(),
			nr: nr,
    	} 
    	$.ajax({
    		url: updateBatchItemURL,
    		type: 'POST',
    		dataType: 'JSON',
    		data: data,
    	}).done(function(data,textStatus,jqXHR) {
    		msg(data.msg,data.status);
    		$('#EditbatchItemModal').modal('hide');
    		getLocalMaterialData('',$('#loc_info_id').val());
    	}).fail(function(data,textStatus,jqXHR) {
    		msg('There was an error occurred.','error');
    	});
    });

    $('#btn_add_batch').on('click', function() {
    });

    $('#btn_addDetails').on('click', function() {
    	$('.clearbatch').val('');
    	$('#nr_iqc').attr('checked',false);
    	$('#edt_item').prop('readonly', false);
    	$('#edt_lot_no').prop('readonly', false);
    	$('#edt_loc').prop('readonly', false);
    	$('#batch_save_status').val('ADD');
    	getPackageCategory();
    	$('#EditbatchItemModal').modal('show');
    });

    $('#btn_print_iqc').on('click', function() {
		if ($('#controlno').val() == '' || $('#invoice_no').val() == '') {
			msg("Please provide some values for Invoice Number or Material Receiving Number.",'failed');
		} else {
			if (count_batch > 0) {
	    		var url = LocalIQCURL+'?receivingno='+$('#controlno').val()+'&&_token='+token;
	    		window.location.href= url;
	    	} else {
	    		msg("Please batch Invoice Items first.",'failed');
	    	}
		}
	});

	$('#btn_deleteDetails').on('click', function() {
		delete_modal();
	});

	$('#btn_confirm_delete').on('click', function() {
		delete_items('.chk_batch_item',DeleteBatchItemURL);
	});

});

function getLocalMaterialData(to,id) {
	var tbl_batch_body = '';
	$('#tbl_batch_body').html(tbl_batch_body);

	var data = {
		_token: token, 
		id: id,
		to: to
	};

	$.ajax({
		url: LocalMaterialDataURL,
		type: 'GET',
		dataType: 'JSON',
		data: data,
	}).done(function(data,textStatus,jqXHR) {
		//if (data.localinfo.length > 0) {
		LocalInfo(data.localinfo);
		getTotal();
		LocalBatch(data.localbatch);
		//}
		viewstate();
	}).fail(function(data,textStatus,jqXHR) {
		console.log("error");
	});
}

function LocalInfo(data) {
	if (isEmptyObject(data) !== true) {
		$('#loc_info_id').val(data.id);
		$('#controlno').val(data.receive_no);
		$('#invoice_no').val(data.invoice_no);
		$('#orig_invoice').val(data.orig_invoice_no);
		$('#invoicedate').val(data.invoice_date);
		$('#receivingdate').val(data.receive_date);
		$('#create_user').val(data.create_user);
		$('#created_at').val(data.created_at);
		$('#update_user').val(data.update_user);
		$('#updated_at').val(data.updated_at);
	}
}

function LocalBatch(data) {
	var tbl_batch_body = '';
	$('#tbl_batch_body').html(tbl_batch_body);
	console.log(data);
	if (isEmptyObject(data) !== true) {
		var cnt = 1;
		$.each(data, function(i, x) {
			var not_iqc = '';
			var printed = '';

			if (x.not_for_iqc == 1) {
				not_iqc = 'checked';
			}

			if (x.is_printed == 1) {
				printed = 'checked';
			}

			tbl_batch_body = '<tr>'+
	                            '<td class="table-checkbox" width="2.66%">'+
	                                '<input type="checkbox" class="checkboxes chk_batch_item" value="'+x.id+'"/>'+
	                            '</td>'+
	                            '<td width="4.66%">'+
	                            	'<a href="javascript:;" class="btn btn-sm blue edit_batch" data-id="'+x.id+'" data-item="'+x.item+'" data-item_desc="'+x.item_desc+'" '+
	                            		'data-qty="'+x.qty+'" data-box="'+x.box+'" data-box_qty="'+x.box_qty+'" data-lot_no="'+x.lot_no+'" '+
	                            		'data-location="'+x.location+'" data-supplier="'+x.supplier+'" data-nr="'+x.not_for_iqc+'" data-exp_date="'+x.exp_date+'">'+
	                            		'<i class="fa fa-edit"></i>'+
	                            	'</a>'+
	                            '</td>'+
	                            '<td width="3.66%">'+cnt+'</td>'+
	                            '<td width="8.66%">'+x.item+'</td>'+
	                            '<td width="16.66%">'+x.item_desc+'</td>'+
	                            '<td width="5.66%">'+x.qty+'</td>'+
	                            '<td width="6.66%">'+x.box+'</td>'+
	                            '<td width="5.66%">'+x.box_qty+'</td>'+
	                            '<td width="10.66%">'+x.lot_no+'</td>'+
	                            '<td width="7.66%">'+x.location+'</td>'+
	                            '<td width="7.66%">'+x.supplier+'</td>'+
	                            '<td width="6.66%">'+x.exp_date+'</td>'+
	                            '<td width="4.66%">'+
	                            	'<input type="checkbox" class="not_for_iqc" name="not_for_iqc[]" value="1" '+not_iqc+'>'+
	                            '</td>'+
	                            '<td width="3.66%">'+
	                            	'<input type="checkbox" class="is_printed" name="is_printed[]" value="1" '+printed+'>'+
	                            '</td>'+
	                            '<td width="4.66%">'+
	                            	'<a href="javascript:;" class="btn input-sm grey-gallery barcode_item_batch" data-txnno="'+$('#invoice_no').val()+
	                            	'" data-txndate="'+$('#receivingdate').val()+'" data-itemno="'+x.item+'" data-itemdesc="'+x.item_desc+'" data-qty="'+x.qty+
	                            	'" data-bcodeqty="'+x.box_qty+'" data-lotno="'+x.lot_no+'" data-location="'+x.location+'">'+
                                        '<i class="fa fa-barcode"></i>'+
                                    '<a>'
	                            '</td>'+
	                        '</tr>';
	        $('#tbl_batch_body').append(tbl_batch_body);
	        cnt++;
	        count_batch++;
		});
	} else {
		tbl_batch_body = '<tr>'+
			                '<td width="100%" colspan="15" class="text-center">'+
			                	'No data displayed.'+
			                '</td>'+
			            '</tr>';
		$('#tbl_batch_body').append(tbl_batch_body);
	}
}

function viewstate() {
	$('#controlno').prop('readonly',false);
	$('#btn_min').prop('disabled',false);
	$('#btn_prv').prop('disabled',false);
	$('#btn_nxt').prop('disabled',false);
	$('#btn_max').prop('disabled',false);

	$('#invoice_no').prop('readonly',true);
	$('#orig_invoice').prop('readonly',true);
	$('#invoicedate').prop('readonly',true);
	$('#receivingdate').prop('readonly',true);
	$('#btn_save').hide();
	$('#btn_back').hide();
	$('#btn_addDetails').hide();
	$('#btn_deleteDetails').hide();

	$('#btn_add').show();
	$('#btn_edit').show();
	$('#btn_search').show();
	$('#btn_excel').show();
	$('#btn_print_iqc').show();
	$('#btn_upload').prop('disabled',false);
	$('.checkboxes').prop('disabled',true);
	$('.group-checkable').prop('disabled',true);
	$('.not_for_iqc').prop('disabled',true);
	$('.is_printed').prop('disabled',true);
}

function addstate() {
	clear();
	$('#tbl_batch_body').html('<tr>'+
			                '<td width="100%" colspan="14" class="text-center">'+
			                	'No data displayed.'+
			                '</td>'+
			            '</tr>');
	$('#controlno').prop('readonly',true);
	$('#btn_min').prop('disabled',true);
	$('#btn_prv').prop('disabled',true);
	$('#btn_nxt').prop('disabled',true);
	$('#btn_max').prop('disabled',true);

	$('#invoice_no').prop('readonly',false);
	$('#orig_invoice').prop('readonly',false);
	$('#invoicedate').prop('readonly',false);
	$('#receivingdate').prop('readonly',false);
	$('#btn_save').show();
	$('#btn_back').show();

	$('#btn_add').hide();
	$('#btn_edit').hide();
	$('#btn_search').hide();
	$('#btn_excel').hide();
	$('#btn_print_iqc').hide();

	$('#create_user').val(user);
	$('#created_at').val(datenow);
	$('#update_user').val(user);
	$('#updated_at').val(datenow);

	$('#save_type').val('ADD');
	$('#btn_upload').prop('disabled',true);
	$('.group-checkable').prop('disabled',true);
	$('.checkboxes').prop('disabled',true);
	$('.not_for_iqc').prop('disabled',true);
	$('.is_printed').prop('disabled',true);
}

function editstate() {
	$('#controlno').prop('readonly',true);
	$('#btn_min').prop('disabled',true);
	$('#btn_prv').prop('disabled',true);
	$('#btn_nxt').prop('disabled',true);
	$('#btn_max').prop('disabled',true);

	$('#invoice_no').prop('readonly',false);
	$('#orig_invoice').prop('readonly',false);
	$('#invoicedate').prop('readonly',false);
	$('#receivingdate').prop('readonly',false);
	$('#btn_save').show();
	$('#btn_back').show();
	$('#btn_addDetails').show();
	$('#btn_deleteDetails').show();

	$('#btn_add').hide();
	$('#btn_edit').hide();
	$('#btn_search').hide();
	$('#btn_excel').hide();
	$('#btn_print_iqc').hide();

	$('#save_type').val('EDIT');
	$('#btn_upload').prop('disabled',false);
	$('.checkboxes').prop('disabled',false);
	$('.group-checkable').prop('disabled',false);
	$('.not_for_iqc').prop('disabled',false);
	$('.is_printed').prop('disabled',false);
}

function clear() {
	$('.clear').val('');
}

function navigate(to) {
	getLocalMaterialData(to,$('#loc_info_id').val());
}

function isEmptyObject(obj) {
	for (var key in obj) {
		if (obj.hasOwnProperty(key)) {
			return false;
		}
	}

	return true;
}

function summaryReport() {
	window.location.href = LocalSummaryReport+ "?from="+$('#from').val()+"&&to="+$('#to').val()+"&&_token="+token;
}

function getPackageCategory() {
	var options = '';
	$('#edt_box').html(options);

	$.ajax({
		url: getPackageCategoryURL,
		type: 'GET',
		dataType: 'JSON',
		data: {_token: token},
	}).done(function(data,textStatus,jqXHR) {
		$.each(data, function(i, x) {
			options = '<option value="'+x.text+'">'+x.text+'</option>';
			$('#edt_box').append(options);
		});
	}).fail(function(data,textStatus,jqXHR) {
		console.log("error");
	});
}

function delete_items(checkboxClass,url) {
	var chkArray = [];
	$(checkboxClass+":checked").each(function() {
		chkArray.push($(this).val());
	});

	if (chkArray.length > 0) {
		var data = {
			_token: token,
			ids: chkArray,
		}
		delete_now(url,data);
	} else {
		$('#delete_modal').modal('hide');
		msg("Please select at least 1 item.", 'failed');
	}
}

function delete_now(url,data) {
	$('#delete_modal').modal('hide');
	$.ajax({
		url: url,
		type: 'POST',
		dataType: 'JSON',
		data: data,
	}).done(function(data,textStatus,jqXHR) {
		msg(data.msg,data.status);
		getLocalMaterialData();
	}).fail(function(data,textStatus,jqXHR) {
		msg("There's an error occurred while processing.",'error');
	});
}

function getTotal() {
	var data = {
		_token: token,
		receiveno: $('#controlno').val()
	}
	$.ajax({
		url: getTotalURL,
		type: 'GET',
		dataType: 'JSON',
		data: data,
	}).done(function(data,textStatus,jqXHR) {
		$('#total').val(data.total);
	}).fail(function(data,textStatus,jqXHR) {
		console.log("error");
	});
	
}