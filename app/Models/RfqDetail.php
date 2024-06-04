<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RfqDetail extends Model
{
    use HasFactory;
    protected $table = 'rfq_detail';
    protected $primarykey = 'id';
    protected $fillable = ['description_job', 'qty', 'price', 'total','description','rfq_id'];

    public function data()
    {
        return $this->belongsTo(Rfq::class, 'rfq_id', 'id');
    }
}


