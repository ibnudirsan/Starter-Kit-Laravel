<script type="text/javascript">
$(document).ready( function () {

    $.ajaxSetup(
    {

        headers :
        {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

    $('#tableCustomerTrash').DataTable

    ({
        scrollY           : true,
        scrollX           : true,
        scrollCollapse    : true,
        paging            : true,
        searching         : true,
        searchable        : true,
        order             : [[8, 'desc']],
        columnDefs        : [
                                { orderable: false, targets: 0  },
                                { orderable: false, targets: 1  },
                                { orderable: false, targets: 2  },
                                { orderable: false, targets: 3  },
                                { orderable: false, targets: 4  },
                                { orderable: false, targets: 5  },
                                { orderable: false, targets: 6  },
                                { orderable: false, targets: 7  },
                                { orderable: false, targets: 9  },
                            ],
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
                                url : '{{ route("customer.trash") }}',
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
            {data:'deleted_at',name:'deleted_at'},
            {data:'action',name:'action'},
        ]
    });

    $('div.dataTables_filter input').focus();

});
</script>
