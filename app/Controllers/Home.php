<?php

namespace App\Controllers;
use \App\Models\KasModel;

class Home extends BaseController
{
    protected $kasModel, $db;
    public function __construct()
    {
        $this->kasModel = new KasModel();
        $this->db = \Config\Database::connect();
    }
    
    public function index()
    {
        // cari total semua pemasukan 
        $sqlPemasukan = $this->db->query("SELECT SUM(pemasukan) as pemasukan FROM kas");
        $result = $sqlPemasukan->getResultArray();
        $result = $result[0];
        $pemasukan = $result['pemasukan'];

        // cari total semua pengeluaran
        $sqlPengeluaran = $this->db->query("SELECT SUM(pengeluaran) as pengeluaran FROM kas");
        $result = $sqlPengeluaran->getResultArray();
        $result = $result[0];
        $pengeluaran = $result['pengeluaran'];
        if(empty($pengeluaran)){
            $pengeluaran = 0;
        }

        // pemasukan baru 
        $newPemasukan = $pemasukan - $pengeluaran;
        
        $kas = $this->kasModel->findAll();
        $data = [
            'title' => 'Aplikasi Kelola Keuangan',
            'kas' => $kas,
            'validasi' => \Config\Services::validation(),
            'pemasukan' => $newPemasukan,
            'pengeluaran' => $pengeluaran
        ];
        
        return view('dashboard/index', $data);
    }

    public function savelaporan()
    {
        // validasi
        if (!$this->validate([
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal wajib diisi'
                ]
            ],
            'pemasukan' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'pemasukan wajib diisi',
                    'numeric' => 'pemasukan harus berisi angka'
                ]
            ],
            'pengeluaran' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'pengeluaran wajib diisi',
                    'numeric' => 'pengeluaran harus berisi angka'
                ]
            ],
            'keterangan' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'tanggal wajib diisi',
                    'alpha_space' => 'keterangan harus berisi huruf semua'
                ]
            ],
        ])) {
            session()->setFlashdata('laporangagal', 'laporan harus diisi dengan baik dan benar');
            return redirect()->to('/');
        }

        // simpan data ke database
        $this->kasModel->save([
            'tanggal' => $this->request->getVar('tanggal'),
            'pemasukan' => $this->request->getVar('pemasukan'),
            'pengeluaran' => $this->request->getVar('pengeluaran'),
            'keterangan' => $this->request->getVar('keterangan'),
        ]);

        session()->setFlashdata('laporanberhasil', 'laporan baru berhasil ditambahkan');
        return redirect()->to('/');
    }

    public function hapuslaporan($id)
    {
        $this->kasModel->delete($id);
        session()->setFlashdata('laporandihapus', 'laporan berhasil dihapus');
        return redirect()->to('/');
    }
}