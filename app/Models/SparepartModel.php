<?php namespace App\Models;

use CodeIgniter\Model;

class SparepartModel extends Model
{
    /**
     * table name
     */
    protected $table = "m_sparepart";

    /**
     * allowed Field
     */
    protected $allowedFields = [
        'name',
        'desc',
        'price'
    ];
}