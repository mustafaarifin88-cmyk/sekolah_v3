<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SiswaModel;
use App\Models\KelasModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as ReaderXlsx;

class Siswa extends BaseController
{
    protected $siswaModel;
    protected $kelasModel;

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
        $this->kelasModel = new KelasModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Siswa',
            'siswa' => $this->siswaModel->getSiswaWithKelas()
        ];
        return view('admin/siswa/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Siswa',
            'kelas' => $this->kelasModel->findAll()
        ];
        return view('admin/siswa/create', $data);
    }

    public function store()
    {
        $this->siswaModel->insert([
            'nisn'          => $this->request->getPost('nisn'),
            'nama_lengkap'  => $this->request->getPost('nama_lengkap'),
            'kelas_id'      => $this->request->getPost('kelas_id'),
            'alamat'        => $this->request->getPost('alamat'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'agama'         => $this->request->getPost('agama')
        ]);
        return redirect()->to('/admin/siswa')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Siswa',
            'siswa' => $this->siswaModel->find($id),
            'kelas' => $this->kelasModel->findAll()
        ];
        return view('admin/siswa/edit', $data);
    }

    public function update($id)
    {
        $this->siswaModel->update($id, [
            'nisn'          => $this->request->getPost('nisn'),
            'nama_lengkap'  => $this->request->getPost('nama_lengkap'),
            'kelas_id'      => $this->request->getPost('kelas_id'),
            'alamat'        => $this->request->getPost('alamat'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'agama'         => $this->request->getPost('agama')
        ]);
        return redirect()->to('/admin/siswa')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->siswaModel->delete($id);
        return redirect()->to('/admin/siswa')->with('success', 'Data siswa berhasil dihapus.');
    }

    public function import()
    {
        $data = ['title' => 'Import Data Siswa'];
        return view('admin/siswa/import', $data);
    }

    public function download_template()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'NISN');
        $sheet->setCellValue('B1', 'NAMA LENGKAP');
        $sheet->setCellValue('C1', 'ID KELAS');
        $sheet->setCellValue('D1', 'ALAMAT');
        $sheet->setCellValue('E1', 'JENIS KELAMIN (L/P)');
        $sheet->setCellValue('F1', 'AGAMA');

        $kelas = $this->kelasModel->findAll();
        $row = 1;
        $sheet->setCellValue('H1', 'DAFTAR ID KELAS SEBAGAI REFERENSI:');
        foreach ($kelas as $k) {
            $row++;
            $sheet->setCellValue('H' . $row, $k['id'] . ' = ' . $k['nama_kelas']);
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Template_Import_Siswa.xlsx';
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output');
        exit;
    }

    public function process_import()
    {
        $file = $this->request->getFile('file_excel');
        
        if ($file && $file->isValid()) {
            $reader = new ReaderXlsx();
            $spreadsheet = $reader->load($file->getTempName());
            $sheetData = $spreadsheet->getActiveSheet()->toArray();

            $insertedCount = 0;

            foreach ($sheetData as $key => $row) {
                if ($key == 0) continue; 
                if (empty($row[0]) || empty($row[1])) continue;

                $this->siswaModel->insert([
                    'nisn'          => $row[0],
                    'nama_lengkap'  => $row[1],
                    'kelas_id'      => $row[2],
                    'alamat'        => $row[3],
                    'jenis_kelamin' => strtoupper($row[4]),
                    'agama'         => $row[5]
                ]);
                $insertedCount++;
            }

            return redirect()->to('/admin/siswa')->with('success', "$insertedCount data siswa berhasil diimport.");
        }

        return redirect()->back()->with('error', 'Gagal mengunggah file Excel.');
    }
}