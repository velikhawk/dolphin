<?php
namespace App\Controllers;

use \App\Models\TiketModel;
use \App\Models\WisataModel;

class Tiket extends BaseController
{
    protected $TiketModel;
    protected $WisataModel;

    public function __construct()
    {
        $this->TiketModel =  new TiketModel();
        $this->WisataModel =  new WisataModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Tiket',
            'tiket' => $this->TiketModel->getAllTiket()
        ];

        return view('tiket/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Tiket',
            'tiket' => $this->TiketModel->getTiketById(),
            'wisata'=>$this->WisataModel->getAllWisata(),
            'validation' => \Config\Services::validation()
        ];

        return view('tiket/tambah', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'idwisata' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jenistiket' => [
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
            ]
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('tiket/tambah')->withInput();
        }
        
        
        // validasi data sukses
        $this->TiketModel->save([
            'idwisata' => $this->request->getVar('idwisata'),
            'jenistiket' => $this->request->getVar('jenistiket'),
            'harga' => $this->request->getVar('harga'),
          
           
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('/tiket');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data Tiket',
            'validation' => \Config\Services::validation(),
            'tiket' => $this->TiketModel->getTiketById($id),
            'wisata' => $this->WisataModel->getWisataById(),
        ];
        // jika id data tidak ada di table
        if (empty($data['tiket'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id. ' tidak ditemukan');
        };

        return view('tiket/edit', $data);
    }

    public function update($id)
    {

        if (!$this->validate([
            'idwisata' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jenistiket' => [
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
            ]
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('tiket/edit/' . $this->request->getVar('idwisata'))->withInput();
       
        }
        // validasi data sukses
        $this->TiketModel->save([
            'idtiket' => $id,
            'idwisata' => $this->request->getVar('idwisata'),
            'jenistiket' => $this->request->getVar('jenistiket'),
            'harga' => $this->request->getVar('harga'),
            
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil diedit!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('/tiket');
    }

    public function delete($id)
    {
        $tiket = $this->TiketModel->find($id);



        $this->TiketModel->delete($id);
        // menampilkan pesan data sukses dihapus
        session()->setFlashdata('pesan', 'Data berhasil dihapus!..');
        // kembali ke halaman index mahasiswa
        return redirect()->to('tiket');
    }
}