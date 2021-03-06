<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';
    public $primaryKey = 'job_id';
    public $timestamps = true;
    
    public function user(){
        return $this->belongsTo('App\User');
    }

}
