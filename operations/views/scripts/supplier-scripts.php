
<<<<<<< HEAD
=======
<<<<<<<< HEAD:operations/views/scripts/roles-scripts.php
<<<<<<< HEAD
=======


>>>>>>> itec/felix
<script>
$(document).ready(function () {

    // Handle Save User button
$(document).on('click', '#saveRoleBtn', function () {
    const btn = this;
    setButtonLoading(btn, true);
          const payload = {
            role_name: $('#role_name').val().trim(),
            description: $('#description').val().trim()
        };

        if (!payload.role_name) {
========
>>>>>>> itec/christian
<script>
$(document).ready(function () {
  // Handle Save  button
$(document).on('click', '#saveSupplierBtn', function () {
    const btn = this;
    setButtonLoading(btn, true);
          const payload = {
            full_name: $('#full_name').val().trim(),
            email: $('#email').val().trim(),
            phone: $('#phone').val().trim(),
<<<<<<< HEAD
            type: $('#type').val(),
=======
>>>>>>> itec/christian
            address: $('#address').val().trim()
        };

        if (!payload.phone || !payload.full_name) {
<<<<<<< HEAD
=======
>>>>>>>> itec/christian:operations/views/scripts/supplier-scripts.php
>>>>>>> itec/christian
            showToast('Please fill all required fields!', 'error');
            setButtonLoading(btn, false);
            return;
           
        }

        $.ajax({
<<<<<<< HEAD
            url: '<?= App::baseUrl() ?>/_ikawa/inventory/createsupplier',
=======
<<<<<<<< HEAD:operations/views/scripts/roles-scripts.php
            url: '<?= App::baseUrl() ?>/_ikawa/settings/createrole',
========
            url: '<?= App::baseUrl() ?>/_ikawa/inventory/createsupplier',
>>>>>>>> itec/christian:operations/views/scripts/supplier-scripts.php
>>>>>>> itec/christian
            method: 'POST',
            contentType: 'application/json',
            dataType: 'json',
            data: JSON.stringify(payload),
            success: function (response) {
                if (response.success) {
                    showToast(response.message, 'success');

                    $('#myModalthree').modal('hide');
                    $('#myModalthree input').val('');
                    $('#myModalthree select').val('').trigger('chosen:updated');
                    loadData();
                } else {
                    showToast(response.message, 'error');
                }
            },
            error: function (xhr) {
                let msg = 'Something went wrong';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    msg = xhr.responseJSON.message;
                }
                showToast(msg, 'error');
            },
        complete: function() {
            setButtonLoading(btn, false); // always reset button
        }
        });

    // Initialize DataTable
    const TableData = $('#data-table-basic').DataTable({
        destroy: true,
        pageLength: 10
    });

<<<<<<< HEAD
   
    function loadData() {
    $.getJSON('<?= App::baseUrl() ?>/_ikawa/inventory/getsuppliers', function (res) {
       if (!res.success || !res.data) {
            return;
        }

        TableData.clear();

        $.each(res.data, function (index, record) {
            
            TableData.row.add([
                index + 1,
                record.full_name || '',
                record.email || '',
                record.phone || '',
                record.type || '',
                `<div class="button-icon-btn button-icon-btn-rd">
                    <button class="btn btn-default btn-icon-notika editrecord"
                        title="Edit Supplier"
                        data-id="${record.sup_id}"
                        data-full_name="${record.full_name || ''}"
                        data-email="${record.email || ''}"
                        data-phone="${record.phone || ''}"
                        data-address="${record.address || ''}"
                        data-type="${record.type || ''}">
                        <i class="notika-icon notika-edit"></i>
                    </button>
                    <button class="btn btn-default btn-icon-notika deleterecord" 
                        title="Delete Supplier" 
                        data-id="${record.sup_id}" 
                        data-full_name="${record.full_name || ''}">
                        <i class="notika-icon text-danger notika-trash"></i>
                    </button>
                </div>`
            ]);
        });

        TableData.draw(false);
    })
        }
    });


$(document).on('click', '.editrecord', function() {
    const btn = $(this);
    // Fill modal fields
    $('#edit_full_name').val(btn.data('full_name'));
    $('#edit_email').val(btn.data('email'));
    $('#edit_phone').val(btn.data('phone'));
    $("#edit_address").val( btn.data('address'));
    $('#edit_type').val(btn.data('type')).trigger('chosen:updated');
    $("#sup_id").val( btn.data('id'));
    $('#myModalfour').modal('show');
});

   // Handle edit User button
$(document).on('click', '#EditsupplierBtn', function (e) {
    e.preventDefault();
      e.preventDefault();
    const btn = this;
    setButtonLoading(btn, true);
          const payload = {
            full_name: $('#edit_full_name').val().trim(),
            email: $('#edit_email').val().trim(),
            phone: $('#edit_phone').val().trim(),
            address: $('#edit_address').val().trim(),
            type: $('#edit_type').val().trim(),            
            sup_id:$('#sup_id').val()
        };

        if (!payload.phone || !payload.full_name) {
            showToast('Please fill all required fields!', 'error');
            return;
        }

        $.ajax({
            url: '<?= App::baseUrl() ?>/_ikawa/inventory/updatesupplier',
            method: 'PUT',
            contentType: 'application/json',
            dataType: 'json',
            data: JSON.stringify(payload),
            success: function (response) {
                if (response.success) {
                    showToast(response.message, 'success');

                    $('#myModalfour').modal('hide');
                    $('#myModalfour input').val('');
                    $('#myModalfour select').val('').trigger('chosen:updated');
                    loadData();
                } else {
                    showToast(response.message, 'error');
                }
            },
            error: function (xhr) {
                let msg = 'Something went wrong';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    msg = xhr.responseJSON.message;
                }
                showToast(msg, 'error');
            },
        complete: function() {
            setButtonLoading(btn, false); // always reset button
        }
        });

    
    // Initialize DataTable
    const TableData = $('#data-table-basic').DataTable({
        destroy: true,
        pageLength: 10
    });

   
    function loadData() {
    $.getJSON('<?= App::baseUrl() ?>/_ikawa/inventory/getsuppliers', function (res) {
       if (!res.success || !res.data) {
            return;
        }

        TableData.clear();

        $.each(res.data, function (index, record) {
            
            TableData.row.add([
                index + 1,
                record.full_name || '',
                record.email || '',
                record.phone || '',
                record.type || '',
                `<div class="button-icon-btn button-icon-btn-rd">
                    <button class="btn btn-default btn-icon-notika editrecord"
                        title="Edit Supplier"
                        data-id="${record.sup_id}"
                        data-full_name="${record.full_name || ''}"
                        data-email="${record.email || ''}"
                        data-phone="${record.phone || ''}"
                        data-address="${record.address || ''}"
                        data-type="${record.type || ''}">
                        <i class="notika-icon notika-edit"></i>
                    </button>
                    <button class="btn btn-default btn-icon-notika deleterecord" 
                        title="Delete Supplier" 
                        data-id="${record.sup_id}" 
                        data-full_name="${record.full_name || ''}">
                        <i class="notika-icon text-danger notika-trash"></i>
                    </button>
                </div>`
            ]);
        });

        TableData.draw(false);
    })
        }

 });


 $(document).on('click', '.deleterecord', function() {
    const btn = $(this);
    const sup_id = btn.data('id');
    const full_name = btn.data('full_name') || 'this supplier'; 
    
    swal({   
        title: "Are you sure?",   
        text: "You will delete " + full_name + "! This action cannot be undone.",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonText: "Yes, delete!",
        cancelButtonText: "No, cancel!"
    }).then(function(isConfirm){
        if (isConfirm) {
            // Show loading state on button
            const originalHtml = btn.html();
            btn.html('<i class="notika-icon notika-loading"></i> Deleting...').prop('disabled', true);
            
            $.ajax({
                url: '<?= App::baseUrl() ?>/_ikawa/inventory/deletesupplier/' + sup_id,
                method: 'DELETE',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        swal("Deleted!", response.message || "Supplier has been deleted successfully.", "success");
                        loadData();
                        
                    } else {
                        swal("Error!", response.message || "Failed to delete user.", "error");
                    }
                },
                error: function(xhr, status, error) {
                    let errorMsg = "Failed to delete user. Please try again.";
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMsg = xhr.responseJSON.message;
                    }
                    swal("Error!", errorMsg, "error");
                },
                complete: function() {
                    // Restore button state
                    btn.html(originalHtml).prop('disabled', false);
                }
            });

 // Initialize DataTable
    const TableData = $('#data-table-basic').DataTable({
        destroy: true,
        pageLength: 10
    });

=======
<<<<<<<< HEAD:operations/views/scripts/roles-scripts.php
    // Function to load users from API and populate DataTable
    function loadData() {
        $.getJSON('<?= App::baseUrl() ?>/_ikawa/settings/roles', function (res) {
            if (!res.success) return;

            TableData.clear();

            $.each(res.data, function (index, record) {
                TableData.row.add([
                index + 1,
                record.role_name,
                record.description,
                `<div class="button-icon-btn button-icon-btn-rd">
                    <button class="btn btn-default btn-icon-notika editrecord"
                        title="Edit Role"
                        data-id="${record.role_id}"
                        data-role_name="${record.role_name}"
                        data-description="${record.description}">
                        <i class="notika-icon notika-edit"></i>
                    </button>
                </div>`
            ]);
});


            TableData.draw(false);
        });
    }
    });

$(document).on('click', '.editrecord', function() {
    const btn = $(this);
<<<<<<< HEAD
    // Fill modal fields
    $('#edit_role_name').val(btn.data('role_name'));
    $('#edit_description').val(btn.data('description'));
    $("#role_id").val( btn.data('id'));
=======

    // Fill modal fields
    $('#edit_first_name').val(btn.data('first_name'));
    $('#edit_last_name').val(btn.data('last_name'));
    $('#edit_email').val(btn.data('email'));
    $('#edit_username').val(btn.data('username'));
    $('#edit_phone').val(btn.data('phone'));
    $('#edit_role_id').val(btn.data('role_id')).trigger('chosen:updated');
    $('#edit_gender').val(btn.data('gender')).trigger('chosen:updated');
    $('#edit_nid').val(btn.data('nid'));
    $('#edit_loc_id').val(btn.data('loc_id')).trigger('chosen:updated');
    $("#user_id").val( btn.data('id'));
>>>>>>> itec/felix
    $('#myModalfour').modal('show');
});

    // Handle edit User button
<<<<<<< HEAD
$(document).on('click', '#EditroleBtn', function (e) {
========
>>>>>>> itec/christian
   
    function loadData() {
    $.getJSON('<?= App::baseUrl() ?>/_ikawa/inventory/getsuppliers', function (res) {
       if (!res.success || !res.data) {
            return;
        }

        TableData.clear();

        $.each(res.data, function (index, record) {
            
            TableData.row.add([
                index + 1,
                record.full_name || '',
                record.email || '',
                record.phone || '',
                `<div class="button-icon-btn button-icon-btn-rd">
                    <button class="btn btn-default btn-icon-notika editrecord"
                        title="Edit Supplier"
                        data-id="${record.sup_id}"
                        data-full_name="${record.full_name || ''}"
                        data-email="${record.email || ''}"
                        data-phone="${record.phone || ''}"
                        data-address="${record.address || ''}">
                        <i class="notika-icon notika-edit"></i>
                    </button>
                    <button class="btn btn-default btn-icon-notika deleterecord" 
                        title="Delete Supplier" 
                        data-id="${record.sup_id}" 
                        data-full_name="${record.full_name || ''}">
                        <i class="notika-icon text-danger notika-trash"></i>
                    </button>
                </div>`
            ]);
        });

        TableData.draw(false);
    })
        }
<<<<<<< HEAD
=======
    });


$(document).on('click', '.editrecord', function() {
    const btn = $(this);
    // Fill modal fields
    $('#edit_full_name').val(btn.data('full_name'));
    $('#edit_email').val(btn.data('email'));
    $('#edit_phone').val(btn.data('phone'));
    $("#edit_address").val( btn.data('address'));
    $("#sup_id").val( btn.data('id'));
    $('#myModalfour').modal('show');
});

   // Handle edit User button
$(document).on('click', '#EditsupplierBtn', function (e) {
>>>>>>>> itec/christian:operations/views/scripts/supplier-scripts.php
    e.preventDefault();
      e.preventDefault();
    const btn = this;
    setButtonLoading(btn, true);
          const payload = {
<<<<<<<< HEAD:operations/views/scripts/roles-scripts.php
            role_name: $('#edit_role_name').val().trim(),
            description: $('#edit_description').val().trim(),
            role_id:$('#role_id').val()
        };

        if (!payload.role_name) {
=======
$(document).on('click', '#EditUserBtn', function (e) {
    e.preventDefault();
    const btn = this;
    setButtonLoading(btn, true);
          const userData = {
            first_name: $('#edit_first_name').val().trim(),
            last_name: $('#edit_last_name').val().trim(),
            email: $('#edit_email').val().trim(),
            username: $('#edit_username').val().trim(),
            phone: $('#edit_phone').val().trim(),
            role_id: $('#edit_role_id').val(),
            gender: $('#edit_gender').val(),
            nid: $('#edit_nid').val().trim(),
            loc_id: $('#edit_loc_id').val(),
            user_id:$('#user_id').val()
        };

        if (!userData.username || !userData.role_id || !userData.loc_id) {
>>>>>>> itec/felix
========
            full_name: $('#edit_full_name').val().trim(),
            email: $('#edit_email').val().trim(),
            phone: $('#edit_phone').val().trim(),
            address: $('#edit_address').val().trim(),
            sup_id:$('#sup_id').val()
        };

        if (!payload.phone || !payload.full_name) {
>>>>>>>> itec/christian:operations/views/scripts/supplier-scripts.php
            showToast('Please fill all required fields!', 'error');
            return;
        }

        $.ajax({
<<<<<<<< HEAD:operations/views/scripts/roles-scripts.php
<<<<<<< HEAD
            url: '<?= App::baseUrl() ?>/_ikawa/settings/updateroles',
========
            url: '<?= App::baseUrl() ?>/_ikawa/inventory/updatesupplier',
>>>>>>>> itec/christian:operations/views/scripts/supplier-scripts.php
            method: 'PUT',
            contentType: 'application/json',
            dataType: 'json',
            data: JSON.stringify(payload),
<<<<<<<< HEAD:operations/views/scripts/roles-scripts.php
=======
            url: '<?= App::baseUrl() ?>/_ikawa/users/update',
            method: 'PUT',
            contentType: 'application/json',
            dataType: 'json',
            data: JSON.stringify(userData),
>>>>>>> itec/felix
========
>>>>>>>> itec/christian:operations/views/scripts/supplier-scripts.php
            success: function (response) {
                if (response.success) {
                    showToast(response.message, 'success');

                    $('#myModalfour').modal('hide');
                    $('#myModalfour input').val('');
                    $('#myModalfour select').val('').trigger('chosen:updated');
<<<<<<<< HEAD:operations/views/scripts/roles-scripts.php
<<<<<<< HEAD
                    loadData();
=======
                    loadUsers();
>>>>>>> itec/felix
========
                    loadData();
>>>>>>>> itec/christian:operations/views/scripts/supplier-scripts.php
                } else {
                    showToast(response.message, 'error');
                }
            },
            error: function (xhr) {
                let msg = 'Something went wrong';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    msg = xhr.responseJSON.message;
                }
                showToast(msg, 'error');
            },
        complete: function() {
            setButtonLoading(btn, false); // always reset button
        }
        });

<<<<<<<< HEAD:operations/views/scripts/roles-scripts.php
<<<<<<< HEAD
     // Initialize DataTable
    const TableData = $('#data-table-basic').DataTable({
=======
    // Initialize DataTable
    const userTable = $('#data-table-basic').DataTable({
>>>>>>> itec/felix
========
    
    // Initialize DataTable
    const TableData = $('#data-table-basic').DataTable({
>>>>>>>> itec/christian:operations/views/scripts/supplier-scripts.php
        destroy: true,
        pageLength: 10
    });

<<<<<<<< HEAD:operations/views/scripts/roles-scripts.php
    // Function to load users from API and populate DataTable
<<<<<<< HEAD
    function loadData() {
        $.getJSON('<?= App::baseUrl() ?>/_ikawa/settings/roles', function (res) {
            if (!res.success) return;

            TableData.clear();

            $.each(res.data, function (index, record) {
                TableData.row.add([
                index + 1,
                record.role_name,
                record.description,
                `<div class="button-icon-btn button-icon-btn-rd">
                    <button class="btn btn-default btn-icon-notika editrecord"
                        title="Edit Role"
                        data-id="${record.role_id}"
                        data-role_name="${record.role_name}"
                        data-description="${record.description}">
                        <i class="notika-icon notika-edit"></i>
                    </button>
=======
    function loadUsers() {
        $.getJSON('<?= App::baseUrl() ?>/_ikawa/users/get-all-users', function (res) {
            if (!res.success) return;

            userTable.clear();

            $.each(res.data, function (index, user) {
                userTable.row.add([
                index + 1,
                user.first_name,
                user.last_name,
                user.username,
                user.phone,
                user.role_name,
                `<div class="button-icon-btn button-icon-btn-rd">
                    <button class="btn btn-default btn-icon-notika edituser"
                        title="Edit User"
                        data-id="${user.user_id}"
                        data-first_name="${user.first_name}"
                        data-last_name="${user.last_name}"
                        data-email="${user.email}"
                        data-username="${user.username}"
                        data-phone="${user.phone}"
                        data-role_id="${user.role_id}"
                        data-gender="${user.gender}"
                        data-nid="${user.nid}"
                        data-loc_id="${user.loc_id}"
                    >
                        <i class="notika-icon notika-edit"></i>
                    </button>
                    <button class="btn btn-default btn-icon-notika deleteuser" title="Delete User" data-id="${user.user_id}">
                        <i class="notika-icon text-danger notika-trash"></i>
                    </button>
>>>>>>> itec/felix
                </div>`
            ]);
});


<<<<<<< HEAD
            TableData.draw(false);
        });
    }
========
   
    function loadData() {
    $.getJSON('<?= App::baseUrl() ?>/_ikawa/inventory/getsuppliers', function (res) {
       if (!res.success || !res.data) {
            return;
        }

        TableData.clear();

        $.each(res.data, function (index, record) {
            
            TableData.row.add([
                index + 1,
                record.full_name || '',
                record.email || '',
                record.phone || '',
                `<div class="button-icon-btn button-icon-btn-rd">
                    <button class="btn btn-default btn-icon-notika editrecord"
                        title="Edit Supplier"
                        data-id="${record.sup_id}"
                        data-full_name="${record.full_name || ''}"
                        data-email="${record.email || ''}"
                        data-phone="${record.phone || ''}"
                        data-address="${record.address || ''}">
                        <i class="notika-icon notika-edit"></i>
                    </button>
                    <button class="btn btn-default btn-icon-notika deleterecord" 
                        title="Delete Supplier" 
                        data-id="${record.sup_id}" 
                        data-full_name="${record.full_name || ''}">
                        <i class="notika-icon text-danger notika-trash"></i>
                    </button>
                </div>`
            ]);
        });

        TableData.draw(false);
    })
        }
>>>>>>>> itec/christian:operations/views/scripts/supplier-scripts.php

 });


<<<<<<<< HEAD:operations/views/scripts/roles-scripts.php

    
});

=======
            userTable.draw(false);
        });
    }
 });


$(document).on('click', '.deleteuser', function() {
    const btn = $(this);
    const user_id = btn.data('id');
    const user_name = btn.data('first_name') || 'this user'; 
    
    swal({   
        title: "Are you sure?",   
        text: "You will delete " + user_name + "! This action cannot be undone.",   
========
 $(document).on('click', '.deleterecord', function() {
    const btn = $(this);
    const sup_id = btn.data('id');
    const full_name = btn.data('full_name') || 'this supplier'; 
    
    swal({   
        title: "Are you sure?",   
        text: "You will delete " + full_name + "! This action cannot be undone.",   
>>>>>>>> itec/christian:operations/views/scripts/supplier-scripts.php
        type: "warning",   
        showCancelButton: true,   
        confirmButtonText: "Yes, delete!",
        cancelButtonText: "No, cancel!"
    }).then(function(isConfirm){
        if (isConfirm) {
            // Show loading state on button
            const originalHtml = btn.html();
            btn.html('<i class="notika-icon notika-loading"></i> Deleting...').prop('disabled', true);
            
            $.ajax({
<<<<<<<< HEAD:operations/views/scripts/roles-scripts.php
                url: '<?= App::baseUrl() ?>/_ikawa/users/delete/' + user_id,
========
                url: '<?= App::baseUrl() ?>/_ikawa/inventory/deletesupplier/' + sup_id,
>>>>>>>> itec/christian:operations/views/scripts/supplier-scripts.php
                method: 'DELETE',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
<<<<<<<< HEAD:operations/views/scripts/roles-scripts.php
                        swal("Deleted!", response.message || "User has been deleted successfully.", "success");
                        loadUsers();
========
                        swal("Deleted!", response.message || "Supplier has been deleted successfully.", "success");
                        loadData();
>>>>>>>> itec/christian:operations/views/scripts/supplier-scripts.php
                        
                    } else {
                        swal("Error!", response.message || "Failed to delete user.", "error");
                    }
                },
                error: function(xhr, status, error) {
                    let errorMsg = "Failed to delete user. Please try again.";
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMsg = xhr.responseJSON.message;
                    }
                    swal("Error!", errorMsg, "error");
                },
                complete: function() {
                    // Restore button state
                    btn.html(originalHtml).prop('disabled', false);
                }
            });

<<<<<<<< HEAD:operations/views/scripts/roles-scripts.php
             // Initialize DataTable
    const userTable = $('#data-table-basic').DataTable({
========
 // Initialize DataTable
    const TableData = $('#data-table-basic').DataTable({
>>>>>>>> itec/christian:operations/views/scripts/supplier-scripts.php
        destroy: true,
        pageLength: 10
    });

<<<<<<<< HEAD:operations/views/scripts/roles-scripts.php
    // Function to load users from API and populate DataTable
    function loadUsers() {
        $.getJSON('<?= App::baseUrl() ?>/_ikawa/users/get-all-users', function (res) {
            if (!res.success) return;

            userTable.clear();

            $.each(res.data, function (index, user) {
                userTable.row.add([
                index + 1,
                user.first_name,
                user.last_name,
                user.username,
                user.phone,
                user.role_name,
                `<div class="button-icon-btn button-icon-btn-rd">
                    <button class="btn btn-default btn-icon-notika edituser"
                        title="Edit User"
                        data-id="${user.user_id}"
                        data-first_name="${user.first_name}"
                        data-last_name="${user.last_name}"
                        data-email="${user.email}"
                        data-username="${user.username}"
                        data-phone="${user.phone}"
                        data-role_id="${user.role_id}"
                        data-gender="${user.gender}"
                        data-nid="${user.nid}"
                        data-loc_id="${user.loc_id}"
                    >
                        <i class="notika-icon notika-edit"></i>
                    </button>
                    <button class="btn btn-default btn-icon-notika deleteuser" title="Delete User" data-id="${user.user_id}">
========
   
    function loadData() {
    $.getJSON('<?= App::baseUrl() ?>/_ikawa/inventory/getsuppliers', function (res) {
       if (!res.success || !res.data) {
            return;
        }

        TableData.clear();

        $.each(res.data, function (index, record) {
            
            TableData.row.add([
                index + 1,
                record.full_name || '',
                record.email || '',
                record.phone || '',
                `<div class="button-icon-btn button-icon-btn-rd">
                    <button class="btn btn-default btn-icon-notika editrecord"
                        title="Edit Supplier"
                        data-id="${record.sup_id}"
                        data-full_name="${record.full_name || ''}"
                        data-email="${record.email || ''}"
                        data-phone="${record.phone || ''}"
                        data-address="${record.address || ''}">
                        <i class="notika-icon notika-edit"></i>
                    </button>
                    <button class="btn btn-default btn-icon-notika deleterecord" 
                        title="Delete Supplier" 
                        data-id="${record.sup_id}" 
                        data-full_name="${record.full_name || ''}">
>>>>>>>> itec/christian:operations/views/scripts/supplier-scripts.php
                        <i class="notika-icon text-danger notika-trash"></i>
                    </button>
                </div>`
            ]);
<<<<<<<< HEAD:operations/views/scripts/roles-scripts.php
});


            userTable.draw(false);
        });
    }
========
        });

        TableData.draw(false);
    })
        }
>>>>>>>> itec/christian:operations/views/scripts/supplier-scripts.php
>>>>>>> itec/christian

        }
    });
});
    
});
<<<<<<< HEAD

=======
<<<<<<<< HEAD:operations/views/scripts/roles-scripts.php
>>>>>>> itec/felix
========

>>>>>>>> itec/christian:operations/views/scripts/supplier-scripts.php
>>>>>>> itec/christian
</script>

