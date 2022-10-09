<script type="text/javascript">
$(document).ready( function () {

    $.ajaxSetup(
    {

        headers :
        {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

    $.fn.DataTable.ext.pager.numbers_length = 12;
    
    $('#tableCustomer').DataTable

    ({
        scrollY           : '500px',
        scrollX           : true,
        scrollCollapse    : true,
        paging            : true,
        searching         : true,
        searchable        : true,
        ordering          : false,
        bInfo             : true,
        responsive        : true,
        lengthChange      : true,
        pageLength        : 10,
        lengthMenu        : [
                                [10, 15, 20, 25 ],
                                ['10', '15', '20', '25']
                            ],
        language          :
        {  
            paginate        :   {
                                    previous    : '<i class="fas fa-angle-double-left"></i>',
                                    next        : '<i class="fas fa-angle-double-right"></i>'
                                },
            lengthMenu      :   'Tampilkan ' +
                                    '<select class="form-control form-control-sm">'+
                                        '<option value="10" class="font-small">10 Baris</option>'+
                                        '<option value="20" class="font-small">20 Baris</option>'+
                                        '<option value="30" class="font-small">30 Baris</option>'+
                                        '<option value="40" class="font-small">40 Baris</option>'+
                                        '<option value="50" class="font-small">50 Baris</option>'+
                                    '</select>' +
                                ' Per Halaman',
                    
            zeroRecords     : 'Tidak ada data yang ditampilkan.',
            info            : 'Halaman _PAGE_ Dari _PAGES_ Halaman Total _TOTAL_ Data',
            infoEmpty       : 'Tidak ada data',
            infoFiltered    : '(Total _MAX_ Data)',
            search          : 'Pencarian: _INPUT_',
        },
        processing      : true,
        serverSide      : true,
        ajax            :
                            {
                                url : '{{ route("customer.index") }}',
                            },
        columns         :
        [
            {
                data: null,sortable: false,
                render: function (data, type, row, meta)
                {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {data:'firstName',name:'firstName'},
            {data:'lastName',name:'lastName'},
            {data:'numberPhone',name:'numberPhone'},
            {data:'birthDay',name:'birthDay'},
            {data:'age',name:'age'},
            {data:'email',name:'email'},
            {data:'address',name:'address'},
            {data:'edit',name:'edit'},
            {data:'delete',name:'delete'},
        ]
    });

    $('div.dataTables_filter input').focus();

});
</script>
