<?php


namespace App\Repository;


class TicketRepository extends AbstractRepository
{
    public function getTicketInformation($key, $value)
    {
        $tickets = $this->ticket->findByKeyValue($key, $value);

        $data = [];
        foreach ($tickets as $ticket) {
            $ticket['submitterUserName'] = $this->user->getUserNameById($ticket['submitter_id']);
            $ticket['assigneeUserName'] = $this->user->getUserNameById($ticket['assignee_id']);
            $ticket['organizationName'] = $this->organization->getOrganizationNameById($ticket['organization_id']);
            $data[] = $ticket;
        }

        return $data;
    }


}