<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= esc($title) ?></title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/css/yahir.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <?= $this->include('layout/navbar') ?>
    <?= $this->renderSection('content') ?>
    <?= $this->include('layout/footer') ?>

    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- custom js -->
    <script src="/js/yahir.js"></script>

    <script>
        var save_label;
        var table;

        $(document).ready(function() {

            // datatables
            table = $("#table_leads").DataTable({
                "order": [],
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "/leads/listdata",
                    "type": 'POST'
                },
                "columnDefs": [{
                    "target": [0],
                    "orderable": false
                }]
            })

            $('#modal_form').on('shown.bs.modal', function(e) {
                load_kategori();
            });

            $('#modal_form').on('hidden.bs.modal', function(e) {
                var inputs = $('#form input, #form textarea, #form select');
                inputs.removeClass('is-valid is-invalid');
            });
        });

        function load_kategori() {
            $.ajax({
                url: "<?= base_url('barang/getKategori') ?>",
                method: 'GET',
                dataType: 'JSON',
                success: function(categories) {
                    console.log(categories);
                    var opsi_kategori;
                    $('[name="kategori"]').html('');
                    $.each(categories, function(key, val) {
                        opsi_kategori = `<option value="${val.id_kategori}">${val.kategori_barang}</option>`;
                        $('[name="kategori"]').append(opsi_kategori);
                    });
                }
            });
        }

        function reload_ajax() {
            table.ajax.reload(null, false);
        }

        function swalert(method) {
            Swal({
                title: 'Success',
                text: 'Data berhasil ' + method,
                type: 'success'
            });
        };

        function add_barang() {
            save_label = 'add';
            $('#form')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('#modal_form').modal('show'); // show bootstrap modal
            $('.modal-title').text('Tambah Barang'); // Set Title to Bootstrap modal title
        }

        function edit_barang(id) {
            save_label = 'update';
            $('#form')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url: "<?= base_url('barang/edit/') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name="id"]').val(data.id_barang);
                    $('[name="nama_barang"]').val(data.nama_barang);
                    $('[name="stok"]').val(data.stok);
                    $('[name="kategori"]').val(data.kategori_id);
                    $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Barang'); // Set title to Bootstrap modal title
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }

        function save() {
            $('#btnSave').text('saving...'); //change button text
            $('#btnSave').attr('disabled', true); //set button disable 
            var url, method;

            if (save_label == 'add') {
                url = "<?= base_url('barang/add') ?>";
                method = 'disimpan';
            } else {
                url = "<?= base_url('barang/update') ?>";
                method = 'diupdate';
            }

            // ajax adding data to database
            $.ajax({
                url: url,
                type: "POST",
                data: $('#form').serialize(),
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    if (data.status) //if success close modal and reload ajax table
                    {
                        $('#modal_form').modal('hide');
                        reload_ajax();
                        swalert(method);
                    } else {
                        $.each(data.errors, function(key, value) {
                            $('[name="' + key + '"]').addClass('is-invalid'); //select parent twice to select div form-group class and add has-error class
                            $('[name="' + key + '"]').next().text(value); //select span help-block class set text error string
                            if (value == "") {
                                $('[name="' + key + '"]').removeClass('is-invalid');
                                $('[name="' + key + '"]').addClass('is-valid');
                            }
                        });
                    }
                    $('#btnSave').text('save'); //change button text
                    $('#btnSave').attr('disabled', false); //set button enable 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave').text('save'); //change button text
                    $('#btnSave').attr('disabled', false); //set button enable 
                }
            });

            $('#form input').on('keyup', function() {
                $(this).removeClass('is-valid is-invalid');
            });
            $('#form select').on('change', function() {
                $(this).removeClass('is-valid is-invalid');
            });
        }

        function hapus_barang(id) {
            Swal({
                title: 'Anda yakin?',
                text: "Data barang akan dihapus!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus data!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "<?= base_url('barang/delete') ?>/" + id,
                        type: "POST",
                        success: function(data) {
                            reload_ajax();
                            swalert('dihapus');
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            alert('Error deleting data');
                        }
                    });
                }
            });
        }
    </script>

</body>

</html>