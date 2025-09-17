<?php
defined('MOODLE_INTERNAL') || die();

function local_userembed_user_profile_view($user, $course)
{
    if (!get_config('local_userembed', 'showinprofile')) {
        return;
    }

    if (has_capability('local/userembed:viewembed', context_system::instance())) {
        if (get_config('local_userembed', 'showinprofile')) {
            if (isloggedin() && !isguestuser()) {
                global $USER;

                $url = new moodle_url('/local/userembed/view.php', ['id' => $USER->id]);
                $navigation->add(
                    get_string('linknameinmenuprofile', 'local_userembed'),
                    $url,
                    navigation_node::TYPE_SETTING
                );
            }
        }
    }

}