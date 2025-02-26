<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory; // ✅ تأكد من تضمين هذه السطر

    protected $table = 'tasks';
    protected $fillable = ['title', 'status', 'user_id'];
    public $timestamps = true;


    public function user(){
        return $this->belongsTo(User::class);
    }


}
