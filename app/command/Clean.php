<?php
declare (strict_types=1);

namespace app\command;

use think\console\Command;
use think\console\Input;
use think\console\input\Argument;
use think\console\input\Option;
use think\console\Output;

class Clean extends Command
{
    protected function configure()
    {
        // 指令配置
        $this->setName('clean')
            ->addArgument('name', Argument::OPTIONAL, '你的名字')
            ->setDescription('删除表格');
    }

    protected function execute(Input $input, Output $output)
    {
        $name = $input->getArgument('name');
        $name = $name ?: 'thinkphp';
        // 指令输出
        $output->writeln('你好啊' . $name);
    }
}
