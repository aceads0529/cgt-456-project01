<?php

class InviteService
{
    const SUPERVISOR_REDIRECT_URL = '/public/register.php?user_group=supervisor';

    /**
     * @param string $email
     * @param int $work_session_id
     * @throws Exception
     */
    public static function send_supervisor_invite_email($email, $work_session_id)
    {
        $email_hash = md5($email);

        if (!DataService::exists('email_invite', ['email_hash' => $email_hash])) {
            $id = md5(strval(time()));
            $redirect_url = self::SUPERVISOR_REDIRECT_URL;

            DataService::insert('email_invite',
                [
                    'id' => $id,
                    'email_hash' => $email_hash,
                    'redirect_url' => $redirect_url,
                    'work_session_id' => $work_session_id
                ]);
        }

        $url = $_SERVER['HTTP_HOST'] . '/public/invite.php?id=' . $email_hash;
        self::send_email('Purdue University Intern Survey', 'Please visit this URL: ' . $url);
    }

    public static function send_email($subject, $body)
    {
        // TODO: Implement email functionality
    }

    /**
     * @param string $id
     * @param string $hash
     * @return bool
     * @throws Exception
     */
    public static function register_invite($id, $hash)
    {
        safe_session_start();
        $invite = DataService::select('email_invite', ['id' => $id, 'email_hash' => $hash]);

        if ($invite) {
            $invite = $invite->fetch_assoc();

            $_SESSION['registered'] = true;
            $_SESSION['registered_url'] = $invite['redirect_url'];
            $_SESSION['registered_work_session_id'] = $invite['work_session_id'];
            return true;
        } else {
            unset($_SESSION['registered']);
            unset($_SESSION['registered_url']);
            unset($_SESSION['registered_work_session_id']);
            return false;
        }
    }

    public static function is_invited()
    {
        safe_session_start();
        return isset($_SESSION['registered']);
    }

    public static function get_invitation_link()
    {
        safe_session_start();
        return isset($_SESSION['registered_url']) ? $_SESSION['registered_url'] : false;
    }

    public static function get_work_session_id()
    {
        safe_session_start();
        return isset($_SESSION['registered_work_session_id']) ? $_SESSION['registered_work_session_id'] : false;
    }
}