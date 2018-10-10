<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 2018/10/6
 * Time: 11:03
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class UserVote extends Model
{
    protected $guarded = [];
    public $incrementing = false;
    protected $keyType = 'string';
}