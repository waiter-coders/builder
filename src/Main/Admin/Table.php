<?php

namespace Waiterphp\Builder\Main\Admin;

use Waiterphp\Builder\Base as Base;


class Table extends Base
{
    public function build($params = [])
    {
        $data = $this->formatParams($params);

        // 生成dao模型        
        $this->dispatcher('dao', $params);

        // 生成控制器
        $template = __DIR__ . '/template/controller/Table.php';
        $targetFile = $this->basePath . '/' . $data['path'] . '/' . $data['controller'] . '.php';
        $this->buildFile($template, $targetFile, $data);
    }

    private function formatParams($params)
    {
        assert_exception(count($params) > 0, 'params empty');

        // 标准化表名 
        $format = [];
        $format['table'] = isset($params[0]) ? $params[0] : ''; // 默认第一个参数为数据表
        $format['table'] = isset($params['table']) ? $params['table'] : $format['table'];
        assert_exception(!empty($format['table']), 'table not set');

        // 标准化数据库
        $format['database'] = 'default';

        // 标准化模型相关
        $controller = isset($params['controller']) ? $params['controller'] : $format['table'];
        $format['controller'] = underline_to_hump($controller);
        $format['path'] = 'controller';
        $format['namespace'] = 'Controller';
        $model = isset($params['model']) ? $params['model'] : $format['table'];
        $format['model'] = underline_to_hump($model);
        if (isset($params['path'])) {
            $path = underline_to_hump($params['path']);
            $format['path'] .= DIRECTORY_SEPARATOR . $path;
            $format['namespace'] .= '\\' . $path;            
            if ($format['model'] != $path && strncmp($format['controller'], $path, strlen($path)) == 0) {
                $format['controller'] = substr($format['controller'], strlen($path));
                $format['model'] = substr($format['model'], strlen($path));
            }
            $format['model'] = $path . '.' . $format['model'];
        }

        $format['controller'] .=  'Table';

        return $format;
    }
}