@extends('layouts.main')

@section('container')
    <div class="container">
        <h1>Pengesahan Data</h1>
        <table id="pengesahanTable" class="table table-striped">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>No. Telepon</th>
                    <th>Alamat Domisili</th>
                    <th>Tanggal Pengesahan</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection

@push('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $('#pengesahanTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('visit.index') }}",
                columns: [{
                        data: 'NIK',
                        name: 'NIK'
                    },
                    {
                        data: 'NamaLengkap',
                        name: 'NamaLengkap'
                    },
                    {
                        data: 'NoTelfon',
                        name: 'NoTelfon'
                    },
                    {
                        data: 'AlamatDomisili',
                        name: 'AlamatDomisili'
                    },
                    {
                        data: 'TanggalPengesahan',
                        name: 'TanggalPengesahan'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endpush
