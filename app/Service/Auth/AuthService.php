<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 7/10/19
 * Time: 2:17 PM
 */

namespace App\Service\Auth;

use App\Repository\UserRepository;

class AuthService
{

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login($rawData)
    {
        return $this->userRepository->findUserByEmailAndPassword($rawData['email']);
    }
}
