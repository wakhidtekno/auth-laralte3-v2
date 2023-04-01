<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Instansi extends Model
{
    use LogsActivity;

    protected $table = 'instansi';

    protected $fillable = ['nama','alamat'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->useLogName('instansi')->logFillable('true')->logOnlyDirty('true');

    }
}
