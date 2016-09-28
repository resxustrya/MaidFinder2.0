<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 9/27/2016
 * Time: 4:20 PM
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class ExpDuties extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'exp_duty';
    protected $primaryKey = 'id';
    protected $date  = ['deleted_at'];
}