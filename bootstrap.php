<?php

function delTree($dir) {
    $files = array_diff(scandir($dir), array('.','..'));
    foreach ($files as $file) {
        (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
    }
    return rmdir($dir);
}

ini_set('include_path', ini_get('include_path')
                        .PATH_SEPARATOR.dirname(__FILE__).'/src/');

define('GIT4P_TESTDIR', '/tmp/phpunit/git4p/testrepo');

if (file_exists(GIT4P_TESTDIR)) {
    delTree(GIT4P_TESTDIR);
}

mkdir(GIT4P_TESTDIR, 0777, true);

require_once 'Git.php';
require_once 'GitObject.php';
require_once 'GitBlob.php';
require_once 'GitTree.php';
require_once 'GitCommit.php';
require_once 'GitTag.php';
require_once 'GitUser.php';
