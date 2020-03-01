<?php


namespace App\Repository;


class OrganizationRepository extends AbstractRepository
{
    /**
     * Get organization information
     *
     * @param $key
     * @param $value
     * @return array
     * @throws \App\Exception\InvalidSearchKeyException
     */
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

    /**
     * Get tickets with user name
     *
     * @param $organization
     * @return array
     * @throws \App\Exception\InvalidSearchKeyException
     */
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