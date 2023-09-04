<?php

namespace App\Models;

use CodeIgniter\Model;

class TiketModel extends Model
{

    protected $table            = 'tbl_tiket';
    protected $allowedFields    = ['idwisata', 'jenistiket', 'harga'];
    protected $primaryKey = 'idtiket';


    public function getAllTiket()
    {
        return $this->db->table('tbl_tiket')->get()->getResultArray();
    }
    public function getTiketById($idtiket = false)
    {
        if ($idtiket == false) {
            return $this->findAll();
        }

        return $this->where(['idtiket' => $idtiket])->first();
    }
}
