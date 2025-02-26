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
    <a href="{{ route('items.create') }}">Add Item</a>
    <ul>
        @foreach ($items as $item)
            <li>
                {{ $item->name }} -
                <a href="{{ route('items.edit', $item) }}">Edit</a>
                <!--mengarahkan ke halaman edit untuk item tertentu-->
                <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;">
                    <!--mengirim permintaan ke rute untuk menghapus item-->
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button> <!--tombol untuk menghapus item-->
                </form>
                 
            </li>
        @endforeach
    </ul>
</body>
</html>
