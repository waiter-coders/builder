# builder
waiterphp 的代码生成框架，用于生成特定应用或自定义的代码片段

### 命令行入口文件说明
- 建议将文件放置在项目根目录下

- 代码示例：
```php 
#!/usr/bin/env php
<?php

require \_\_DIR\_\_ .  '/start.php';

use Builder\Application;
use Builder\Input\Input;
use Builder\Output\Output;

/*注册项目命令文件夹*/
Application::addCommandNamespace(array('Command\\' => __DIR__.'/command'), $autoloader);

//运行命令
Application::getInstance()->run(new Input(), new Output());
```
### 命令行目录
在项目更目录中建立command，则像下面这样注册
1. 'Command\\' 为命名空间
2. __DIR__.'/command' 命令行所在的文件夹
3. $autoloader  自动加载的对象
4. waiterphp项目的start.php文件13行修改为 file_exists($composerFile) && $autoloader = include($composerFile);
```php
Application::addCommandNamespace(array('Command\\' => __DIR__.'/command'), $autoloader);
```

命令文件书写示例
1. 控制器示例
```php
<?php

namespace Command;

use Builder\Command\Command as BuildCommand;
use Builder\Input\InputInterface;
use Builder\Output\OutputInterface;

class Controller extends BuildCommand
{
    public $name = 'controller';
    
    public $description = '创建控制器';

    public function execute(InputInterface $input, OutputInterface $output)
    {
       $commandName = $input->get(0) . '......';
       $output->writeln('正在执行命令:' . $output->color($commandName, \Builder\Output\Color::F_GREEN));
       //命令之间的调用 命令名 传入的参数 如果调用的命令 php build controller -t sample_admin 则下面的参数可以省略model会直接从命令行参数取得
       
       parent::call('model', array('t'=>'sample_admin'));
    }
}
```
*其中有命令行调用*   
2. 模型示例：
```php 
<?php

namespace Command;

use Builder\Command\Command as BuildCommand;
use Builder\Input\InputInterface;
use Builder\Output\OutputInterface;

class Model extends BuildCommand
{
    public $name = 'model';
    
    public $description = '创建表模型';

    public function execute(InputInterface $input, OutputInterface $output)
    {
       $tableName = $input->get('t');
       $output->writeln('正在执行命令:' . $output->color($tableName, \Builder\Output\Color::F_GREEN));
    }
}
```