<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
</head>
{{-- <body>
    <h1>Data User</h1>
    <table border="1" cellpadding="2">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>IDPengguna</th>
        </tr>
            <tr>
                <td>{{$data->user_id}}</td>
                <td>{{$data->username}}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->level_id}}</td>
            </tr>
        
         {{-- <tr>
            <th>Jumlah Pengguna</th> // Praktikum 2.3
         </tr>
        <tr> --}}
            {{-- <td>{{$data}}</td> --}}
        {{-- </tr>
    </table>
</body> --}}
<body>
    <h1>Data User</h1>
    <a href="/PEMROGRAMAN-WEB-LANJUT-2025/Minggu%204/PWL_POS/public/user/tambah">+ Tambah User</a>
    <table border="1" cellpadding="2" cellspacing='0'> 
        <tr>
            <td>ID</td>
            <td>Username</td>
            <td>Nama</td>
            <td>IDPengguna</td>
            <td>Kode Level</td>
            <td>Nama Level</td>

        </tr>
        @foreach ($data as $d)
        <tr>
            <td>{{ $d->user_id }}</td>
            <td>{{ $d->username }}</td>
            <td>{{ $d->nama }}</td>
            <td>{{ $d->level_id }}</td>
            <td>{{ $d->level->level_kode }}</td>
            <td>{{ $d->level->level_nama }}</td>
        <td>
        <a href="/PEMROGRAMAN-WEB-LANJUT-2025/Minggu%204/PWL_POS/public/user/ubah/{{ $d->user_id }}">Ubah</a> | <a href="/PEMROGRAMAN-WEB-LANJUT-2025/Minggu%204/PWL_POS/public/user/hapus/{{ $d->user_id }}">Hapus</a>
        </td>
        </tr>
    @endforeach
    </table>
</body>
</html>