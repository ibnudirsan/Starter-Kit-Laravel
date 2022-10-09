<script type="text/javascript">
    function isDelete(id) {
        swal({
            title: "Confirmation Trash",
            text: "Are you sure you want to trash customer data ?",
            type: "question",
            showCancelButton: !0,
            cancelButtonText: "Batal...",
            confirmButtonText: "Lanjutkan...",
        }).then(function (e) {
            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: "trash/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        if (results.success === true) {
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