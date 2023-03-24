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
                            <i>Hak cipta &copy; <?= $Curr_Year ?> <a href="<?= $Base_Url; ?>">Grup 3 RPL</a>. Seluruh hak cipta.</i>  
                        </p>
                    `;
    let paragraph2 = `
                        <p style='margin-bottom:0px'>
                            <i>                    
                                Hak cipta &copy; <?= $Site_Build ?>-<?= $Curr_Year ?> <a href="<?= $Base_Url; ?>">Grup 3 RPL</a>.
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
<!-- Popper.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<!-- bootstrap.min.js 4.3.1 -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- Toast.min.js -->
<script src="js/toast.min.js"></script>

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
                    text: 'Salin',
                    extend: 'copy',
                    footer: true,
                    header: true,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excelHtml5',
                    extend: 'excelHtml5',
                    // title: 'Laporan_Keuangan_' + $tanggalAwal + '-' + $tanggalAkhir,
                    title: 'LAPORAN KEUANGAN_',
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
                    text: 'Cetak',
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





<!-- DataTable Siswa : Hal Transaksi Button Script -->
<script>
    $(document).ready(function() {
        var table = $('#dataSiswaTransaksiTable').DataTable({
            "lengthChange": false,
            "autoWidth": true,
            "buttons": [{
                    text: 'Salin',
                    extend: 'copy',
                    footer: true,
                    header: true,
                    exportOptions: {
                        columns: ':visible',
                    },


                },
                {
                    extend: 'excelHtml5',
                    title: "DATA_" + "<?= $namaTabel ?>",
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
                    text: 'Cetak',
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
                                    `<?= "<hr><h6 class='text-center'><b>" . "Tgl " . ($tanggalAwal) . " s.d Tgl " . ($tanggalAkhir)  . "</b></h6><br></br>" ?>
                            `)
                        <?php } ?>


                        $(win.document.body).find('table')
                            // .addClass('compact')
                            .css('font-size', 'inherit');


                    }

                },
                {
                    text: 'Kolom Terlihat',
                    extend: 'colvis'
                }

            ],
            columnDefs: [{
                targets: [],
                visible: false,
            }],
        });
        $('.dataTables_length').addClass('bs-select');
        table.buttons().container()
            .appendTo('#dataSiswaTransaksiTable_wrapper .col-md-6:eq(0)');

        //// Give scroolX- without breaking header~body aligment 
        jQuery('.dataTable').wrap('<div class="dataTables_scroll" />');

    });
</script>



<!-- Data Table -->
<script>
    $(document).ready(function() {
        var table = $('#dataTable').DataTable({
            "lengthChange": false,
            "autoWidth": true,
            "buttons": [{
                    text: 'Salin',
                    extend: 'copy',
                    footer: true,
                    header: true,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "DATA_" + "<?= $namaTabel ?>",
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
                    text: 'Cetak',
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




                        $(win.document.body).find('table')
                            // .addClass('compact')
                            .css('font-size', 'inherit');


                    }

                },
                {
                    text: 'Kolom Terlihat',
                    extend: 'colvis'
                }


            ],
            columnDefs: [{
                targets: [],
                visible: false,
            }],
        });
        $('.dataTables_length').addClass('bs-select');
        table.buttons().container()
            .appendTo('#dataTable_wrapper .col-md-6:eq(0)');

        //// Give scroolX- without breaking header~body aligment 
        jQuery('.dataTable').wrap('<div class="dataTables_scroll" />');

    });
</script>




<!-- DataTable Tahun Ajaran : Hal Master Data Script -->
<script>
    $(document).ready(function() {
        var table = $('#dataTableTahunAjaran').DataTable({
            "lengthChange": false,
            "autoWidth": true,
            "columns": [{
                    "width": "5%"
                },
                null,
                {
                    "width": "6%"
                }
            ],
            "buttons": [{
                    text: 'Salin',
                    extend: 'copy',
                    footer: true,
                    header: true,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "DATA_" + "<?= $namaTabel ?>",
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
                    text: 'Cetak',
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
                        $(win.document.body).find('table')
                            // .addClass('compact')
                            .css('font-size', 'inherit');
                    }

                },
                {
                    text: 'Kolom Terlihat',
                    extend: 'colvis'
                }
            ],
            columnDefs: [{
                targets: [],
                visible: false,
            }],
        });
        $('.dataTables_length').addClass('bs-select');
        table.buttons().container()
            .appendTo('#dataTableTahunAjaran_wrapper .col-md-6:eq(0)');

        //// Give scroolX- without breaking header~body aligment 
        jQuery('.dataTableTahunAjaran').wrap('<div class="dataTables_scroll" />');

    });
</script>





<!-- DataTable Tahun Ajaran : Hal Master Data Script -->
<script>
    $(document).ready(function() {
        var table = $('#dataTableAngkatan').DataTable({
            "lengthChange": false,
            "autoWidth": true,
            "columns": [{
                    "width": "5%"
                },
                null,
                null,
                {
                    "width": "6%"
                }
            ],
            "buttons": [{
                    text: 'Salin',
                    extend: 'copy',
                    footer: true,
                    header: true,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "DATA_" + "<?= $namaTabel ?>",
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
                    text: 'Cetak',
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
                        $(win.document.body).find('table')
                            // .addClass('compact')
                            .css('font-size', 'inherit');
                    }

                },
                {
                    text: 'Kolom Terlihat',
                    extend: 'colvis'
                }
            ],
            columnDefs: [{
                targets: [],
                visible: false,
            }],
        });
        $('.dataTables_length').addClass('bs-select');
        table.buttons().container()
            .appendTo('#dataTableAngkatan_wrapper .col-md-6:eq(0)');

        //// Give scroolX- without breaking header~body aligment 
        jQuery('.dataTableAngkatan').wrap('<div class="dataTables_scroll" />');

    });
