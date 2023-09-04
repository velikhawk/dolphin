<?php

namespace App\Models;

use CodeIgniter\Model;

class PengunjungModel extends Model
{

    protected $table            = 'tbl_pengunjung';
    protected $allowedFields    = ['nama', 'alamat', 'telp', 'idwisata'];
    protected $primaryKey = 'idpengunjung';


    public function getAllPengunjung()
    {
        return $this->db->table('tbl_pengunjung')->get()->getResultArray();
    }
    public function getPengunjungById($idpengunjung = false)
    {
        if ($idpengunjung == false) {
            return $this->findAll();
        }

        return $this->where(['idpengunjung' => $idpengunjung])->first();
    }
}
