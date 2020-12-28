<?php


namespace App\Models\Traits;


Trait UserACLTrait
{
    public function allPermissionsUser()
    {
        $permissions = [];
        foreach ($this->permissions as $permission){
            array_push($permissions, $permission->name  );
        }
        return $permissions;
    }

    public function hasPermission(string $permissionName) : bool
    {
        return in_array($permissionName, $this->allPermissionsUser());
    }

    public function isAdmin() : bool
    {
        return in_array($this->email, config("acl.admins"));
    }

    public function hasRestaurant() : bool
    {
        return $this->restaurant()->first() === null;
    }
}
