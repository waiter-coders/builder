<?php
$config = array();

$config['database'] = loadConfigs('database.php', __DIR__);

$config['admin'] = loadConfigs('admin.php', __DIR__);

return $config;