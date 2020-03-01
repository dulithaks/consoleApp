<?php

namespace App\Model;

class OrganizationsModel extends Model
{
    protected $keyList = ["_id", "url", "external_id", "name", "domain_names", "created_at", "details", "shared_tickets", "tags"];


    public function __construct()
    {
        $this->getDataFromFile('organizations.json');
    }

    /**
     * Get organization name by id
     *
     * @param $id
     * @return |null
     * @throws \App\Exception\InvalidSearchKeyException
     */
    public function getOrganizationNameById( $id) {
        $organization  = $this->findByKeyValue('_id', $id);

        if($organization){
            return $organization[0]['name'];
        }
        else {
            return null;
        }
    }
}