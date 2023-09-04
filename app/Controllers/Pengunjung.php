<?php
namespace App\Controllers;

use \App\Models\PengunjungModel;


class Pengunjung extends BaseController
{
    protected $PengunjungModel;
 

    public function __construct()
    {
        $this->PengunjungModel =  new PengunjungModel();
     
    }

    public function index()
    {
        $data = [
            'title' => 'Pengunjung',
            'pengunjung' => $this->PengunjungModel->getAllPengunjung()
        ];

        return view('pengunjung/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Pengunjung',
            'pengunjung' => $this->PengunjungModel->getPengunjungById(),
           
            'validation' => \Config\Services::validation()
        ];

        return view('pengunjung/tambah', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ]
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('pengunjung/tambah')->withInput();
        }
        
        
        // validasi data sukses
        $this->PengunjungModel->save([
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'telp' => $this->request->getVar('telp'),
         
           
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('/pengunjung');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data Pengunjung',
            'validation' => \Config\Services::validation(),
            'pengunjung' => $this->PengunjungModel->getPengunjungById($id),
            
        ];
        // jika id data tidak ada di table
        if (empty($data['pengunjung'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id. ' tidak ditemukan');
        };

        return view('pengunjung/edit', $data);
    }

    public function update($id)
    {

        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ]
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('pengunjung/edit/' . $this->request->getVar('idpengunjung'))->withInput();
       
        }
        // validasi data sukses
        $this->PengunjungModel->save([
            'idpengunjung' => $id,
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'telp' => $this->request->getVar('telp'),
            

        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil diedit!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('/pengunjung');
    }

    public function delete($id)
    {
        $pengunjung = $this->PengunjungModel->find($id);



        $this->PengunjungModel->delete($id);
        // menampilkan pesan data sukses dihapus
        session()->setFlashdata('pesan', 'Data berhasil dihapus!..');
        // kembali ke halaman index mahasiswa
        return redirect()->to('pengunjung');
    }
}