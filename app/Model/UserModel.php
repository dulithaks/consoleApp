<?php

namespace App\Model;

class UserModel extends Model
{
    protected $keyList = ["_id", "url", "external_id", "name", "alias", "created_at", "active", "verified", "shared", "locale",
        "timezone", "last_login_at", "email", "phone", "signature", "organization_id", "tags", "suspended", "role"];

    public function __construct()
    {
        $this->getDataFromFile('users.json');
    }



}