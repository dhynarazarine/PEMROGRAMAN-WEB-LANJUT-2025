<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>
</head>
<body>
    <h1>Add Item</h1>
    <!--form untuk mengirim data ke server, action mengarahkan data yang diinput ke rute items.store yang akan
    menyimpan data di database, method="POST" menunjukan data akan dikitim menggunakan metode POST untuk menyimpan data baru -->
    <form action="{{ route('items.store') }}" method="POST"> 
        @csrf
        <!--memberikan label name untuk input-->
        <label for="name">Name:</label>
        <input type="text" name="name" required> <!--kolom input untuk nama item-->
        <br>
        <label for="description">Description:</label>
        <textarea name="description" required></textarea><!--untuk input teks deskripsi item-->
        <br>
        <button type="submit">Add Item</button><!--mengirim formulir ke server saat tombol ditekan-->
    </form>

    <a href="{{ route('items.index') }}">Back to List</a> <!--mengarahkan pengguna kembali ke halaman daftar item-->

</body>
</html>
