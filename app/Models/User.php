<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class User
 * @package App\Models
 * @version February 25, 2023, 1:44 pm UTC
 *
 * @property bigIncrements $id
 * @property string $email
 * @property string $nom
 * @property string $prénom
 * @property integer $actif
 * @property string $date_création
 * @property string $created_at
 * @property string $updated_at
 */
class User extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'users_test';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'email',
        'nom',
        'prénom',
        'actif',
        'date_création',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'email' => 'string',
        'nom' => 'string',
        'prénom' => 'string',
        'actif' => 'integer',
        'date_création' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
