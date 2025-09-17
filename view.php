<?php
require('../../config.php');

$userid = required_param('id', PARAM_INT);
require_login();

$context = context_system::instance();
require_capability('local/userembed:viewembed', $context);

$PAGE->set_url(new moodle_url('/local/userembed/view.php', ['id' => $userid]));
$PAGE->set_context($context);
$PAGE->set_title(get_string('viewembed', 'local_userembed'));

$embedcode = get_config('local_userembed', 'embedcode');

echo $OUTPUT->header();

if (!empty($embedcode)) {
    echo format_text($embedcode, FORMAT_HTML, ['noclean' => true]);
} else {
    echo $OUTPUT->notification(get_string('noembed', 'local_userembed'), 'info');
}

echo $OUTPUT->footer();