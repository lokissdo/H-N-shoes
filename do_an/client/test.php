<?php
session_start();
class USER{
    public $name;
    public $sdt=123;
    function __construct($name) {
        $this->name = $name;
      }
      public function get_name() {
        return $this->name;
      }
}
$user=new USER('hưng');
$_SESSION['key']=$user;
echo $_SESSION['key']->get_name();
?>