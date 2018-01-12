<?php
namespace app;

use ReflectionClass;

class IoC
{
    // 获得类的对象实例
    public static function getInstance($className)
    {
        $params = self::getParams($className);

        $mainClass = new ReflectionClass($className);

        return $mainClass->newInstanceArgs($params);
    }

    /**
     * 获得类的方法参数(只获得有类型的参数)
     */
    public static function getParams($className, $methodName = '__construct')
    {
        $mainClass = new ReflectionClass($className);
        $mainParams = [];

        if ($mainClass->hasMethod($methodName)) {
            $constructor = $mainClass->getMethod($methodName);
            
            $params = $constructor->getParameters();
            //var_dump($params);exit;

            if (count($params) > 0) {
                foreach ($params as $key => $param) {
                    $paramClass = $param->getClass();
                    //var_dump($paramClass);

                    if ($paramClass) {

                        $paramClassName = $paramClass->getName();

                        $_mainParams = self::getParams($paramClassName);

                        $_mainClass = new ReflectionClass($paramClassName);

                        $mainParams[] = $_mainClass->newInstanceArgs($_mainParams);
                        
                    } else {
                        $mainParams[] = $param->getDefaultValue();
                    }
                }
            }
        }

        return $mainParams;
    }
}