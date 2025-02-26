<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
</head>
<body>
    <h1>Edit Item</h1>
    <!--mengarahkan data yang diedit ke rute item menangani update data item di database-->
    <form action="{{ route('items.update', $item) }}" method="POST">
        @csrf
        @method('PUT') <!--mengharuskan metode PUT untuk update data. Override metode menjadi PUT-->
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $item->name }}" required> <!--kolom input untuk nama item, value="{{ $item->name }}" menampilkan nama item yang sedang di edit -->
        <br>
        <label for="description">Description:</label>
        <textarea name="description" required>{{ $item->description }}</textarea>
        <br>
        <button type="submit">Update Item</button> <!--mengirim formulir ke server saat tombol ditekan untuk memperbarui data-->
    </form>

    <a href="{{ route('items.index') }}">Back to List</a> <!--mengarahkan pengguna kembali ke halaman daftar item-->
</body>
</html>
