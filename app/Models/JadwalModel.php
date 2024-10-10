<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $builder;
    protected $table = 'jadwal';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_absen', 'shift', 'date', 'status'];
    protected $useTimestamps = true;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('jadwal');
    }

    public function getPegawaiJadwal()
    {
        // Join the jadwal table with the pegawai table
        $pegawai = $this->db->table('pegawai')->get()->getResultArray();
        return $pegawai;
    }

    public function getAllJadwal()
    {
        // Query to retrieve all data from the jadwal table
        $query = $this->db->table('jadwal')->get();

        // Return the result as an array
        return $query->getResultArray();
    }

    public function getUnit()
    {
        $query = $this->db->table('unit')->get();
        return $query->getResultArray();
    }



    public function getDataPegawai($id = false, $filter = false, $print = false, $perPage = 10)
    {
        // TO DO: implement the logic for this method
    }
}
