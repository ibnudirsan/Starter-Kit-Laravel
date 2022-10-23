<script type="text/javascript">
    function isRestore(id) {
        swal({
            title: "Confirmation Restore",
            text: "Are you sure you want to Restore admin data ?",
            type: "question",
            showCancelButton: !0,
            cancelButtonText: "Batal...",
            confirmButtonText: "Lanjutkan...",
        }).then(function (e) {
            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: "restore/" + id,
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