{{-- <!DOCTYPE html>
<html>

<head>
    <title>Data Export</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>

<body>
    <h1>Data Export</h1>
    <table>
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
        <tbody>
            @foreach($data as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->NIK }}</td>
                <td>{{ $row->NamaLengkap }}</td>
                <td>{{ $row->AlamatDomisili }}</td>
                <td>{{ $row->JenisKelamin }}</td>
                <td>{{ $row->PendidikanTerakhir }}</td>
                <td>{{ $row->Jurusan }}</td>
                <td>{{ $row->TanggalPengesahan }}</td>
                <td>{{ $row->Status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html> --}}