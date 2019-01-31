<?php

class FormService
{
    /**
     * @param $name
     * @param $address
     * @param $cgt_field_ids
     * @return bool|Employer
     * @throws Exception
     */
    public static function find_or_create_employer($name, $address, $cgt_field_ids)
    {
        if ($employer = EmployerService::find_by_name($name)) {
            $employer = $employer[0];
            EmployerService::update_employer_cgt_fields($employer->get_id(), $cgt_field_ids);
            return $employer;
        } else {
            return EmployerService::create($name, $address, $cgt_field_ids);

        }
    }

    public static function form_exists($work_session_id, $user_id)
    {

    }

    /**
     * @param int $work_session_id
     * @param array $prompts
     * @return Form
     * @throws Exception
     *
     * rating
     * relevantWork
     * difficulties
     * relatedToMajor
     * wantedToLearn
     * cgtChangedMind
     * providedContacts
     *
     */
    public static function create_student_form($work_session_id, $prompts)
    {
        /** @var WorkSession $work_session */
        if ($work_session = WorkSessionService::select_by_id($work_session_id)) {
            /** @var User $student */
            $student = UserService::select_by_id($work_session->get_student_id());

            DataService::insert('form_student',
                [
                    'work_session_id' => $work_session_id,
                    'student_id' => $work_session->get_student_id(),

                    'rating' => $prompts['rating'],
                    'form_relevant_work' => $prompts['relevantWork'],
                    'form_difficulties' => $prompts['difficulties'],
                    'form_related_to_major' => $prompts['relatedToMajor'],
                    'form_wanted_to_learn' => $prompts['wantedToLearn'],
                    'form_cgt_changed_mind' => $prompts['cgtChangedMind'],
                    'form_provided_contacts' => $prompts['providedContacts']
                ]);

            return new Form($work_session, $student, $prompts);
        } else {
            throw new Exception('Work session does not exist');
        }
    }

    /**
     * @param int $work_session_id
     * @param array $prompts
     * @return Form
     * @throws Exception
     *
     * dependable,
     * cooperative,
     * interested,
     * fastLearner,
     * initiative,
     * workQuality,
     * responsibility,
     * criticism,
     * organization,
     * techKnowledge,
     * judgement,
     * creativity,
     * problemAnalysis,
     * selfReliance,
     * communication,
     * writing,
     * profAttitude,
     * profAppearance,
     * punctual,
     * timeEffective
     *
     */
    public static function create_supervisor_form($work_session_id, $prompts)
    {
        /** @var WorkSession $work_session */
        if ($work_session = WorkSessionService::select_by_id($work_session_id)) {
            /** @var User $supervisor */
            $supervisor = UserService::select_by_id($work_session->get_supervisor_id());

            DataService::insert('form_supervisor',
                [
                    'work_session_id' => $work_session_id,
                    'supervisor_id' => $work_session->get_supervisor_id(),

                    'rate_dependable' => $prompts['dependable'],
                    'rate_cooperative' => $prompts['cooperative'],
                    'rate_interested' => $prompts['interested'],
                    'rate_fast_learner' => $prompts['fastLearner'],
                    'rate_initiative' => $prompts['initiative'],
                    'rate_work_quality' => $prompts['workQuality'],
                    'rate_responsibility' => $prompts['responsibility'],
                    'rate_criticism' => $prompts['criticism'],
                    'rate_organization' => $prompts['organization'],
                    'rate_tech_knowledge' => $prompts['techKnowledge'],
                    'rate_judgement' => $prompts['judgement'],
                    'rate_creativity' => $prompts['creativity'],
                    'rate_problem_analysis' => $prompts['problemAnalysis'],
                    'rate_self_reliance' => $prompts['selfReliance'],
                    'rate_communication' => $prompts['communication'],
                    'rate_writing' => $prompts['writing'],
                    'rate_prof_attitude' => $prompts['profAttitude'],
                    'rate_prof_appearance' => $prompts['profAppearance'],
                    'rate_punctual' => $prompts['punctual'],
                    'rate_time_effective' => $prompts['timeEffective'],
                ]);

            return new Form($work_session, $supervisor, $prompts);
        } else {
            throw new Exception('Work session does not exist');
        }
    }
}