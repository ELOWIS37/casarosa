<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soci extends Model
{
    use HasFactory;

    protected $table = 'socis'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'Codi'; // Nombre de la clave primaria

    protected $fillable = [
        'Codi',
        'Cognoms',
        'Nom',
        'DNI',
        'Poblacio',
        'CodiPostal',
        'Adreca',
        'Telefon',
        'IBAN',
        'MetodeDePagament',
    ];

    // Opcional: Si no utilizas timestamps (created_at, updated_at) en tu tabla
    public $timestamps = true;
}
