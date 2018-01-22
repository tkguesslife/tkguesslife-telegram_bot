<?php


namespace App\Repository;


use App\User;

/**
 * Class UserRepository
 * @package App\Repository
 * @author Tiko Banyini
 */
class UserRepository
{

    /**
     * @param $id
     * @return \Illuminate\Support\Collection
     */
    public static function findUserById($id)
    {

        return $user = User::find($id)->get();

    }
}