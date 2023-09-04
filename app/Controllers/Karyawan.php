<?php

namespace App\Controllers;

use \App\Models\KaryawanModel;

class Karyawan extends BaseController
{
    protected $KaryawanModel;

    public function __construct()
    {
        $this->KaryawanModel =  new KaryawanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Karyawan',
            'karyawan' => $this->KaryawanModel->getAllKaryawan()
        ];

        return view('karyawan/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Karyawan',
            'validation' => \Config\Services::validation()
        ];

        return view('karyawan/tambah', $data);
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
            'jeniskelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'valid_email' => 'format {field} salah'
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
            return redirect()->to('karyawan/tambah')->withInput();
        }
       
        // validasi data sukses
        $this->KaryawanModel->save([
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'jeniskelamin' => $this->request->getVar('jeniskelamin'),
            'email' => $this->request->getVar('email'),
            'telp' => $this->request->getVar('telp'),
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('/karyawan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data Karyawan',
            'validation' => \Config\Services::validation(),
            'karyawan' => $this->KaryawanModel->getKaryawanById($id),
        ];
        // jika id data tidak ada di table
        if (empty($data['karyawan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        };

        return view('karyawan/edit', $data);
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
            'jeniskelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'valid_email' => 'format {field} salah'
                ]
            ],
            'telp' => [
                'rules' => 'required',
                'errors' => [

                ]
            ]
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('karyawan/edit/' . $this->request->getVar('idkaryawan'))->withInput();
        }
       
        // validasi data sukses
        $this->KaryawanModel->save([
            'idkaryawan' => $id,
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'jeniskelamin' => $this->request->getVar('jeniskelamin'),
            'email' => $this->request->getVar('email'),
            'telp' => $this->request->getVar('telp'),
           
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil diedit!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('/karyawan');
    }

    public function delete($id)
    {
        $karyawan = $this->KaryawanModel->find($id);

        

        $this->KaryawanModel->delete($id);
        // menampilkan pesan data sukses dihapus
        session()->setFlashdata('pesan', 'Data berhasil dihapus!..');
        // kembali ke halaman index mahasiswa
        return redirect()->to('karyawan');
    }
}
