<?php

namespace Command\Model;

use Builder\Command\Command;
use Builder\Input\InputInterface;
use Builder\Output\OutputInterface;

class ModelCommand extends Command
{
    public $name = 'model';
    
    public $description = 'Model Create';

    public function execute(InputInterface $input, OutputInterface $output)
    {
       echo ($input->get('modelName'));
    }
}
