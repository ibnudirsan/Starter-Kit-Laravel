<script type="text/javascript">
    function isDelete(id) {
        swal({
            title: "Confirmation Delete",
            text: "Are you sure you want to Delete Permanent data Role ?",
            type: "question",
            showCancelButton: !0,
            cancelButtonText: "Batal...",
            confirmButtonText: "Lanjutkan...",
        }).then(function (e) {
            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: "delete/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        if (results.success === true) {
                            swal({
                                title               : "Successfully",
                                text                : results.message, 
                                type                : "success",
                                showCancelButton    : false,
                                showConfirmButton   : false,
                            }),
                            setInterval(function() { window.location.reload(); }, 1000);
                        } else {
                            swal("Failed Process", results.message, "info");
                        }
                    }
                });
            } else {
                e.dismiss;
            }
        }, function (dismiss) {
            return false;
        })
    }
</script>

<script>
    $(document).on('click', '.btn-delete', function (e) {
        e.preventDefault();
    
        var uuid = $(this).data('uuid');
        Swal.fire({
            title: 'Confirmation Delete',
            html: '<p>Are you sure you want to Delete Permanent data Role ?</p>',
            icon: 'success',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText:'<i class="fa fa-thumbs-up"></i> Lanjutkan...',
            confirmButtonAriaLabel: 'Batal...',
            cancelButtonText:'<i class="fa fa-thumbs-down"></i> Batal...',
            cancelButtonAriaLabel:'Lanjutkan...',
            buttonsStyling: false,
            customClass: {
                confirmButton:'btn btn-success mx-2',
                cancelButton:'btn btn-danger mx-2'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "delete/" + uuid,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function (data) {
                        Swal.fire({
                            title: 'Berhasil',
                            text: data.message,
                            icon: 'success',
                            timer: 2000,
                            timerProgressBar: true,
                            showConfirmButton: false
                        });
                        setInterval(function() {
                            window.location.reload();
                        }, 2000);
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        Swal.fire(
                            'Error!',
                            'Something went wrong, please try again.',
                            'error'
                        );
                    }
                });
            }
        });
    });
</script>