<script>
    $(document).on('click', '.btn-delete', function (e) {
        e.preventDefault();
    
        var user = "<?= auth()->user()->profile->fullName ?>"
        var uuid = $(this).data('uuid');
        Swal.fire({
            title: 'Confirmation Delete',
            html: `<p>${user}, Are you sure Delete Permanent Data Permission ?</p>`,
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