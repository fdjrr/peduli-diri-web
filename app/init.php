<?php

date_default_timezone_set("Asia/Jakarta");

if (!session_id()) session_start();

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/core/Database.php';