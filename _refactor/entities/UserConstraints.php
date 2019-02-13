<?php
include_once __DIR__ . '\..\includes.php';

class UserConstraints
{
    private static $instance;

    public static function get_instance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private $groups;

    public function __construct()
    {
    }

    /**
     * @param User $user
     * @return EntityConstraintGroup
     */
    public function create_from($user)
    {
        switch ($user->user_group_id) {
            case 'admin':
                return $this->create_from_admin($user);
            case 'advisor':
                return $this->create_from_advisor($user);
            case 'student':
                return $this->create_from_student($user);
            default:
                return $this->create_from_none();
        }
    }

    /**
     * @param User $user
     * @return EntityConstraintGroup
     */
    private function create_from_admin($user)
    {
        $group = new EntityConstraintGroup();
        return $group;
    }

    /**
     * @param User $user
     * @return EntityConstraintGroup
     */
    private function create_from_advisor($user)
    {
        $group = new EntityConstraintGroup();

        $user_ids = User::dao()->get_advisor_students($user->id);
        $user_ids = array_map(function ($f) {
            return $f->id;
        }, $user_ids);

        $group->field('* (User::id)', $user_ids);
        return $group;
    }

    /**
     * @param User $user
     * @return EntityConstraintGroup
     */
    private function create_from_student($user)
    {
        $group = new EntityConstraintGroup();
        $group->field('*', []);
        return $group;
    }

    /**
     * @return EntityConstraintGroup
     */
    private function create_from_none()
    {
        $group = new EntityConstraintGroup();
        $group->field('*', []);
        return $group;
    }
}