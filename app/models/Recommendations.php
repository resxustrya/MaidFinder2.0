<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 9/17/2016
 * Time: 6:38 PM
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Recommendations extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'recomend';
    protected $primaryKey = 'id';
    protected $date = ['deleted_at'];
}