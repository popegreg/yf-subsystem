/*******************************************************************************
     Copyright (c) <Company Name> All rights reserved.

     FILE NAME: supplier.js
     MODULE NAME:  Self-Service 
     CREATED BY: MESPINOSA
     DATE CREATED: 2016.04.14
     REVISION HISTORY :

     VERSION     ROUND    DATE           PIC          DESCRIPTION
     100-00-01   1     2016.04.14     MESPINOSA       Initial Draft
*******************************************************************************/
	function action(action)
    {
        var obj_data = new Object;
        var cnt = 0;
        var selecteditem = '';

        $(".checkboxes").each(function()
        {
            var id = $(this).attr('name');
            if($(this).is(':checked'))
            {
                cnt++;
                obj_data[id] = $(this).val();
                selecteditem = obj_data[id];
            }
        });

        if (cnt == 0)
        {
            $.alert('No selected supplier.', 
            {
                position: ['center', [-0.42, 0]],
                type: 'danger',
                closeTime: 3000,
                autoClose: true
            });
        }
        else if (cnt == 1)
        {
            if (action == "EDIT")
            {
                $.post(url, 
                {
                    _token: token,
                    selected_supplier: selecteditem
                })
                .done(function(data) 
                {
                    $.each( data[0], function( key, value ) 
                    {
                        switch(key) 
                        {
                            case "id":
                                $('#edit_inputId').val(value);
                            case "code":
                                $('#edit_inputCode').val(value);
                            case "name":
                                $('#edit_inputName').val(value);
                            case "address":
                                $('#edit_inputAddress').val(value);
                            case "tel_no":
                                $('#edit_inputTelNo').val(value);
                            case "fax_no":
                                $('#edit_inputFaxNo').val(value);
                            case "email":
                                $('#edit_inputEmailAddress').val(value);
                        }
                    });
                    $("#editModal").modal("show");
                })
                .fail(function() 
                {
                    $.alert('Selected supplier was not updated. Please check the values and try again.', 
                    {
                        position: ['center', [-0.42, 0]],
                        type: 'danger',
                        closeTime: 3000,
                        autoClose: true
                    });
                });
            }
            else if (action == "DELETE")
            {
                $("#deleteModal").modal("show");
                $('#delete_inputId').val(selecteditem);
            }
        }
        else
        {
            $.alert('Please select 1 supplier.', 
            {
                position: ['center', [-0.42, 0]],
                type: 'danger',
                closeTime: 3000,
                autoClose: true
            });
        }
    }