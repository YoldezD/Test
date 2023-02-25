<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Groupe
 * @package App\Models
 * @version February 25, 2023, 1:38 pm UTC
 *
 * @property bigIncrements $id
 * @property string $nom
 * @property string $created_at
 * @property string $updated_at
 */
class Groupe extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'groupes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'nom',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nom' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required',
        'nom' => 'required',
        'created_at' => 'required',
        'updated_at' => 'required'
    ];

    
}
