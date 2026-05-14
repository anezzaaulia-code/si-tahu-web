<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    protected $table = 'produksi';
    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'string';

    const CREATED_AT = 'dibuatPada';
    const UPDATED_AT = 'diperbaruiPada';

    protected $guarded = [];
}
