<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;

class Laporan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Laporan Transaksi Pengunjung'
        ];
        //
        return view('laporan/index', $data);
    }

    public function cetakPengunjungPeriode()
    {
        $tglawal = $this->request->getVar('tglawal');
        $tglakhir = $this->request->getVar('tglakhir');

        $TransaksiModel = new TransaksiModel();
        $dataLaporan = $TransaksiModel->laporanPerPeriode($tglawal, $tglakhir);
        $laporan = $dataLaporan->getResultArray();

        $data = [
            'title' => 'Laporan Pengunjung',
            'datalaporan' => $dataLaporan,
            'laporan' => $laporan,
            'tglawal' => $tglawal,
            'tglakhir' => $tglakhir
        ];
        //
        return view('laporan/cetakLaporanPengunjung', $data);
    }
}
