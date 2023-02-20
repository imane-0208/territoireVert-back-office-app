<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class region extends Model
{
    use HasFactory;
    protected $table = 'regions';
    protected $primaryKey = 'id';
    protected $fillable = ['regionName'];

    public function partenaires()
    {
        return $this->belongsToMany(Partenaire::class);
    }
}
