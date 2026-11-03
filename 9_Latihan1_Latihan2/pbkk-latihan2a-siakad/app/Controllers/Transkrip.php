<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use Config\Database;

class Transkrip extends BaseController
{
    public function index()
    {
        $mahasiswaModel = new MahasiswaModel();

        $data = [
            'title' => 'Transkrip Nilai',
            'mahasiswa' => $mahasiswaModel->orderBy('nama', 'ASC')->findAll()
        ];

        return view('transkrip/index', $data);
    }

    private function konversiBobot($huruf)
    {
        $bobot = [
            'A' => 4.0,
            'AB' => 3.5,
            'B' => 3.0,
            'BC' => 2.5,
            'C' => 2.0,
            'D' => 1.0,
            'E' => 0.0
        ];

        return $bobot[$huruf] ?? 0;
    }

    public function show($id)
    {
        $mahasiswaModel = new MahasiswaModel();

        $mahasiswa = $mahasiswaModel->find($id);

        if (!$mahasiswa) {
            return redirect()->to('/transkrip')
                ->with('error', 'Mahasiswa tidak ditemukan!');
        }

        $db = Database::connect();

        $rows = $db->table('nilai')
            ->select('nilai.nilai_angka, nilai.nilai_huruf,
                      krs.tahun_akademik, krs.semester,
                      mata_kuliah.kode_mk, mata_kuliah.nama_mk,
                      mata_kuliah.sks')
            ->join('krs', 'krs.id = nilai.krs_id')
            ->join('mata_kuliah', 'mata_kuliah.id = krs.mata_kuliah_id')
            ->where('krs.mahasiswa_id', $id)
            ->get()
            ->getResultArray();

        $kelompok = [];

        $totalSks = 0;
        $totalBobot = 0;

        foreach ($rows as $row) {
            $key = $row['tahun_akademik'] . '|' . $row['semester'];

            if (!isset($kelompok[$key])) {
                $kelompok[$key] = [
                    'tahun_akademik' => $row['tahun_akademik'],
                    'semester' => $row['semester'],
                    'mata_kuliah' => [],
                    'total_sks' => 0,
                    'total_bobot' => 0,
                    'ips' => 0,
                    'ipk_kumulatif' => 0
                ];
            }

            $bobot = $this->konversiBobot($row['nilai_huruf']);
            $nilaiAkhir = $bobot * $row['sks'];

            $row['bobot'] = $bobot;
            $row['bobot_sks'] = $nilaiAkhir;

            $kelompok[$key]['mata_kuliah'][] = $row;
            $kelompok[$key]['total_sks'] += $row['sks'];
            $kelompok[$key]['total_bobot'] += $nilaiAkhir;

            $totalSks += $row['sks'];
            $totalBobot += $nilaiAkhir;
        }

        $transkrip = array_values($kelompok);

        // Urutkan berdasarkan tahun dan semester
        usort($transkrip, function ($a, $b) {
            $tahun = strcmp($a['tahun_akademik'], $b['tahun_akademik']);

            if ($tahun !== 0) {
                return $tahun;
            }

            $urutan = ['Ganjil' => 1, 'Genap' => 2];

            return $urutan[$a['semester']] <=> $urutan[$b['semester']];
        });

        // Hitung IPS dan IPK kumulatif
        $sksKumulatif = 0;
        $bobotKumulatif = 0;

        foreach ($transkrip as &$semester) {
            $semester['ips'] = $semester['total_sks'] > 0
                ? $semester['total_bobot'] / $semester['total_sks']
                : 0;

            $sksKumulatif += $semester['total_sks'];
            $bobotKumulatif += $semester['total_bobot'];

            $semester['ipk_kumulatif'] = $sksKumulatif > 0
                ? $bobotKumulatif / $sksKumulatif
                : 0;
        }

        unset($semester);

        $ipk = $totalSks > 0
            ? $totalBobot / $totalSks
            : 0;

        return view('transkrip/show', [
            'title' => 'Transkrip Nilai',
            'mahasiswa' => $mahasiswa,
            'transkrip' => $transkrip,
            'totalSks' => $totalSks,
            'ipk' => $ipk
        ]);
    }
}