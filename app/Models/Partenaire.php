<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
    use HasFactory;
    protected $table = 'partenaires';
    protected $primaryKey = 'id';
    protected $fillable = ['nom','email','tele','site','description','img_path','confirmed'];


    public function categories()
    {
        // return $this->belongsToMany(Categorie::class);
        return $this->belongsToMany(Categorie::class, 'partenaire_categorie', 'partenaire_id', 'categorie_id');
    }

    public function regions()
    {
        return $this->belongsToMany(Region::class, 'partenaire_region', 'partenaire_id', 'region_id');
    }
}
