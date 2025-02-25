<?php

namespace App\Http\Controllers; 
//namespace menentukan lokasi file dalam struktur proyek laravel bawaan laravel untuk semua controller
use App\Models\Item;
// impor kelas Item dari namespace, item model Eloquent(model yang digunakan untuk mengakses dan memanipulasi data) yang merepresentasikan tabel items
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
        //mengambil semua data item dan mengembalikan tampilan items.index dengan daftar item
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("items.create");
        //mengembalikan tampilan items.create menampilkan formulir tambah item
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        // memvalidasi input agar name dan description tidak kosong, membuat item baru dengan hanya memasukkan atribut yang diizinkan
        // setelah item tersimpan, pengguna akan dialihkan ke daftar item dengan pesan sukses 

        //Item::create($request->all());
        //return redirect()->route('items.index');

        // Hanya masukkan atribut yang diizinkan
        Item::create($request->only(['name', 'description']));
        return redirect()->route('items.index')->with('success', 'Item added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('items.show', compact('item'));
        // untuk menampilkan halaman detail item berdasarkan id dari root
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('items.edit', compact('item'));
        // menampilkan halaman form edit item
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
         
        //$item->update($request->all());
        //return redirect()->route('items.index');
        // Hanya masukkan atribut yang diizinkan
         $item->update($request->only(['name', 'description']));
        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
        // mengupdate item dengan memasukkan atribut yang diizinkan, jika berhasil diperbarui maka user dialihkan daftar item dengan pesan succes
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        // return redirect()->route('items.index');
       $item->delete();
       return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
       // menghapus item dari database, mengalihkan user kembali ke daftar item dengan pesan succes
    }
}
