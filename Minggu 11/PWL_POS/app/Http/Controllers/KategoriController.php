<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class KategoriController extends Controller
{
    // Menampilkan Halaman Awal kategori
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Kategori',
            'list' => ['Home', 'Kategori']
        ];
        
        $page = (object) [
            'title' => 'Daftar Kategori yang terdaftar dalam sistem'
        ];

        $activeMenu = 'kategori'; //set menu yang sedang aktif
        
        return view('kategori.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    // Ambil data kategori dalam bentuk json untuk datatables
    public function list(Request $request) 
    { 
        $kategori = KategoriModel::select('kategori_id', 'kategori_kode', 'kategori_nama');

        if ($request->kategori_id) {
            $kategori->where('kategori_id', $request->kategori_id);
        }

        return DataTables::of($kategori)
        // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex) 
            ->addIndexColumn()
            ->addColumn('aksi', function ($kategori) { // menambahkan kolom aksi 
            //     $btn  = '<a href="' . url('/kategori/' . $kategori->kategori_id) . '" class="btn btn-info btn-sm">Detail</a> ';
            //     $btn .= '<a href="' . url('/kategori/' . $kategori->kategori_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
            //     $btn .= '<form class="d-inline-block" method="POST" action="' . url('/kategori/' . $kategori->kategori_id) . '">' 
            //           . csrf_field() . method_field('DELETE') 
            //           . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin?\')">Hapus</button></form>';
            //     return $btn;
            // })
            // ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html 
            // ->make(true);
            $btn = '<button onclick="modalAction(\'' . url('/kategori/' . $kategori->kategori_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';

            $btn .= '<button onclick="modalAction(\'' . url('/kategori/' . $kategori->kategori_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';

            $btn .= '<button onclick="modalAction(\'' . url('/kategori/' . $kategori->kategori_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
            return $btn;
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }


    public function create() 
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Kategori',
            'list' => ['Home', 'Kategori', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Kategori baru'
        ];
        
        $kategori = KategoriModel::all(); // Ambil data kategori untuk ditampilkan di form
        $activeMenu = 'kategori'; // set menu yang sedang aktif
        
        return view('kategori.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
        
    }
    
    //Menyimpan data kategori baru
    public function store(Request $request)
    {
        $request->validate([
            //kategori kode harus diisi, berupa string, minimal 3 karakter, dan bernilai unik di tabel m_kategori kolom kategorin_kode
            'kategori_kode' => 'required|string|min:3|unique:m_kategori,kategori_kode',
            'kategori_nama' => 'required|string|max:100'
        ]);
        
        kategoriModel::create([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama,
        ]);
        
        return redirect('/kategori')->with('success', 'Data kategori berhasil disimpan');
    }
    
    //Menampilkan detail kategori
    public function show(string $id)
    {
        $kategori = KategoriModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Kategori',
            'list'  => ['Home', 'Kategori', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Kategori'
        ];

        $activeMenu = 'kategori';

        return view('kategori.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }
    
    //Menampilkan halaman form edit kategori
    public function edit(string $id)
    {
        $kategori = KategoriModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit Kategori',
            'list' => ['Home', 'Kategori', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Kategori'
        ];

        $activeMenu = 'kategori'; // set menu yang sedang aktif

        return view('kategori.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }
    
    //Menyimpan data kategori baru
    public function update(Request $request, string $id)
    {
        $request->validate([
            //kategori kode harus diisi, berupa string, minimal 3 karakter, dan 
            //bernilai unik di tabel m_kategori kolom kategori_kode kecuali untuk kategori dengan id yang sedang di edit
            'kategori_kode' => 'required|string|min:3|unique:m_kategori,kategori_kode,' . $id . ',kategori_id',
            'kategori_nama' => 'required|string|max:100' // nama harus diisi, berupa string, dan maksimal 100 karakter
        ]);
        
        kategoriModel::find($id)->update([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama,
        ]);
        
        return redirect('/kategori')->with('success', 'Data kategori berhasil diubah');
    }

    // Menghapus data kategori
    public function destroy(string $id)
    {
        $check = KategoriModel::find($id);
        if (!$check) {
            return redirect('/kategori')->with('error','Data kategori Tidak ditemukan');
        }

        try {
            KategoriModel::destroy($id);
            return redirect('/kategori')->with('success','Data kategori berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            //jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan pesan error
            return redirect('/kategori')->with('error','Data kategori gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

    public function create_ajax()
    {
        $kategori = KategoriModel::select('kategori_id', 'kategori_nama')->get();
        return view('kategori.create_ajax', ['kategori' => $kategori]);
    }

    
    public function store_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'kategori_kode' => 'required|string|min:3|unique:m_kategori,kategori_kode',
                'kategori_nama' => 'required|string|max:100'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors()
                ]);
            }

            KategoriModel::create($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Data kategori berhasil disimpan'
            ]);
        }

        return redirect('/');
    }

    public function edit_ajax(string $id)
    {
        $kategori = KategoriModel::find($id);

        if (!$kategori) {
            return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 404);
        }

        return view('kategori.edit_ajax', ['kategori' => $kategori]);
    }


    public function update_ajax(Request $request, string $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'kategori_kode' => 'required|string|max:5',
                'kategori_nama' => 'required|string|max:100',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors(),
                ]);
            }
            $check = KategoriModel::find($id);
            if ($check) {
                $check->update($request->all());
                return response()->json([
                    'status' => true,
                    'message' => 'Data kategori berhasil diubah',
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data kategori tidak ditemukan',
                ]);
            }
        }
        return redirect('/');
    }

    public function confirm_ajax(string $id)
    {
        $kategori = KategoriModel::find($id);

        return view('kategori.confirm_ajax', ['kategori' => $kategori]);
    }

    public function delete_ajax(Request $request, string $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $kategori = KategoriModel::find($id);
            if ($kategori) {
                $kategori->delete();
                return response()->json([
                    'status' => true,
                    'message' => 'Data kategori berhasil dihapus',
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data kategori tidak ditemukan',
                ]);
            }
        }
        return redirect('/');
    }

    public function show_ajax(string $id)
    {
        $kategori = KategoriModel::find($id);
    
        if (!$kategori) {
            return response()->json(['status' => false, 'message' => 'Data tidak ditemukan'], 404);
        }
    
        return view('kategori.show_ajax', ['kategori' => $kategori]);
    }

    public function import()
        {
            return view('kategori.import');


        }

    public function import_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                // validasi file harus xls atau xlsx, max 1MB
                'file_kategori' => ['required', 'mimes:xlsx', 'max:1024']
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors()
                ]);
            }
            $file = $request->file('file_kategori');

            $reader = IOFactory::createReader('Xlsx');
            $reader->setReadDataOnly(true);
            $spreadsheet = $reader->load($file->getRealPath());
            $sheet = $spreadsheet->getActiveSheet();

            $data = $sheet->toArray(null, false, true, true);

            $insert = [];
            if (count($data) > 1) {
                foreach ($data as $baris => $value) {
                    if ($baris > 1) {
                        $insert[] = [
                            'kategori_kode' => $value['A'],
                            'kategori_nama' => $value['B'],
                            'created_at' => now(),
                        ];
                    }
                }

                if (count($insert) > 0) {
                    KategoriModel::insertOrIgnore($insert);
                }

                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil diimport'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Tidak ada data yang diimport'
                ]);
            }
        }
        return redirect('/');
    }

     // Menampilkan form export kategori
     public function export_excel()
     {
         // Ambil data kategori yang akan diekspor
         $kategori = KategoriModel::select('kategori_id', 'kategori_kode', 'kategori_nama')
             ->orderBy('kategori_id')
             ->get();
 
         // Load library PhpSpreadsheet
         $spreadsheet = new Spreadsheet();
         $sheet = $spreadsheet->getActiveSheet();
 
         // Set header kolom
         $sheet->setCellValue('A1', 'No');
         $sheet->setCellValue('B1', 'Kode Kategori');
         $sheet->setCellValue('C1', 'Nama Kategori');
 
         // Format header bold
         $sheet->getStyle('A1:F1')->getFont()->setBold(true);
 
         // Isi data kategori
         $no = 1;
         $baris = 2;
         foreach ($kategori as $value) {
             $sheet->setCellValue('A' . $baris, $no);
             $sheet->setCellValue('B' . $baris, $value->kategori_kode);
             $sheet->setCellValue('C' . $baris, $value->kategori_nama);
             $baris++;
             $no++;
         }
 
         // Set auto size untuk kolom
         foreach (range('A', 'C') as $columnID) {
             $sheet->getColumnDimension($columnID)->setAutoSize(true);
         }
 
         // Set title sheet
         $sheet->setTitle('Data kategori');
         
         // Generate filename
         $filename = 'Data_Kategori_' . date('Y-m-d_H-i-s') . '.xlsx';
 
         // Set header untuk download file
         header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
         header('Content-Disposition: attachment;filename="' . $filename . '"');
         header('Cache-Control: max-age=0');
         header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
         header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
         header('Cache-Control: cache, must-revalidate');
         header('Pragma: public');
 
         $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
         $writer->save('php://output');
         exit;
    }
    public function export_pdf()
     {
         $kategori = KategoriModel::select('kategori_id','kategori_kode','kategori_nama')
             ->orderBy('kategori_id')
             ->get();
     
         // use Barryvdh\DomPDF\Facade\Pdf;
         $pdf = Pdf::loadView('kategori.export_pdf', ['kategori' => $kategori]);
         $pdf->setPaper('a4', 'portrait'); // set ukuran kertas dan orientasi
         $pdf->setOption("isRemoteEnabled", true); // set true jika ada gambar dari url
         $pdf->render();
     
         return $pdf->stream('Data Kategori '.date('Y-m-d H:i:s').'.pdf');
     }
}