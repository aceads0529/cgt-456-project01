<?php
include_once "../includes.php";

try {
    list($action, $data) = api_get_params();

    switch ($action) {
        case 'select':
            select($data);
            break;
        case 'student':
            student($data);
            break;
    }

} catch (Exception $e) {
    exit_server_error($e);
}

function select($data)
{
    api_require_permission('select_work_session');
    api_require_data($data, 'id');

    api_select($data['id'], ['WorkSessionService', 'select_all'], ['WorkSessionService', 'select_by_id']);
}

/**
 * @param $data
 * @throws Exception
 */
function student($data)
{
    api_require_permission('submit_student_form');

    api_require_data($data, 'employer', 'session', 'supervisor', 'prompts', 'fi');
    api_require_data($data['supervisor'], 'email');
    api_require_data($data['prompts'],
        'rating',
        'relevantWork',
        'difficulties',
        'relatedToMajor',
        'wantedToLearn',
        'cgtChangedMind',
        'providedContacts');

    if (!isset($data['session']['address']))
        $data['session']['address'] = null;

    $student = AuthService::get_active_user();
    $employer = _get_employer_from_data($data['employer']);
    $work_session = _create_work_session($employer->get_id(), $student->get_id(), $data['session']);

    FormService::create_student_form($work_session->get_id(), $data['prompts']);
    InviteService::send_supervisor_invite_email($data['supervisor']['email'], $work_session->get_id());

    exit_response(true, 'Form submitted successfully');
}

/**
 * @param $data
 * @throws Exception
 */
function supervisor($data)
{
    api_require_permission('submit_supervisor_form');
    api_require_data($data, 'sessionId', 'prompts');

    $user = AuthService::get_active_user();

    /** @var WorkSession $work_session */
    $work_session = WorkSessionService::select_by_id($data['sessionId']);

    if (!$work_session)
        exit_response(false, 'User not assigned to work session');

    if ($work_session->get_supervisor_id() != $user->get_id())
        exit_no_permission();

    FormService::create_supervisor_form($work_session->get_id(), $data['prompts']);
    exit_response(true, 'Form submitted successfully');
}

/**
 * @param array $data
 * @return bool|Employer
 * @throws Exception
 */
function _get_employer_from_data($data)
{
    api_require_data($data,
        'name',
        'address',
        'cgt_field_ids');

    return FormService::find_or_create_employer($data['name'], $data['address'], $data['cgt_field_ids']);
}

/**
 * @param int $employer_id
 * @param int $student_id
 * @param array $data
 * @return WorkSession
 * @throws Exception
 */
function _create_work_session($employer_id, $student_id, $data)
{
    api_require_data($data,
        'jobTitle',
        'startDate',
        'endDate',
        'offsite',
        'totalHours',
        'payRate');

    return WorkSessionService::create(
        $employer_id,
        null,
        $student_id,
        $data['jobTitle'],
        $data['address'],
        $data['startDate'],
        $data['endDate'],
        $data['offsite'],
        $data['totalHours'],
        $data['payRate']);
}