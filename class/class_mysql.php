<?PHP
class MysqlQuery
{
	private $sql_query;//sql语句执行结果
	private $sql;//sql语句
	private $num;//返回记录数
	private $r;//返回数组
	private $id;//返回数据库id号	
	private $link;
	
	public function __construct($hostname, $username, $password, $database) {
		if (!$this->link = mysql_connect($hostname, $username, $password)) {
      		trigger_error('Error: Could not make a database link using ' . $username . '@' . $hostname);
		}

    	if (!mysql_select_db($database, $this->link)) {
      		trigger_error('Error: Could not connect to database ' . $database);
    	}
		
		mysql_query("SET NAMES 'utf8'", $this->link);
		mysql_query("SET CHARACTER SET utf8", $this->link);
		mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $this->link);
		mysql_query("SET SQL_MODE = ''", $this->link);
  	}	
	
	//########################################执行mysql_query()语句##############################
	public function query($sql)
	{
		mysql_query('SET NAMES utf8');
		$this->sql_query=mysql_query($sql) or die(mysql_error()."<br>".$sql);
		return $this->sql_query;
	}
    //########################################执行mysql_fetch_array()#############################
    public function fetch($sql_query,$result_type=MYSQL_BOTH)//此方法的参数是$sql_query就是sql语句执行结果
    {
        while($r = $this->fetchRows($sql_query,$result_type)){
            $row[] = $r;
        }
        $this->r = $row;
        return $this->r;
    }
	//########################################执行mysql_fetch_array()#############################
	public function fetchRows($sql_query,$result_type=MYSQL_BOTH)//此方法的参数是$sql_query就是sql语句执行结果
	{
		$this->r=mysql_fetch_array($sql_query,$result_type);
		return $this->r;
	}
	//#################执行fetchone(mysql_fetch_array())#####################################
	//此方法与fetch()的区别是:1、此方法的参数是$sql就是sql语句
	//2、此方法用于while(),for()数据库指针不会自动下移，而fetch()可以自动下移。
	public function fetchRow($sql,$result_type=MYSQL_BOTH)
	{
		$this->sql_query=$this->query($sql);
		$this->r=mysql_fetch_array($this->sql_query,$result_type);
		return $this->r;
	}
	//############################执行mysql_num_rows()#######################
	public function num($sql='')//此类的参数是$sql就是sql语句
	{
		if(!empty($sql)) {
			$this->sql_query=$this->query($sql);
		}
		$this->num=mysql_num_rows($this->sql_query);
		return $this->num;
	}
	//###########################执行numone(mysql_num_rows())####################
	//此方法与num()的区别是：1、此方法的参数是$sql_query就是sql语句的执行结果。
	public function numQuery($sql_query)
	{
		$this->num=mysql_num_rows($sql_query);
		return $this->num;
	}
	//###############################执行free(mysql_result_free())#################
	//此方法的参数是$sql_query就是sql语句的执行结果。只有在用到mysql_fetch_array的情况下用
	public function free($sql_query)
	{
		mysql_free_result($sql_query);
	}
	//###########################执行seek(mysql_data_seek())#################
	//此方法的参数是$sql_query就是sql语句的执行结果,$pit为执行指针的偏移数
	public function seek($sql_query,$pit)
	{
		mysql_data_seek($sql_query,$pit);
	}
	//###########################执行id(mysql_insert_id())####################
	public function getLastId()//取得最后一次执行mysql数据库id号
	{
		$this->id=mysql_insert_id();
		return $this->id;
	}
	
	public function __destruct() {
		if ($this->link) {
			mysql_close($this->link);
		}
	}
}
?>