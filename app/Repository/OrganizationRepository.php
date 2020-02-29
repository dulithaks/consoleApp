<?php


namespace App\Repository;


class OrganizationRepository extends AbstractRepository
{
    public function getOrganizationInformation($key, $value)
    {
        $organizations = $this->organization->findByKeyValue($key, $value);

        $data = [];
        foreach ($organizations as $organization) {
            $tickets = $this->getTicketsWithUserName($organization);
            $data[] = $tickets;
        }

        return $data;
    }


    private function getTicketsWithUserName($organization) {
        $tickets = $this->ticket->findByKeyValue('organization_id', $organization['_id']);

        $data = [];
        foreach ($tickets as $ticket) {
            $ticket['userName'] = $this->user->getUserNameById($ticket['submitter_id']);
            $data[] = $ticket;
        }

        return $data;
    }

}