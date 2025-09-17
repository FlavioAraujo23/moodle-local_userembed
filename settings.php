<?php
defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    $settings = new admin_settingpage('local_userembed', get_string('pluginname', 'local_userembed'));

    $settings->add(new admin_setting_configtextarea(
        'local_userembed/embedcode',
        get_string('embedcode', 'local_userembed'),
        get_string('embedcode_desc', 'local_userembed'),
        '',
        PARAM_RAW,
        60,
        10
    ));

    $settings->add(new admin_setting_configcheckbox(
        'local_userembed/showinprofile',
        get_string('showinprofile', 'local_userembed'),
        get_string('showinprofile_desc', 'local_userembed'),
        1
    ));

    $ADMIN->add('localplugins', $settings);
}