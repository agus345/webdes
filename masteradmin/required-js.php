<!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/metisMenu/metisMenu.min.js"></script>
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- SELECT 2 -->
    <script src="vendor/select2/select2.full.min.js"></script>



<!-- TAMBAHAN EXPORT JAVASCRIPT -->


    <!-- Jquery DataTable Plugin Js -->
    <script src="vendor/jquery-datatable/jquery.dataTables.js"></script>
    <script src="vendor/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="dist/js/dataTables.editor.min.js"></script>
    <script src="dist/js/dataTables.select.min.js"></script>
    <script src="vendor/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="vendor/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="vendor/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="vendor/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="vendor/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="vendor/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="vendor/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <!-- Jquery colvis -->
    <script src="dist/js/buttons.colVis.min.js"></script>




<script>
$(function () {

    $('.js-basic-example').DataTable({
        responsive: true
    });

    $("#example1").DataTable({
    "scrollX": true
    });
    //Exportable table
    $('#example').DataTable({
        dom: 'Bfrtip',
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        select: true,
        buttons: [
                    'pageLength',

                    {
                    extend: 'collection',
                    text: 'Export',
                    buttons: [
                                {
                                    extend: 'copyHtml5',
                                    text: 'Copy'
                                },

                                {

                                    extend : 'excelHtml5',
                                    text:'Excel',
                                    title:'Laporan xxx'
                                },


                                {
                                    extend: 'csvHtml5',
                                    text: 'CSV',
                                    exportOptions: {
                                        modifier: {
                                            search: 'none',
                                            page: 'current'
                                        }
                                    }

                                    /* contoh dengan file extension .tsv
                                        extend: 'csvHtml5',
                                        fieldSeparator: '\t',
                                        extension: '.tsv'
                                    */

                                },
                                        'pdf',
                                        'print'


                                /*

                                'copy',
                                'excel',
                                'csv',
                                'pdf',
                                'print'
                                */

                            ]



                   }
               ]

    });


    $(".select2").select2();


});

function createCellPos( n ){
    var ordA = 'A'.charCodeAt(0);
    var ordZ = 'Z'.charCodeAt(0);
    var len = ordZ - ordA + 1;
    var s = "";

    while( n >= 0 ) {
        s = String.fromCharCode(n % len + ordA) + s;
        n = Math.floor(n / len) - 1;
    }

    return s;
}



</script>
