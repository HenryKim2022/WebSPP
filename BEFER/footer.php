</div>
<!-- /.container-fluid -->


<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div id="copyright" class="copyright text-center my-auto">
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Silahakn klik tombol logout untuk keluar dari Aplikasi ini!.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!--  -->
<!--  -->
<!-- INDEPENDENT SCRIPT: FOOTER GENERATOR BY HENRY .K -->
<!-- FOOTER COPYRIGHT GENERATOR -->
<script>
    let paragraph1 = `
                        <p style='margin-bottom:0px'>
                            <i>Hak cipta &copy; <?= $Curr_Year ?> <a href="<?= $Base_Url; ?>">Grup 2 SI</a>. Seluruh hak cipta.</i>  
                        </p>
                    `;
    let paragraph2 = `
                        <p style='margin-bottom:0px'>
                            <i>                    
                                Hak cipta &copy; <?= $Site_Build ?>-<?= $Curr_Year ?> <a href="<?= $Base_Url; ?>">Grup 2 SI</a>.
                               Seluruh hak cipta.
                            </i>  
                        </p>`;

    if (<?= $Site_Build ?> == <?= $Curr_Year ?>) {
        document.getElementById('copyright').innerHTML = paragraph1;
    } else {
        document.getElementById('copyright').innerHTML = paragraph2;
    }
</script>
<!-- /.FOOTER COPYRIGHT GENERATOR -->


<!-- PRELOADER SCRIPT -->
<script>
    document.onreadystatechange = function() {
        if (document.readyState !== "complete") {
            document.querySelector(
                "body").style.visibility = "hidden";
            document.querySelector(
                "#preloader").style.visibility = "visible";
        } else {
            document.querySelector(
                "#preloader").style.display = "none";
            document.querySelector(
                "body").style.visibility = "visible";
        }
    };
</script>
<!-- /.PRELOADER SCRIPT -->






<!-- Bootstrap core JavaScript-->
<!-- <script src="vendor/jquery/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>


<!-- DataTables  & Plugins -->
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-responsive-bs4/2.4.0/responsive.bootstrap4.min.js" integrity="sha512-6GfG2kVDP+eERUuPOyDw9XFsW24wvdQo6bDFab6ragV8z3PY8KwglTXyRJJ+AOGlDBTYPdFUvvtjFqBX0997Tw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jszip@3.10.1/dist/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js" integrity="sha512-a9NgEEK7tsCvABL7KqtUTQjl69z7091EVPpw5KxPlZ93T141ffe1woLtbXTX+r2/8TtTvRX/v4zTL2UlMUPgwg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js" integrity="sha512-pAoMgvsSBQTe8P3og+SAnjILwnti03Kz92V3Mxm0WOtHuA482QeldNM5wEdnKwjOnQ/X11IM6Dn3nbmvOz365g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.colVis.min.js"></script>
<!-- overlayScrollbars -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.3/js/OverlayScrollbars.min.js" integrity="sha512-Ae2SccSxoNp/Cn7PIlowLk8cmVyyW5aSCbrB/k08h/yYeK3zrNJ/oAJf8RK/ZD95G8KjkzPIXxKbeYPn43KC0w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.mousewheel/jquery.mousewheel.min.js"></script>




<!-- DataTable Button Script -->
<script>
    $(document).ready(function() {
        var table = $('#reportTable').DataTable({
            "lengthChange": false,
            "autoWidth": true,
            "buttons": [{
                    extend: 'copy',
                    footer: true,
                    header: true,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excelHtml5',
                    footer: true,
                    header: true,
                    exportOptions: {
                        columns: ':visible'
                    },
                    className: 'hide-for-all'
                },
                {
                    extend: 'pdf',
                    footer: true,
                    header: true,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    footer: true,
                    header: true,
                    exportOptions: {
                        columns: ':visible'
                    },
                    className: 'hide-for-all',
                    title: '',
                    customize: function(win) {
                        $(win.document.body)
                            .css('font-size', '10pt')
                            .prepend(
                                '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                            )

                        <?php if ((isset($_GET['awal']) && $_GET['awal'] != '') && ((isset($_GET['akhir']) && $_GET['akhir'] != ''))) { ?>
                                .prepend(
                                    `
                                <h3 class="text-center"><b>LAPORAN PEMBAYARAN SPP</b></h3>,
                                <h3 class="text-center"><b>MADRASAH IBTIDAIYAH AL-MUKHLISIN</b></h3>
                                <?= "<hr><h6 class='text-center'><b>" . "Tgl " . ($tanggalAwal) . " s.d Tgl " . ($tanggalAkhir)  . "</b></h6><br></br>" ?>
                            `)
                        <?php } ?>

                            .append(`
                                <div class="container mr-0" style="text-align: right">
                                    <tr>
                                        <div class="row">
                                            <div class="col-xl-12">
                                            <td class="" colspan="8">
                                                <br><br><br>
                                                <p style="text-align: right !important;">
                                                    Tangerang, <?= date('d/m/y') ?>
                                                    <br>Admin,<br><br>
                                                <p>__________________________</p>
                                            </td>
                                        </div>
                                    </tr>
                                </div>   
                            `)


                        $(win.document.body).find('table')
                            // .addClass('compact')
                            .css('font-size', 'inherit');





                    }

                }
            ],
            columnDefs: [{
                targets: [],
                visible: false,
            }],
        });
        $('.dataTables_length').addClass('bs-select');
        table.buttons().container()
            .appendTo('#reportTable_wrapper .col-md-6:eq(0)');

        //// Give scroolX- without breaking header~body aligment 
        jQuery('.dataTable').wrap('<div class="dataTables_scroll" />');


    });
</script>





</body>

</html>