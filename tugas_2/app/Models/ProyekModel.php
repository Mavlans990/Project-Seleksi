<?php namespace App\Models;

use CodeIgniter\Model;

class ProyekModel extends Model
{
    protected $table = 'proyek';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nama_proyek', 'client', 'tgl_mulai', 'tgl_selesai', 
        'pimpinan_proyek', 'keterangan', 'created_at'
    ];

    protected $useTimestamps = false;
}
