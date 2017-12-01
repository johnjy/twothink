<?php
namespace app\admin\command;


use think\console\Command;

class Test extends Command{

    protected function configure()
    {
        $this->setName('test')->setDescription('Here is the remark');

    }

    protected function execute(Input $input, Output $output)
    {
       echo 'oho';
    }
}