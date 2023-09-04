<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{

    protected $table            = 'tbl_karyawan';
    protected $allowedFields    = ['nama', 'alamat','jeniskelamin', 'email', 'telp'];
    protected $primaryKey = 'idkaryawan';


    public function getAllKaryawan()
    {
        return $this->db->table('tbl_karyawan')->get()->getResultArray();
    }
    public function getKaryawanById($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['idkaryawan' => $id])->first();
    }
}
