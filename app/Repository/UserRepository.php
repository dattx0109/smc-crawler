<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 7/10/19
 * Time: 2:09 PM
 */

namespace App\Repository;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    public function findUserByEmailAndPassword($email)
    {
        return DB::table('users')
            ->where('email', $email)
            ->first()
        ;
    }
}
