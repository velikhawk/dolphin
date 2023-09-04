<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{

    protected $table            = 'tbl_transaksi';
    protected $allowedFields    = ['idpengunjung','idtiket', 'tanggal', 'harga', 'jumlah'];
    protected $primaryKey = 'id';


    public function getAllTransaksi()
    {
        return $this->db->table('tbl_transaksi')->get()->getResultArray();
    }
    public function getTransaksiById($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
    public function laporanPerPeriode($tglawal, $tglakhir)
    {
        return $this->table('tbl_transaksi')
            ->join('tbl_pengunjung', 'tbl_pengunjung.idpengunjung = tbl_transaksi.idpengunjung')
            ->join('tbl_tiket', 'tbl_tiket.idtiket = tbl_transaksi.idtiket')
            ->where('tanggal >=', $tglawal)
            ->where('tanggal <=', $tglakhir)
            ->get();
    }
  
    }
    


