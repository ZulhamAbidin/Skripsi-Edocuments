<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- Referensi ke file CSS SweetAlert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>

    <!-- Referensi ke file JavaScript SweetAlert -->
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/favicon.ico') }}" />

    <!-- TITLE -->
    <title>E-Documents</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/dark-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/transparent-style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/skin-modes.css') }}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet " />

    <script src="{{ asset('/vendor/datatables/buttons.server-side.js') }}"></script>

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/colors/color1.css') }}" />

</head>

<body class="app sidebar-mini ltr light-mode">

    @yield('container')

    <script src="{{ asset('assets/dist/sweetalert2.all.min.js') }}"></script>
    <!-- JQUERY JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- INPUT MASK JS-->
    <script src="{{ asset('assets/plugins/input-mask/jquery.mask.min.js') }}"></script>

    <!-- SIDE-MENU JS -->
    <script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>

    <!-- TypeHead js -->
    <script src="{{ asset('assets/plugins/bootstrap5-typehead/autocomplete.js') }}"></script>
    <script src="{{ asset('assets/js/typehead.js') }}"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>

    <!-- DATA TABLE JS-->
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/table-data.js') }}"></script>

    <!-- SIDEBAR JS -->
    <script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scroll/pscroll.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scroll/pscroll-1.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('assets/js/themeColors.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>


    <!-- INTERNAL Notifications js -->
    <script src="{{ asset('assets/plugins/notify/js/rainbow.js')}}"></script>
    <script src="{{ asset('assets/plugins/notify/js/sample.js')}}"></script>
    <script src="{{ asset('assets/plugins/notify/js/jquery.growl.js')}}"></script>
    <script src="{{ asset('assets/plugins/notify/js/notifIt.js')}}"></script>

    <!-- INTERNAL File-Uploads Js-->
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <script>
        $(function () {

    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
var table = $('.data-table2').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: "{{ route('data.verifikasi.index') }}",
        data: function (d) {
            d.verifikasi = true; // Mengirim parameter verifikasi = true untuk memfilter data tidak terverifikasi
        }
    },
    columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
        { data: 'NIK', name: 'NIK' },
        { data: 'NamaLengkap', name: 'NamaLengkap' },
        { data: 'AlamatDomisili', name: 'AlamatDomisili' },
        { data: 'JenisKelamin', name: 'JenisKelamin' },
        { data: 'PendidikanTerakhir', name: 'PendidikanTerakhir' },
        { data: 'Jurusan', name: 'Jurusan' },
        { data: 'TanggalPengesahan', name: 'TanggalPengesahan' },
        { data: 'Status', name: 'Status' },
        { data: 'action', name: 'action', orderable: false, searchable: false },
    ],
});

window.addEventListener('load', function () {
    @if(session('success'))
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 3000
    });
    @endif
});


    
    // Tambah data
    $('#addData').click(function () {
        $('#addDataForm').trigger('reset');
        $('#addDataModal').modal('show');
    });

   

    // Edit data
    $('body').on('click', '.editData', function () {
        var id = $(this).data('id');
        var url = "{{ url('data/verifikasi') }}" + '/' + id + '/edit';

        $.get(url, function (data) {
            $('#addDataForm').trigger('reset');
            $('#addDataModal').modal('show');
            $('#addDataModalLabel').text('Edit Data');
            $('#addDataForm').attr('action', "{{ url('data') }}" + '/' + id);
            $('#addDataForm #NIK').val(data.NIK);
            $('#addDataForm #NamaLengkap').val(data.NamaLengkap);
            $('#addDataForm #AlamatDomisili').val(data.AlamatDomisili);
            $('#addDataForm #JenisKelamin').val(data.JenisKelamin);
            $('#addDataForm #PendidikanTerakhir').val(data.PendidikanTerakhir);
            $('#addDataForm #Jurusan').val(data.Jurusan);
            $('#addDataForm #TanggalPengesahan').val(data.TanggalPengesahan);
            $('#addDataForm #Status').val(data.Status);
        });
    });

    //Update data
    $('#addDataForm').on('submit', function (e) {
        e.preventDefault();
        var url = $(this).attr('action');
        
        $.ajax({
            url: url,
            type: 'PUT',
            data: $(this).serialize(),
            success: function (response) {
                $('#addDataModal').modal('hide');
                table.ajax.reload();
                Swal.fire('Berhasil', response.message, 'success');
            },
            error: function (xhr) {
                Swal.fire('Error', xhr.responseJSON.message, 'error');
            }
        });
    });

    // Verifikasi data    
    $(document).on('click', '.verifyData', function () {
        var id = $(this).data('verifikasi-id');
        var url = "{{ url('data/verifikasi') }}" + "/" + id;

        Swal.fire({
            title: 'Konfirmasi',
            text: 'Anda yakin ingin memverifikasi data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Verifikasi',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        table.ajax.reload(); // Refresh tabel setelah verifikasi berhasil
                    },
                    error: function (xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Terjadi kesalahan. Silakan coba lagi.',
                        });
                    }
                });
            }
        });
    });


    
    // Hapus data
    $('body').on('click', '.deleteData', function () {
        var id = $(this).data('id');
        var url = "{{ url('data.verifikasi') }}" + '/' + id;
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function (response) {
                        table.ajax.reload();
                        Swal.fire('Berhasil', response.message, 'success');
                    },
                    error: function (xhr) {
                        Swal.fire('Error', xhr.responseJSON.message, 'error');
                    }
                });
            }
        });
    });

    
});
    </script>

    @include('sweetalert::alert')

</body>


</html>