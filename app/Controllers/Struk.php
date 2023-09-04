<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;

class Struk extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Struk'
        ];
        //
        return view('struk/index', $data);
    }

    public function cetakPengunjungPeriode()
    {
        $idpengunjung = $this->request->getVar('idpengunjung');

        $TransaksiModel = new TransaksiModel();
        $dataLaporan = $TransaksiModel->laporanPerPeriode($idpengunjung);
        $laporan = $dataLaporan->getResultArray();

        $data = [
            'title' => 'Struk',
            'datalaporan' => $dataLaporan,
            'laporan' => $laporan,
            'idpengunjung' => $idpengunjung,
        ];
        //
        return view('laporan/cetakLaporanPengunjung', $data);
    }
}
