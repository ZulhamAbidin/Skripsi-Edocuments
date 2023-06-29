<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>PRINT</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* standard stylesheet */
        body {
            color: #000;
            font-family: 'Century Gothic', 'Apple Gothic', sans-serif;
        }

        a {
            text-decoration: none;
            color: #000;
        }

        #content>p {
            font-size: large;
        }

        #container {
            margin: 0px auto;
            width: 900px;
        }

        #bodycontent {
            margin: 0px auto;
        }

        #content {
            float: left;
            width: 600px;
        }

        #sidebar {
            float: right;
            width: 200px;
            font-size: small;
        }
    </style>
</head>

<body>

    <div id="container">

        <div class="grid grid-cols-6 text-center mt-5 ">

            <div class="a col-span-1 row-span-4">
                <img src={{ asset('image/mks.jpg') }} class="h-28 ml-8" alt="">
            </div>

            <div class="col-span-4 flex flex-wrap pt-6">
                <span class="col-span-4 text-base font-semibold w-full leading-3 tracking-wider">PEMERINTAH KOTA
                    MAKASSAR</span>
                <span class="col-span-4 row-start-2 col-start-2 text-xl font-bold w-full tracking-wider:">DINAS
                    KETENAGAKERJAAN</span>
                <span class="col-span-4 row-start-3 col-start-2 text-xs font-semibold w-full tracking-wider">Jl. Andi
                    Pangeran Pettarani No.72
                    Telp./Fax.(0411)853930 Makassar 90222</span>
                <span class="col-span-4 row-start-4 col-start-2 text-xs font-semibold w-full tracking-wider">Email :
                    disnaker_makassar@gmail.com Homepage :
                    http:www.makassar.go.id</span>
            </div>

            <div class="a col-span-1 row-span-4">
                <img src={{ asset('image/naker.png') }} class="h-28" alt="">
            </div>


        </div>

        <hr class="w-full bg-slate-800 mt-4 h-1">

        <h1 class="text-center font-semibold mt-8">PESERTA PENGESAHAN KARTU AK1</h1>
        <hr class="w-64 mx-auto mt-1 bg-slate-800 h-0.5">

        <div class="overflow-x-auto relative my-11">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-black bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3 px-2 border text-center"> No </th>
                        <th scope="col" class="py-3 px-6 border"> NIK </th>
                        <th scope="col" class="py-3 px-6 border"> Nama Lengkap </th>
                        <th scope="col" class="py-3 px-6 border"> Alamat Domisili </th>
                        <th scope="col" class="py-3 px-6 border"> Jenis Kelamin </th>
                        <th scope="col" class="py-3 px-6 border"> Pendidikan Terakhir </th>
                        <th scope="col" class="py-3 px-6 border"> Jurusan </th>
                        <th scope="col" class="py-3 px-6 border"> Tanggal Pengesahan </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cetakPertanggal as $data)
                    <tr class="">
                        <td class="py-3 px-2 border text-center">{{ $loop->iteration }}</td>
                        <td class="py-3 px-4 border">{{ $data->NIK }}</td>
                        <td class="py-3 px-4 border">{{ $data->NamaLengkap }}</td>
                        <td class="py-3 px-4 border">{{ $data->AlamatDomisili }}</td>
                        <td class="py-3 px-4 border">{{ $data->JenisKelamin }}</td>
                        <td class="py-3 px-4 border">{{ $data->PendidikanTerakhir }}</td>
                        <td class="py-3 px-4 border">{{ $data->Jurusan }}</td>
                        <td class="py-3 px-4 border">{{\Carbon\Carbon::parse($data->TanggalPengesahan)->format('d.m.Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <script>
        window.print();
    </script>
</body>

</html>