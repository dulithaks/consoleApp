<?php

namespace App\Model;

class TicketModel extends Model
{
    protected $keyList = ["_id", "url", "external_id", "created_at", "type", "subject", "description", "priority", "status",
        "submitter_id", "assignee_id", "organization_id", "tags", "has_incidents", "due_at", "via"];


    public function __construct()
    {
        $this->getDataFromFile('tickets.json');
    }


}