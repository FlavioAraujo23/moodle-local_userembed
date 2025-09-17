<?php

defined('MOODLE_INTERNAL') || die();

/**
 * Adiciona item no menu dropdown do usuário
 */
function local_userembed_extend_navigation_user($navigation, $user, $usercontext, $course, $coursecontext)
{
    if (
        has_capability('local/userembed:viewembed', context_system::instance()) &&
        get_config('local_userembed', 'showinprofile') &&
        isloggedin() && !isguestuser()
    ) {

        $url = new moodle_url('/local/userembed/view.php', ['id' => $user->id]);
        $navigation->add(
            get_string('linknameinmenuprofile', 'local_userembed'),
            $url,
            navigation_node::TYPE_SETTING,
            null,
            'userembed_view',
            new pix_icon('i/user', '', 'core')
        );
    }
}

/**
 * Adiciona nas configurações do usuário
 */
function local_userembed_extend_settings_navigation($settingsnav, $context)
{
    global $USER;

    if (
        has_capability('local/userembed:viewembed', context_system::instance()) &&
        get_config('local_userembed', 'showinprofile') &&
        isloggedin() && !isguestuser()
    ) {

        if ($usernode = $settingsnav->find('usercurrentsettings', navigation_node::TYPE_CONTAINER)) {
            $url = new moodle_url('/local/userembed/view.php', ['id' => $USER->id]);
            $usernode->add(
                get_string('linknameinmenuprofile', 'local_userembed'),
                $url,
                navigation_node::TYPE_SETTING
            );
        }
    }
}