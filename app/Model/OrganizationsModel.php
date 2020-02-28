<?php

namespace App\Model;

class OrganizationsModel extends Model
{
    protected $keyList = ["_id", "url", "external_id", "name", "domain_names", "created_at", "details", "shared_tickets", "tags"];


    public function __construct()
    {
        $this->getDataFromFile('users.json');
    }


}