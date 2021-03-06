<?php

namespace Waiterphp\Builder\Main\Core;

use Waiterphp\Builder\Base as Base;


class TreeDao extends Base
{
    public function build($params = [])
    {
        // 检查数据库配置
        $params = $this->formatParams($params);

        // 获取数据表的结构信息
        $tableStruct = $this->fetchTableStruct($params);

        // 尝试生成文件
        $template = __DIR__ . '/template/TreeDao.php';
        $buildFile = $this->basePath . '/' . $params['path'] . '/' . $params['model'] . '.php';
        $this->buildFile($template, $buildFile, $tableStruct);
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
        $model = isset($params['model']) ? $params['model'] : $format['table'];
        $format['model'] = underline_to_hump($model);
        $format['path'] = 'model';
        $format['namespace'] = 'Model';
        if (isset($params['path'])) {
            $path = underline_to_hump($params['path']);
            $format['path'] .= DIRECTORY_SEPARATOR . $path;
            $format['namespace'] .= '\\' . $path;
            if ($format['model'] != $path && strncmp($format['model'], $path, strlen($path)) == 0) {
                $format['model'] = substr($format['model'], strlen($path));
            }
        }

        return $format;
    }

    private function fetchTableStruct($params)
    {
        $struct = table($params['table'])->struct();

        $response = [
            'namespace'=>$params['namespace'],
            'Model'=>$params['model'],
            'table'=>$params['table'],
            'primaryKey'=>'',
            'fields'=>[],
            'nodeId'=>'nodeId',
            'label'=>'label',
            'topicId'=>'topicId',
            'parentId'=>'parentId',
            'preNodeId'=>'preNodeId',
            'nextNodeId'=>'nextNodeId'
        ];

        foreach ($struct as $field) {
            if ($field['keyType'] == 'PRI') {
                $response['primaryKey'] = $field['field'];
                continue;
            }
            $response['fields'][] = [
                'field'=>$field['field'],
                'type'=>$this->formatDaoType($field['type']),
                'name'=>$field['comment']
            ];
        }
        
        return $response;
    }

    private function formatDaoType($dataType)
    {
        $dataType = strtolower($dataType);
        if ($dataType == 'int' || $dataType == 'tinyint') {
            return 'number';
        }
        if ($dataType == 'timestamp' || $dataType == 'datetime') {
            return 'datetime';
        }
        return 'string';
    }
}