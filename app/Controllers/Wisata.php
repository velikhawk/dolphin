<?php

namespace App\Controllers;

use \App\Models\WisataModel;

class Wisata extends BaseController
{
    protected $WisataModel;

    public function __construct()
    {
        $this->WisataModel =  new WisataModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Wisata',
            'wisata' => $this->WisataModel->getAllWisata()
        ];

        return view('wisata/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Wisata',
            'validation' => \Config\Services::validation()
        ];

        return view('wisata/tambah', $data);
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
            'jeniswisata' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Pilih File / Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar',
                ]
            ]
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('wisata/tambah')->withInput();
        }
        // ambil gambar
        $fileSampul = $this->request->getFile('gambar');

        // apakah tidak ada gambar yang di upload
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.jpg';
        } else {
            // generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();

            // pindahkan file ke folder img
            $fileSampul->move('img/wisata', $namaSampul);
        }
        // validasi data sukses
        $this->WisataModel->save([
            'nama' => $this->request->getVar('nama'),
            'jeniswisata' => $this->request->getVar('jeniswisata'),
            'gambar' => $namaSampul
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('/wisata');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data Wisata',
            'validation' => \Config\Services::validation(),
            'wisata' => $this->WisataModel->getWisataById($id),
        ];
        // jika id data tidak ada di table
        if (empty($data['wisata'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        };

        return view('wisata/edit', $data);
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
            'jeniswisata' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar',
                ]
            ]
        ])) {
            // jika data tidak valid kembalikan ke halaman tambah pegawai
            return redirect()->to('wisata/edit/' . $this->request->getVar('idwisata'))->withInput();
        }
        // ambil gambar
        $fileSampul = $this->request->getFile('gambar');

        // apakah tidak ada gambar yang di upload
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('gambarLama');
        } else {
            // generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();

            // pindahkan file ke folder img
            $fileSampul->move('img/wisata', $namaSampul);

            // hapus file lama
            if ($this->request->getVar('gambarLama') != 'default.jpg') {
                unlink('img/wisata/' . $this->request->getVar('gambarLama'));
            }
        }
        // validasi data sukses
        $this->WisataModel->save([
            'idwisata' => $id,
            'nama' => $this->request->getVar('nama'),
            'jeniswisata' => $this->request->getVar('jeniswisata'),
            'gambar' => $namaSampul
        ]);
        // menampilkan pesan sukses
        session()->setFlashdata('pesan', 'Data berhasil diedit!.');
        // kembali ke halaman index Pegawai
        return redirect()->to('/wisata');
    }

        
    public function delete($id)
    {
        $wisata = $this->WisataModel->find($id);

        // cek jika gambar default
        if ($wisata['gambar'] != 'default.jpg') {
            // hapus gambar
            unlink('img/wisata/' . $wisata['gambar']);
        }

        $this->WisataModel->delete($id);
        // menampilkan pesan data sukses dihapus
        session()->setFlashdata('pesan', 'Data berhasil dihapus!..');
        // kembali ke halaman index mahasiswa
        return redirect()->to('wisata');
    }
}
