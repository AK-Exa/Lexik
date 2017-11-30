<?php
session_start();

require_once __DIR__.'/../core/bootstrap.php';

use RedBeanPHP\Facade as R;

//Ajax
if(isset($_POST['ids'])) {
    $emp_id = trim($_POST['ids']);
    R::exec('DELETE FROM user WHERE id in ('.$emp_id.')');
    echo $emp_id;
}else{
    $dispatcher = new \Lexik\Services\Dispatcher();
    $dispatcher->dispatch();
}