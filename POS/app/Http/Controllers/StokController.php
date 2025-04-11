<?php

namespace App\Http\Controllers;

use App\Models\StokModel;
use App\Models\BarangModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StokController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Stok',
            'list' => ['Home', 'Stok']
        ];

        $page = (object)[
            'title' => 'Daftar Stok Barang'
        ];

        $activeMenu = 'stok';

        return view('stok.index', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function list(Request $request)
    {
        $stok = StokModel::select('stok_id', 'barang_id', 'user_id', 'stok_tanggal', 'stok_jumlah');

        return DataTables::of($stok)
            ->addIndexColumn()
            ->addColumn('aksi', function ($stok) {
                $btn  = '<a href="' . url('/stok/' . $stok->stok_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/stok/' . $stok->stok_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/stok/' . $stok->stok_id) . '">' 
                      . csrf_field() . method_field('DELETE') 
                      . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin?\')">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Stok',
            'list' => ['Home', 'Stok', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah Data Stok'
        ];

        $activeMenu = 'stok';

        return view('stok.create', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id'     => 'required|integer',
            'user_id'       => 'required|integer',
            'stok_tanggal'  => 'required|date',
            'stok_jumlah'   => 'required|integer'
        ]);

        StokModel::create([
            'barang_id'     => $request->barang_id,
            'user_id'       => $request->user_id,
            'stok_tanggal'  => $request->stok_tanggal,
            'stok_jumlah'   => $request->stok_jumlah,
        ]);

        return redirect('/stok')->with('success', 'Data stok berhasil disimpan');
    }

    
    public function show(string $id)
    {
        $stok = StokModel::with('barang')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Data Stok',
            'list'  => ['Home', 'Stok', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Stok'
        ];

        $activeMenu = 'stok'; // set menu yang sedang aktif

        return view('stok.show', [
            'breadcrumb'    => $breadcrumb,
            'page'          => $page,
            'stok'          => $stok,
            'activeMenu'    => $activeMenu
        ]);
    }

    public function edit(string $id)
    {
        $stok = StokModel::findOrFail($id);

        $breadcrumb = (object)[
            'title' => 'Edit Stok',
            'list' => ['Home', 'Stok', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit Data Stok'
        ];

        $activeMenu = 'stok';

        return view('stok.edit', compact('breadcrumb', 'page', 'stok', 'activeMenu'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'barang_id'     => 'required|integer',
            'user_id'       => 'required|integer',
            'stok_tanggal'  => 'required|date',
            'stok_jumlah'   => 'required|integer'
        ]);

        $stok = StokModel::findOrFail($id);

        $stok->update([
            'barang_id'     => $request->barang_id,
            'user_id'       => $request->user_id,
            'stok_tanggal'  => $request->stok_tanggal,
            'stok_jumlah'   => $request->stok_jumlah,
        ]);

        return redirect('/stok')->with('success', 'Data stok berhasil diubah');
    }

    public function destroy(string $id)
    {
        $check = StokModel::find($id);

        if (!$check) {
            return redirect('/stok')->with('error', 'Data stok tidak ditemukan');
        }

        try {
            StokModel::destroy($id);
            return redirect('/stok')->with('success', 'Data stok berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/stok')->with('error', 'Data stok gagal dihapus karena masih digunakan');
        }
    }
}
