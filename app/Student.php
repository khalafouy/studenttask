<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected  $table = 'students';
    public $timestamps = true;
    public $primaryKey = 'file_no';
    public $casts = ['file_no'=>'string'];
    public $keyType = 'string';
    public $incrementing = 'false';
    public $appends = ['status_message'];

    public function getStatusMessageAttribute() {
        $statusMessage = 0 ;
        if($this->status == 0)
        {
            $statusMessage = 'in-active';
        }
        if($this->status == 1)
        {
            $statusMessage = 'active';
        }
        return $statusMessage;
    }
}
