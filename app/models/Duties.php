<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 9/26/2016
 * Time: 10:06 PM
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Duties extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'duty';
    protected $primaryKey = 'duties';
    protected $date = ['deleted_at'];
}