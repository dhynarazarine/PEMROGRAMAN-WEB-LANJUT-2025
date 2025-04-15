<?php

namespace App\Http\Controllers;

use App\Models\StokModel;
use App\Models\BarangModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

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
        $stok = StokModel::select('stok_id', 'barang_id', 'user_id', 'stok_tanggal', 'stok_jumlah')
                         ->with('barang', 'user');  // Memuat relasi barang dan user

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

        // Mengambil daftar barang yang ada
        $barangList = BarangModel::all();

        return view('stok.create', compact('breadcrumb', 'page', 'activeMenu', 'barangList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id'     => 'required|integer',
            'user_id'       => 'required|integer',
            'stok_tanggal'  => 'required|date',
            'stok_jumlah'   => 'required|integer'
        ]);

        // Menyimpan data stok dengan user_id dari login
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
        $stok = StokModel::with('barang', 'user')->find($id);  // Memuat relasi barang dan user

        if (!$stok) {
            return redirect('/stok')->with('error', 'Data stok tidak ditemukan');
        }

        $breadcrumb = (object)[
            'title' => 'Detail Data Stok',
            'list' => ['Home', 'Stok', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail Stok'
        ];

        $activeMenu = 'stok';

        return view('stok.show', compact('breadcrumb', 'page', 'stok', 'activeMenu'));
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

        // Mengambil daftar barang untuk pilihan
        $barangList = BarangModel::all();

        return view('stok.edit', compact('breadcrumb', 'page', 'stok', 'barangList', 'activeMenu'));
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
            'stok_jumlah'   => $request->stok_jumlah
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

    public function create_ajax()
    {
        $barang = BarangModel::select('barang_id', 'barang_nama')->get();
        return view('stok.create_ajax', ['barang' => $barang]);
    }

    public function store_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'barang_id' => 'required|exists:m_barang,barang_id',
                'stok_tanggal' => 'required|date',
                'stok_jumlah' => 'required|integer|min:1'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors()
                ]);
            }

            // Simpan data stok (user_id dari login)
            StokModel::create([
                'barang_id' => $request->barang_id,
                'user_id' => auth()->id(),  // Menggunakan ID user yang sedang login
                'stok_tanggal' => $request->stok_tanggal,
                'stok_jumlah' => $request->stok_jumlah,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Data stok berhasil disimpan'
            ]);
        }

        return redirect('/');
    }

    public function edit_ajax(string $id)
    {
        $stok = StokModel::find($id);

        return view('stok.edit_ajax', compact('stok'));
    }

    public function update_ajax(Request $request, string $id)
{
    if ($request->ajax() || $request->wantsJson()) {
        $rules = [
            'barang_id' => 'required|integer|exists:m_barang,barang_id',
            'user_id' => 'required|integer|exists:users,id',
            'stok_tanggal' => 'required|date',
            'stok_jumlah' => 'required|integer|min:0'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal.',
                'msgField' => $validator->errors()
            ]);
        }

        $stok = StokModel::find($id);
        if ($stok) {
            $stok->update($request->only(['barang_id', 'user_id', 'stok_tanggal', 'stok_jumlah']));

            return response()->json([
                'status' => true,
                'message' => 'Data stok berhasil diupdate.'
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Data stok tidak ditemukan.'
        ]);
    }

    return redirect('/');
}

}
