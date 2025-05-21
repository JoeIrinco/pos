$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    consolo.log("Ready..")

    $('#supplier_table').DataTable({
        "processing": true,
        "serverSide": true,
         "order": [
        [3, "desc"]
    ],
        "ajax":{
                 "url": "/supplierlist-booking-test",
                 "dataType": "json",
                 "type": "POST",
               },
        "columns": [
            { "data": "supplier_name" },
            { "data": "supplier_number" },
            { "data": "supplier_address" },
            { "data": "created_at" },
            { "data": "updated_at" },
            { "data": "action" },
            { "data": "view" }
        ],
        "columnDefs": [
            {
                "targets": 5,
                "className": "text-center",
            },
            {
                "targets": 6,
                "className": "text-center",
                "data": "view",
                "render": function(data) {
                    return '<a href = "'+data+'" class="btn btn-warning btn-xs btn-view-fact" title="View Details"><i class="fa fa-eye"></i> View</a>'
                }
            }

        ]      	 

    });


});