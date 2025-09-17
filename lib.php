<?php
defined('MOODLE_INTERNAL') || die();
function local_userembed_myprofile_navigation(core_user\output\myprofile\tree $tree, $user)
{
    if (
        has_capability('local/userembed:viewembed', context_system::instance()) &&
        get_config('local_userembed', 'showinprofile')
    ) {

        $url = new moodle_url('/local/userembed/view.php', ['id' => $user->id]);
        $node = new core_user\output\myprofile\node(
            'miscellaneous',
            'userembed_view',
            get_string('linknameinmenuprofile', 'local_userembed'),
            null,
            $url
        );
        $tree->add_node($node);
    }
}