<script>
    $(document).on('click', '.btn-trash', function (e) {
        e.preventDefault();
    
        var uuid = $(this).data('uuid');
        Swal.fire({
            title: 'Confirmation Transh',
            html: '<p>Are you sure you to Transh Data Permissions ?</p>',
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
                    url: "trash/" + uuid,
                    type: 'POST',
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