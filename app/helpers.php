<?php

function event(SplSubject $event)
{
    // 这里为简单演示，没有增加监听者和事件对象的对应配置
    $listener = new \app\Listeners\MyListener;

    $event->attach($listener);

    $event->notify();
}

