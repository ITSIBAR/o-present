<?php

namespace App\Controllers;

use DateTime;
use App\Models\UsersModel;
use App\Models\JadwalModel;
use App\Models\PegawaiModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Jadwal extends BaseController
{
    protected $usersModel;
    protected $jadwalModel;
    protected $pegawaiModel;


    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->jadwalModel = new JadwalModel();
        $this->pegawaiModel = new PegawaiModel();
        $this->request = \Config\Services::input();
    }
    public function index()
    {
        $user_profile = $this->usersModel->getUserInfo(user_id());
        $NamaPegawai = $this->jadwalModel->getPegawaiJadwal();
        $bulan = $this->request->getVar('bulan');
        $tahun = $this->request->getVar('tahun');
        $unit = $this->jadwalModel->getUnit();
        // var_dump($user_profile);
        // die;

        $filter = [
            'bulan' => $this->request->getGet('bulan'),
            'tahun' => $this->request->getGet('tahun'),
            'unit' => $this->request->getGet('unit'),
        ];

        $data = [
            'title' => 'Jadwal Shift',
            'user_profile' => $user_profile,
            'nama' => $NamaPegawai,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'unit' => $unit,
        ];

        return view('jadwal/index', $data);
    }
}
