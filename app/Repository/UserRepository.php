<?php


namespace App\Repository;


class UserRepository extends AbstractRepository
{

    public function getUserInformation($key, $value)
    {
        $users = $this->user->findByKeyValue($key, $value);

        $data = [];
        foreach ($users as $user) {
            $user['assigneeTicketSubjects'] = $this->getAssigneeTicketSubject('assignee_id', $user);
            $user['submittedTicketSubjects'] = $this->getAssigneeTicketSubject('submitter_id', $user);
            $user['organizationName'] = $this->getOrganizationName($user);
            $data[] = $user;
        }

        return $data;
    }

    /**
     * Get ticket subject
     *
     * @param $key
     * @param $user
     * @return array
     * @throws \App\Exception\InvalidSearchKeyException
     */
    private function getAssigneeTicketSubject($key, $user)
    {
        $tickets = $this->ticket->findByKeyValue($key, $user['_id']);

        $data = [];
        if (!empty($tickets)) {
            $data = array_column($tickets, 'subject');
        }

        return $data;
    }

    /**
     * Get organization name
     *
     * @param $user
     * @return string
     * @throws \App\Exception\InvalidSearchKeyException
     */
    public function getOrganizationName($user){
        $organization = $this->organization->findByKeyValue('_id', $user['organization_id']);
        if(empty($organization)){
            return '';
        }
        else {
            return $organization[0]['name'];
        }
    }

}