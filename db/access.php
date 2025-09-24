<?php
defined('MOODLE_INTERNAL') || die();

$capabilities = [
    'local/userembed:viewembed' => [
        'captype' => 'read',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => [
            'manager' => CAP_ALLOW,   // Admins will now have access
        ],
    ],
];