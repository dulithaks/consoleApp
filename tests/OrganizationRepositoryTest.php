<?php


use App\Repository\OrganizationRepository;
use PHPUnit\Framework\TestCase;

class OrganizationRepositoryTest extends TestCase
{
    protected function setUp(): void
    {
        $this->organizationRepo = new OrganizationRepository();
    }
    public function testGetOrganizationInformation()
    {
        $result = $this->organizationRepo->getOrganizationInformation('_id', 119);
        $this->assertIsArray($result);
    }
}
