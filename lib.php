<?php
defined('MOODLE_INTERNAL') || die();

function local_userembed_user_profile_view($user, $course)
{
    if (!get_config('local_userembed', 'showinprofile')) {
        return;
    }

    if (has_capability('local/userembed:viewembed', context_system::instance())) {
        $url = new moodle_url('/local/userembed/view.php', ['id' => $user->id]);
        echo html_writer::link($url, get_string('viewembed', 'local_userembed'));
        if (get_config('showinprofile')) {
            if (isloggedin() && !isguestuser()) {
                $navigation->add(
                    get_string('linknameinmenuprofile', 'local_userembed'),
                    $url,
                    navigation_node::TYPE_SETTING
                );
            }
        }
    }

}