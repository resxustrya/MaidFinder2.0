<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 9/21/2016
 * Time: 1:57 AM
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class AppRatings extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'app_rating';
    protected $primaryKey = 'id';
    protected $date = ['deleted_at'];
}