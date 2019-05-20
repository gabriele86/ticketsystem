<?php


namespace App\Services;


use App\Entity\User;
use App\Repository\UserRepository;
use FOS\UserBundle\Model\UserManagerInterface;

final class UserService
{
    private $userRepository;
    private $userManager;

    /**
     * UserService constructor.
     * @param UserRepository $userRepository
     * @param UserManagerInterface $userManager
     */
    public function __construct(UserRepository $userRepository, UserManagerInterface $userManager)
    {
        $this->userRepository = $userRepository;
        $this->userManager = $userManager;
    }

    /**
     *
     * @param User $user
     */
    public function saveOrUpdate(User $user):  void {

        $this->userManager->updateUser($user, true);
    }
}