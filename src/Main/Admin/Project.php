<?php

namespace Waiterphp\Builder\Main\Admin;

use Waiterphp\Builder\Base as Base;

class Project extends Base
{
    public function build($params = [])
    {
        $template = __DIR__ . '/template/project';
        $this->buildDir($template, $this->basePath, $params, true);
    }
} 