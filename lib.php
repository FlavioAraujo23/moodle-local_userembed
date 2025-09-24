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
 * Library functions and hooks for Local UserEmbed plugin.
 *
 * @package    local_userembed
 * @copyright  2025 Flávio Araújo <flaviolopes1027@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Add dashboard link to user profile navigation.
 *
 * @param \core_user\output\myprofile\tree $tree The myprofile tree.
 * @param stdClass $user The user object.
 * @param bool $iscurrentuser Whether viewing own profile.
 * @param stdClass $course The course being viewed.
 */
function local_userembed_myprofile_navigation(core_user\output\myprofile\tree $tree, $user){
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
