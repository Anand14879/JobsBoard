<?php

namespace App\Models\Job;

use App\Models\User;
use App\Models\Job\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;
    protected $table = 'applications';
    protected $fillable = [
        'id',
        'cv',
        'user_id',
        'image',
        'job_title',
        'job_region',
        'company',
        'job_type',
        'job_id'
       
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function job()
    {
        return $this->belongsTo(Job::class,'job_id','id');
    }

}