<?php


use App\Repository\TicketRepository;
use PHPUnit\Framework\TestCase;

class TicketRepositoryTest extends TestCase
{
    private $ticketRepo;

    protected function setUp(): void
    {
        $this->ticketRepo = new TicketRepository();
    }

    public function testGetTicketInformation()
    {
        $result = $this->ticketRepo->getTicketInformation('_id', '436bf9b0-1147-4c0a-8439-6f79833bff5b');
        $this->assertIsArray($result);
    }
}
