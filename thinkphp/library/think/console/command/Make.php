<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 刘志淳 <chun@engineer.com>
// +----------------------------------------------------------------------

namespace think\console\command;

use think\console\Command;
use think\console\Input;
use think\console\input\Argument;
use think\console\Output;
use think\facade\App;
use think\facade\Config;
use think\facade\Env;

abstract class Make extends Command
{
    protected $type;

    abstract protected function getStub();

    protected function configure()
    {
        $this->addArgument('name', Argument::REQUIRED, "The name of the class");
    }

    protected function execute(Input $input, Output $output)
    {

        $name = trim($input->getArgument('name'));

        $classname = $this->getClassName($name);

        $pathname = $this->getPathName($classname);

        if (is_file($pathname)) {
            $output->writeln('<error>' . $this->type . ' already exists!</error>');
            return false;
        }

        if (!is_dir(dirname($pathname))) {
            mkdir(dirname($pathname), 0755, true);
        }

        file_put_contents($pathname, $this->buildClass($classname));

        $output->writeln('<info>' . $this->type . ' created successfully.</info>');

    }

    protected function buildClass($name)
    {
        $stub = file_get_contents($this->getStub());

        $namespace = trim(implode('\\', array_slice(explode('\\', $name), 0, -1)), '\\');

        $class = str_replace($namespace . '\\', '', $name);

        return str_replace(['{%className%}', '{%actionSuffix%}', '{%namespace%}', '{%app_namespace%}'], [
            $class,
            Config::get('action_suffix'),
            $namespace,
            App::getNamespace(),
        ], $stub);
    }

    protected function getPathName($name)
    {
        $name = str_replace(App::getNamespace() . '\\', '', $name);

        return Env::get('app_path') . ltrim(str_replace('\\', '/', $name), '/') . '.php';
    }

    protected function getClassName($name)
    {
        $appNamespace = App::getNamespace();

        if (strpos($name, $appNamespace . '\\') !== false) {
            return $name;
        }

        if (Config::get('app_multi_module')) {
            if (strpos($name, '/')) {
                list($module, $name) = explode('/', $name, 2);
            } else {
                $module = 'domain';
            }
        } else {
            $module = null;
        }

        if (strpos($name, '/') !== false) {
            $name = str_replace('/', '\\', $name);
        }

        return $this->getNamespace($appNamespace, $module) . '\\' . $name;
    }

    protected function getNamespace($appNamespace, $module)
    {
        return $module ? ($appNamespace . '\\' . $module) : $appNamespace;
    }

}