</script>




<!-- DataTable Tahun Ajaran : Hal Master Data Script -->
<script>
    $(document).ready(function() {
        var table = $('#dataTableKelas').DataTable({
            "lengthChange": false,
            "autoWidth": true,
            "columns": [{
                    "width": "5%"
                },
                null,
                {
                    "width": "6%"
                }
            ],
            "buttons": [{
                    text: 'Salin',
                    extend: 'copy',
                    footer: true,
                    header: true,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "DATA_" + "<?= $namaTabel ?>",
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
                    text: 'Cetak',
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
                        $(win.document.body).find('table')
                            // .addClass('compact')
                            .css('font-size', 'inherit');
                    }

                },
                {
                    text: 'Kolom Terlihat',
                    extend: 'colvis'
                }
            ],
            columnDefs: [{
                targets: [],
                visible: false,
            }],
        });
        $('.dataTables_length').addClass('bs-select');
        table.buttons().container()
            .appendTo('#dataTableKelas_wrapper .col-md-6:eq(0)');

        //// Give scroolX- without breaking header~body aligment 
        jQuery('.dataTableKelas').wrap('<div class="dataTables_scroll" />');

    });
</script>






<!-- DataTable Tahun Ajaran : Hal Master Data Script -->
<script>
    $(document).ready(function() {
        var table = $('#dataTableSiswa').DataTable({
            "lengthChange": false,
            "autoWidth": true,
            "columns": [{
                    "width": "5%"
                },
                null,
                null,
                null,
                null,
                {
                    "width": "9%"
                }
            ],
            "buttons": [{
                    text: 'Salin',
                    extend: 'copy',
                    footer: true,
                    header: true,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "DATA_" + "<?= $namaTabel ?>",
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
                    text: 'Cetak',
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
                        $(win.document.body).find('table')
                            // .addClass('compact')
                            .css('font-size', 'inherit');
                    }

                },
                {
                    text: 'Kolom Terlihat',
                    extend: 'colvis'
                }
            ],
            columnDefs: [{
                targets: [],
                visible: false,
            }],
        });
        $('.dataTables_length').addClass('bs-select');
        table.buttons().container()
            .appendTo('#dataTableSiswa_wrapper .col-md-6:eq(0)');

        //// Give scroolX- without breaking header~body aligment 
        jQuery('.dataTableSiswa').wrap('<div class="dataTables_scroll" />');

    });
</script>










<!--  -->
<!-- DATA MASTER: CHECKING -->
<?php {
    $arrTable = ['siswa', 'angkatan', 'tahun', 'kelas'];
    // $arrPesan = [];

    $table = "";
    foreach ($arrTable as $table) {
        $query = "SELECT * from $table";
        $exec = mysqli_query($conn, $query);
        if (mysqli_num_rows($exec) == 0) {
            if ($table == "tahun") {
                $calonArr = "<h6>Mohon input data $table ajaran setidaknya 1 data <i class='fad fa-smile-beam'></i></h6>";
                array_push($arrPesan, $calonArr);
            } else {
                $calonArr = "<h6>Mohon input data $table setidaknya 1 data <i class='fad fa-smile-beam'></i></h6>";
                array_push($arrPesan, $calonArr);
            }
        }
    }

    // // print_r($arrPesan);
    // foreach ($arrPesan as $pesan) {
    //     echo $pesan;
    // }
}
?>


<!-- TOAST: Info -->
<?php
$value = "";
foreach ($arrPesan as $value) {     ?>
    <script>
        <?php $msgRef = "hide"; ?>
        setTimeout(() => {
            $.toast({
                title: "<i class='fad fa-info'></i>  INFORMASI",
                dismissible: true,
                stackable: true,
                pauseDelayOnHover: true,
                position: 'top-right',
                content: "<?= $value ?>",
                type: 'info',
                delay: 100000
            });

        }, 2000);
    </script>

<?php } ?>





<!-- TOAST: Success -->
<!-- <?php
        if ($msg_success != "") { ?>
    <script>
        $.toast({
            title: "<i class='fas fa-thumbs-up'></i>  INFORMASI",
            dismissible: true,
            stackable: true,
            pauseDelayOnHover: true,
            position: 'top-left',
            content: "<?= $msg_success ?>",
            type: 'success',
            delay: 10000
        });
    </script>
<?php } ?> -->


<!-- TOAST: Failed -->
<!-- <?php
        if ($msg_failed != "") { ?>
    <script>
        $.toast({
            title: "<i class='fas fa-exclamation-triangle'></i>  INFORMASI",
            dismissible: true,
            stackable: true,
            pauseDelayOnHover: true,
            position: 'top-left',
            content: "<?= $msg_failed ?>",
            type: 'warning',
            delay: 10000
        });
    </script>
<?php } ?> -->





</body>

</html>