<?php

namespace App\Http\Controllers;

use App\Models\PenjualanModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PenjualanController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Penjualan',
            'list' => ['Home', 'Penjualan']
        ];
        
        $page = (object) [
            'title' => 'Daftar Penjualan yang tercatat dalam sistem'
        ];

        $activeMenu = 'penjualan';

        return view('penjualan.index', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function list(Request $request) 
    { 
        $penjualan = PenjualanModel::select('penjualan_id', 'penjualan_kode', 'pembeli', 'tanggal_penjualan');

        return DataTables::of($penjualan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($data) {
                $btn  = '<a href="' . url('/penjualan/' . $data->penjualan_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/penjualan/' . $data->penjualan_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/penjualan/' . $data->penjualan_id) . '">' 
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
            'title' => 'Tambah Penjualan',
            'list' => ['Home', 'Penjualan', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah Data Penjualan'
        ];

        $activeMenu = 'penjualan';

        return view('penjualan.create', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penjualan_kode'     => 'required|string|min:3|max:20|unique:t_penjualan,penjualan_kode',
            'pembeli'            => 'required|string|max:100',
            'tanggal_penjualan' => 'required|date',
            'user_id'            => 'required|integer'
        ]);

        PenjualanModel::create([
            'penjualan_kode'     => $request->penjualan_kode,
            'pembeli'            => $request->pembeli,
            'tanggal_penjualan' => $request->tanggal_penjualan,
            'user_id'            => $request->user_id
        ]);

        return redirect('/penjualan')->with('success', 'Data penjualan berhasil disimpan');
    }

    public function show(string $id)
{
    $penjualan = PenjualanModel::find($id);

    $breadcrumb = (object) [
        'title' => 'Detail Penjualan',
        'list'  => ['Home', 'Penjualan', 'Detail']
    ];

    $page = (object) [
        'title' => 'Detail Penjualan'
    ];

    $activeMenu = 'penjualan'; // set menu yang sedang aktif

    return view('penjualan.show', [
        'breadcrumb'    => $breadcrumb,
        'page'          => $page,
        'penjualan'     => $penjualan,
        'activeMenu'    => $activeMenu
    ]);
}


    public function edit(string $id)
    {
        $penjualan = PenjualanModel::findOrFail($id);

        $breadcrumb = (object)[
            'title' => 'Edit Penjualan',
            'list' => ['Home', 'Penjualan', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit Data Penjualan'
        ];

        $activeMenu = 'penjualan';

        return view('penjualan.edit', compact('breadcrumb', 'page', 'penjualan', 'activeMenu'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'penjualan_kode'     => 'required|string|min:3|max:20|unique:t_penjualan,penjualan_kode,' . $id . ',penjualan_id',
            'pembeli'            => 'required|string|max:100',
            'tanggal_penjualan' => 'required|date',
            'user_id'            => 'required|integer'
        ]);

        $penjualan = PenjualanModel::findOrFail($id);

        $penjualan->update([
            'penjualan_kode'     => $request->penjualan_kode,
            'pembeli'            => $request->pembeli,
            'tanggal_penjualan' => $request->tanggal_penjualan,
            'user_id'            => $request->user_id
        ]);

        return redirect('/penjualan')->with('success', 'Data penjualan berhasil diubah');
    }

    public function destroy(string $id)
    {
        $check = PenjualanModel::find($id);

        if (!$check) {
            return redirect('/penjualan')->with('error', 'Data penjualan tidak ditemukan');
        }

        try {
            PenjualanModel::destroy($id);
            return redirect('/penjualan')->with('success', 'Data penjualan berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/penjualan')->with('error', 'Data penjualan gagal dihapus karena masih digunakan');
        }
    }
}
