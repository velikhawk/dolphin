<?php
namespace App\Controllers;

use \App\Models\TransaksiModel;
use \App\Models\PengunjungModel;
use \App\Models\TiketModel;

class Transaksi extends BaseController
{
    protected $TransaksiModel;
    protected $PengunjungModel;
    protected $TiketModel;
    

    public function __construct()
    {
        $this->TransaksiModel =  new TransaksiModel();
        $this->PengunjungModel =  new PengunjungModel();

        $this->TiketModel =  new TiketModel();

    }

    public function index()
    {
        $data = [
            'title' => 'Transaksi',
            'transaksi' => $this->TransaksiModel->getAllTransaksi()
        ];

        return view('transaksi/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Transaksi',
            'transaksi'=>$this->TransaksiModel->getAllTransaksi(),
            'pengunjung' => $this->PengunjungModel->getPengunjungById(),
            'tiket' => $this->TiketModel->getTiketById(),
            'validation' => \Config\Services::validation()
        ];

        return view('transaksi/tambah', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'idpengunjung' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'idtiket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ]
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('transaksi/tambah')->withInput();
        }
        
        // validasi data sukses
        $this->TransaksiModel->save([
            'idpengunjung' => $this->request->getVar('idpengunjung'),
            'idtiket' => $this->request->getVar('idtiket'),           
            'tanggal' => $this->request->getVar('tanggal'),
            'harga' => $this->request->getVar('harga'),
            'jumlah' => $this->request->getVar('jumlah'),
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('/transaksi');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data transaksi',
            'validation' => \Config\Services::validation(),
            'transaksi' => $this->TransaksiModel->getTransaksiById($id),
            'pengunjung' => $this->PengunjungModel->getPengunjungById(),
            'tiket' => $this->TiketModel->getTiketById(),
           
        ];
        // jika id data tidak ada di table
        if (empty($data['transaksi'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id. ' tidak ditemukan');
        };

        return view('transaksi/edit', $data);
    }

    public function update($id)
    {

        if (!$this->validate([
            'idpengunjung' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'idtiket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ]
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('transaksi/edit/' . $this->request->getVar('id'))->withInput();
        }
        
        
        // validasi data sukses
        $this->TransaksiModel->save([
            'id' => $id,
            'idpengunjung' => $this->request->getVar('idpengunjung'),
            'idtiket' => $this->request->getVar('idtiket'),
            'tanggal' => $this->request->getVar('tanggal'),
            
            'harga' => $this->request->getVar('harga'),
            'jumlah' => $this->request->getVar('jumlah'),
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil diedit!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('/transaksi');
    }

    public function delete($id)
    {
        $checkin = $this->TransaksiModel->find($id);

       
        

        $this->TransaksiModel->delete($id);
        // menampilkan pesan data sukses dihapus
        session()->setFlashdata('pesan', 'Data berhasil dihapus!..');
        // kembali ke halaman index mahasiswa
        return redirect()->to('transaksi');
    }
}