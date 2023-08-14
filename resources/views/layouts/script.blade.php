@push('script')
    <script>
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                searching: true, // Mengaktifkan fitur pencarian
                ajax: {
                    url: "{{ route('data.index') }}",
                    data: function(d) {
                        d.verifikasi =
                            1; // Mengirim parameter verifikasi = 1 untuk memfilter data terverifikasi
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'NoRegistrasi',
                        name: 'NoRegistrasi'
                    },
                    {
                        data: 'TujuanPerusahaan',
                        name: 'TujuanPerusahaan'
                    },
                    {
                        data: 'NamaLengkap',
                        name: 'NamaLengkap'
                    },
                    {
                        data: 'AlamatDomisili',
                        name: 'AlamatDomisili'
                    },
                    {
                        data: 'TempatTanggalLahir',
                        name: 'TempatTanggalLahir'
                    },
                    {
                        data: 'NoTelfon',
                        name: 'NoTelfon'
                    },
                    {
                        data: 'StatusPerkawinan',
                        name: 'StatusPerkawinan'
                    },
                    {
                        data: 'JenisKelamin',
                        name: 'JenisKelamin'
                    },
                    {
                        data: 'PendidikanTerakhir',
                        name: 'PendidikanTerakhir'
                    },
                    {
                        data: 'Jurusan',
                        name: 'Jurusan'
                    },
                    {
                        data: 'TanggalPengesahan',
                        name: 'TanggalPengesahan'
                    },
                    {
                        data: 'TanggalPengambilan',
                        name: 'TanggalPengambilan'
                    },
                    {
                        data: 'WaktuPengambilan',
                        name: 'WaktuPengambilan'
                    },
                    {
                        data: 'Total',
                        name: 'Total',
                        render: function(data, type, row) {
                            if (type === 'display') {
                                if (data === null) {
                                    return 'Lembar';
                                } else {
                                    return data.toString() + ' Lembar';
                                }
                            }
                            return data;
                        }
                    },
                    {
                        data: 'Status',
                        name: 'Status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            });

            // Tangani aksi pencarian saat pengguna mengetik
            $('#search-input').on('keyup', function() {
                var searchValue = $(this).val();
                table.search(searchValue).draw();
            });

            window.addEventListener('load', function() {
                @if (session('success'))
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
            $('#addData').click(function() {
                $('#addDataForm').trigger('reset');
                $('#addDataModal').modal('show');
            });



            // Edit data
            $('body').on('click', '.editData', function() {
                var id = $(this).data('id');
                var url = "{{ url('data') }}" + '/' + id + '/edit';

                $.get(url, function(data) {
                    $('#addDataForm').trigger('reset');
                    $('#addDataModal').modal('show');
                    $('#addDataModalLabel').text('Edit Data');
                    $('#addDataForm').attr('action', "{{ url('data') }}" + '/' + id);
                    $('#addDataForm #NamaLengkap').val(data.NamaLengkap);
                    $('#addDataForm #NoRegistrasi').val(data.NoRegistrasi);
                    $('#addDataForm #TujuanPerusahaan').val(data.TujuanPerusahaan);
                    $('#addDataForm #TempatTanggalLahir').val(data.TempatTanggalLahir);
                    $('#addDataForm #StatusPerkawinan').val(data.StatusPerkawinan);
                    $('#addDataForm #AlamatDomisili').val(data.AlamatDomisili);
                    $('#addDataForm #NoTelfon').val(data.NoTelfon);
                    $('#addDataForm #JenisKelamin').val(data.JenisKelamin);
                    $('#addDataForm #PendidikanTerakhir').val(data.PendidikanTerakhir);
                    $('#addDataForm #Jurusan').val(data.Jurusan);
                    $('#addDataForm #TanggalPengesahan').val(data.TanggalPengesahan);
                    $('#addDataForm #TanggalPengambilan').val(data.TanggalPengambilan);
                    $('#addDataForm #WaktuPengambilan').val(data.WaktuPengambilan);
                    $('#addDataForm #Total').val(data.Total);
                    $('#addDataForm #Status').val(data.Status);
                });
            });

            // Update data
            $('#addDataForm').on('submit', function(e) {
                e.preventDefault();
                var url = $(this).attr('action');

                $.ajax({
                    url: url,
                    type: 'PUT',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#addDataModal').modal('hide');
                        table.ajax.reload();
                        Swal.fire('Berhasil', response.message, 'success');
                    },
                    error: function(xhr) {
                        Swal.fire('Error', xhr.responseJSON.message, 'error');
                    }
                });
            });

            // Hapus data
            $('body').on('click', '.deleteData', function() {
                var id = $(this).data('id');
                var url = "{{ url('data') }}" + '/' + id;

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
                            success: function(response) {
                                table.ajax.reload();
                                Swal.fire('Berhasil', response.message, 'success');
                            },
                            error: function(xhr) {
                                Swal.fire('Error', xhr.responseJSON.message, 'error');
                            }
                        });
                    }
                });
            });




        });
    </script>
@endpush
