<h1>Data Pengguna</h1>
<ul>
    <li><strong>Name:</strong> {{ $user->name }}</li>
    <li><strong>Email:</strong> {{ $user->email }}</li>
    <!-- Add any other user information you want to display -->
</ul>

<h1>Data Pengesahan</h1>
<ul>
    @foreach ($pengesahans as $pengesahan)
    <li><strong>Nama Lengkap:</strong> {{ $pengesahan->NamaLengkap }}</li>
    <li><strong>Alamat Domisili:</strong> {{ $pengesahan->AlamatDomisili }}</li>
    <!-- Add any other Pengesahan information you want to display -->
    <hr>
    @endforeach
</ul>