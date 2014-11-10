<?php

if ($hassiteconfig) {
    $isenabled = get_config('local_bigdata', 'enabled');
    if ($isenabled) {
        $ADMIN->add('root', new admin_externalpage('bigdata', get_string('pluginname', 'local_bigdata'), $CFG->wwwroot . '/local/bigdata/index.php'));
    }

}

$settings = new admin_settingpage('local_bigdata', get_string('pluginname', 'local_bigdata'));
    $ADMIN->add('localplugins', $settings);

if (is_xtecadmin()) {
    $checkedyesno = array('0' => get_string('no'), '1' => get_string('yes')); // not nice at all
    $settings->add(new admin_setting_configselect('local_bigdata/enabled', get_string('enabled', 'local_bigdata'),
            get_string('enabled_desc', 'local_bigdata'), '', $checkedyesno));
}