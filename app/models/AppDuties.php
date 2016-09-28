<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 9/28/2016
 * Time: 2:13 PM
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class AppDuties extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'appduty';
    protected $primaryKey = 'id';
    protected $date = ['deleted_at'];
}