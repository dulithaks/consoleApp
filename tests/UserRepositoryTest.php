<?php

use App\Model\UserModel;
use App\Repository\UserRepository;

class UserRepositoryTest extends \PHPUnit\Framework\TestCase
{
    private $userRepo;

    protected function setUp(): void
    {
        $this->userRepo = new UserRepository();
    }

    public function testGetUserInformation()
    {

        $result = $this->userRepo->getUserInformation('_id', 1);
        $this->assertIsArray($result);
    }

    public function testGetOrganizationName()
    {
        $userModel = $this->createMock(UserModel::class);
        $userModel->expects($this->once())
            ->method('getUserNameById')
            ->with($this->equalTo('1'))
            ->willReturn(['organization_id' => 1]);
        $user = $userModel->getUserNameById(1);

        $result = $this->userRepo->getOrganizationName($user);
        $this->assertIsString($result);
    }
}
