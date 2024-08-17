<?php namespace App\Models;

use CodeIgniter\Model;

class ProyekLokasiModel extends Model
{
    protected $table = 'proyek_lokasi';
    protected $primaryKey = 'id';

    protected $allowedFields = ['proyek_id', 'lokasi_id'];
    protected $useTimestamps = false;
}
