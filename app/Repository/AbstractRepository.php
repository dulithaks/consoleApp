<?php


namespace App\Repository;


use App\Model\OrganizationsModel;
use App\Model\TicketModel;
use App\Model\UserModel;

class AbstractRepository
{
    public function __construct()
    {
        $this->user = new UserModel();
        $this->ticket = new TicketModel();
        $this->organization = new OrganizationsModel();
    }


}