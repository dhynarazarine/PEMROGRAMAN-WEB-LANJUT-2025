<!DOCTYPE html>
<html>
<head>
    <title>Item List</title>
</head>
<body>
    <h1>Items</h1>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <!--cek apakah ada pesan succes dalam session jika ada ditampilkan dalam tag <p> biasanya berasal dari aksi Tambah, Edit atau Hapus Item-->

    <a href="{{ route('items.create') }}">Add Item</a>
    <!--membuat link ke halaman tambah item, jika diklik akan membuka formulir untuk menambah item baru-->
    <ul>
        @foreach ($items as $item)
            <li>
                {{ $item->name }}
                <!--membuat daftar untuk menampilkan item, looping melalui daftar item dan menampilkan nama item-->
                <a href="{{ route('items.edit', $item) }}">Edit</a>
                <!--membuat link ke halaman edit item, mengarahkan ke halaman edit untuk item yang sedang ditampilkan-->
                <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;">
                    @csrf <!--agar Laravel menerima permintaan ini-->
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
                <!--menghapus item dengan metode DELETE, mengirim permintaan ke rute 'items.destroy' untuk menghapus item -->
            </li>
        @endforeach
    </ul>
</body>
</html>

