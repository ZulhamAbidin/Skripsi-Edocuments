@extends('layouts.main')

@section('container')
<div class="container">
    <h1>Data Export</h1>
    <div class="card">
        <div class="card-body">
            <table id="dataTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Alamat Domisili</th>
                        <th>Jenis Kelamin</th>
                        <th>Pendidikan Terakhir</th>
                        <th>Jurusan</th>
                        <th>Tanggal Pengesahan</th>
                        <th>Status</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>

$(function () {
    $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('export.data') }}",
        columns: [
            { data: 'NIK', name: 'NIK' },
            { data: 'NamaLengkap', name: 'NamaLengkap' },
            { data: 'AlamatDomisili', name: 'AlamatDomisili' },
            { data: 'JenisKelamin', name: 'JenisKelamin' },
            { data: 'PendidikanTerakhir', name: 'PendidikanTerakhir' },
            { data: 'Jurusan', name: 'Jurusan' },
            { data: 'TanggalPengesahan', name: 'TanggalPengesahan' },
            { data: 'Status', name: 'Status' }
        ],
        dom: 'Bfrtip',
        buttons: [
            'excel',
            'pdf'
        ]
    });

    
});
</script>
@endpush
