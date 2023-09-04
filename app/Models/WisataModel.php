<?php

namespace App\Models;

use CodeIgniter\Model;

class WisataModel extends Model
{

    protected $table            = 'tbl_wisata';
    protected $allowedFields    = ['nama','jeniswisata', 'gambar'];
    protected $primaryKey = 'idwisata';


    public function getAllWisata()
    {
        return $this->db->table('tbl_wisata')->get()->getResultArray();
    }
    public function getWisataById($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['idwisata' => $id])->first();
    }
}
