<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Admin settings for Local UserEmbed plugin.
 *
 * @package    local_userembed
 * @copyright  2025 Flávio Araújo <flaviolopes1027@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

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

    // Force add to usermenu if it doesn't already exist
    $usermenu = get_config('core_admin', 'usermenuitems');
    if (strpos($usermenu, 'local_userembed|/local/userembed/view.php') === false) {
        set_config(
            'usermenuitems',
            $usermenu . "\n" . 'userembed,local_userembed|/local/userembed/view.php',
            'core_admin'
        );
    }
}