<?php
class ApplicationDataConnectionPool
{
    protected static $connections;
    protected static $pool;
    public static function init(){
        //Establish Pool
        ApplicationDataConnectionPool::$pool = array();
        //Create connections collection
        ApplicationDataConnectionPool::$connections = array();
        
        ApplicationDataConnectionPool::$connections['tutelage_db'] = function(){
			require_once(LIBPATH."mysql_database.class.php");
			$db = new ApplicationDatabase(new MysqlDatabase("localhost","root",""));
			return $db;
        };
        
	}
    public static function get($name)
    {
		if( !isset(ApplicationDataConnectionPool::$pool[$name]) ){
			$connections = ApplicationDataConnectionPool::$connections;
			ApplicationDataConnectionPool::set($name, $connections[$name]());
		}
		return ApplicationDataConnectionPool::$pool[$name];
        //return ( isset($this->pool[$name]))?$this->pool[$name]:$this->connections[$name]();
    }
    public static function set($name,$value)
    {
        ApplicationDataConnectionPool::$pool[$name] = $value;
    }
}
?>
