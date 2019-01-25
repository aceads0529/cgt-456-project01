<?php

class Form
{
    private $work_session, $user, $prompts;

    /**
     * @param WorkSession $work_session
     * @param User $user
     * @param array $prompts
     */
    public function __construct($work_session, $user, $prompts)
    {
        $this->work_session = $work_session;
        $this->user = $user;
        $this->prompts = $prompts;
    }

    /**
     * @return WorkSession
     */
    public function get_work_session()
    {
        return $this->work_session;
    }

    /**
     * @return User
     */
    public function get_user()
    {
        return $this->user;
    }

    /**
     * @return array
     */
    public function get_prompts()
    {
        return $this->prompts;
    }
}