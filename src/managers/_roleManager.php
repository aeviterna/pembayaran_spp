<?php

require_once(dirname(__FILE__) . "/../utilities/_enumeration.php");

class RoleManager
{

    /**
     * The role of the user
     *
     * @var int $userRole
     */
    public int $userRole;

    /**
     * The roles provided by the system
     *
     * @var array $roles
     */
    public array $roles = [
        "siswa" => RoleEnumeration::SISWA,
        "petugas" => RoleEnumeration::PETUGAS,
        "administrator" => RoleEnumeration::ADMINISTRATOR,
        "superadministrator" => RoleEnumeration::SUPERADMINISTRATOR,
    ];

    /**
     * The role names provided by the system
     *
     * @var array $roleNames
     */
    public array $roleNames = [
        RoleEnumeration::SISWA => "Siswa",
        RoleEnumeration::PETUGAS => "Petugas",
        RoleEnumeration::ADMINISTRATOR => "Administrator",
        RoleEnumeration::SUPERADMINISTRATOR => "Superadministrator",
    ];

    /**
     * Constructor for the RoleManager class
     *
     * @param int $userRole
     */
    public function __construct(int $userRole)
    {
        $this->userRole = $userRole;
    }

    /**
     * Get the role of the user
     *
     * @param int $role
     * @return string
     */
    public function getRole(int $role): string
    {
        return $this->roles[$role];
    }

    /**
     * Get the name of the role
     *
     * @param int $role
     * @return string
     */
    public function getRoleName(int $role): string
    {
        return array_search($role, $this->roles);
    }

    /**
     * Check if the user role is greater than or equal to the minimum role
     *
     * @param int $minimumRole
     * @return bool
     */
    public function checkMinimumRole(int $minimumRole): bool
    {
        if ($this->userRole >= $minimumRole) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check if the user role is equal to the level
     *
     * @param int $level
     * @return bool
     */
    public function checkSingleRole(int $level): bool
    {
        if ($this->getRole($this->userRole) == $this->getRole($level)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check if the user role is equal to one of the levels
     *
     * @param array $levels
     * @return bool
     */
    public function checkMultipleRoles(array $levels): bool
    {
        if (
            !in_array($this->getRole($this->userRole), array_map(function ($level) {
                return $this->getRole($level);
            }, $levels))
        ) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Get the role list
     *
     * @return array|string[]
     */
    public function getRoleList($blacklist): array
    {
        if ($blacklist == null) {
            return $this->roleNames;
        } else {
            return array_diff($this->roleNames, $blacklist);
        }
    }
}