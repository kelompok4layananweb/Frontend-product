<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rfq extends Model
{
    use HasFactory;
    protected $table = 'rfq';
    protected $primarykey = 'id';
    protected $fillable = ['date', 'number_cr', 'number_wo', 'job', 'offer_number','include_tax','total_price','responsible','company','name_hod','agreement_type'];

    protected $appends = ['pdf_url'];
    public function getPdfUrlAttribute()
    {
        return asset('storage/' . $this->pdf);
    }
    public function dataDetail()
    {
        return $this->hasMany(RfqDetail::class, 'rfq_id', 'id');
    }
}
