<?php

// This file keeps track of upgrades to
// the choice module
//
// Sometimes, changes between versions involve
// alterations to database structures and other
// major things that may break installations.
//
// The upgrade function in this file will attempt
// to perform all the necessary actions to upgrade
// your older installation to the current version.
//
// If there's something it cannot do itself, it
// will tell you what you need to do.
//
// The commands in here will all be database-neutral,
// using the methods of database_manager class
//
// Please do not forget to use upgrade_set_timeout()
// before any action that may take longer time to finish.

function xmldb_local_bigdata_upgrade($oldversion) {
    global $CFG, $DB;

    $dbman = $DB->get_manager();

    if ($oldversion < 2015021000) {
        $table = new xmldb_table('bigdata_profiles');
    	$index = new xmldb_index('name',
                                 XMLDB_INDEX_UNIQUE,
                                 array('name'));
        // Conditionally launch add index.
        if (!$dbman->index_exists($table, $index)) {
            $dbman->add_index($table, $index);
        }
        upgrade_plugin_savepoint(true, 2015021000, 'local', 'bigdata');
    }


    return true;
}

