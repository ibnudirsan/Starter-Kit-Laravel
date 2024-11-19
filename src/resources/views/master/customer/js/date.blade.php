<script>
$(function() {
    var today = new Date();
    var lastDayOfCurrentMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);

    $('#birthDay').datepicker({
        autoHide: true,
        format: "yyyy-mm-dd",
        language: 'id',
        months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
        days: ['Ahad', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
        daysShort: ['Ahd', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
        daysMin: ['Ah', 'Sn', 'Sl', 'Rb', 'Km', 'Jm', 'Sb'],
        endDate: lastDayOfCurrentMonth
    });
});
</script>