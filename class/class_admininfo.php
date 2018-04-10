<?PHP
class AdminInfo
{
	public $u_id = '';
	public $u_name = '';
	public $u_groupid = '';
	public $u_groupname = '';
	public $u_rnd = '';
	public $u_flag = '';
	public $db = null;
	
	public function __construct($db=null)
	{
		$this->u_id = !empty($_COOKIE['admin_userid'])?$_COOKIE['admin_userid']:'';
		$this->u_name = !empty($_COOKIE['admin_username'])?$_COOKIE['admin_username']:'';
		$this->u_groupid = !empty($_COOKIE['admin_groupid'])?$_COOKIE['admin_groupid']:'';
		$this->u_groupname = !empty($_COOKIE['admin_groupname'])?$_COOKIE['admin_groupname']:'';
		$this->u_rnd = !empty($_COOKIE['admin_rnd'])?$_COOKIE['admin_rnd']:'';
		$this->u_flag = !empty($_COOKIE['admin_flag'])?$_COOKIE['admin_flag']:'';
		$this->u_logintime = !empty($_COOKIE['admin_logintime'])?$_COOKIE['admin_logintime']:'';
		$this->db = $db;
	}
	
	public function u_login ($username,$password,$key='',$remember=0)
	{
		$username = doAddslashes ($username);
		$password = doAddslashes ($password);
		if (!$username OR !$password )
		{
			redirectAdmin ('EmptyInput', SITE_URL.'admin/login.php');
		}
		
		if($remember)
		{//记住用户名(30天)
			setcookie ('remember_username', $username, (time()+30*24*3600), '/', '');
		}
		if(!empty($key) && $key != $_COOKIE['checkkey']) {
			setcookie ('checkkey', '', 0, '/', '');//不管登陆成功与否，置空验证码
			redirectAdmin ('ErrorKey', SITE_URL.'admin/login.php');
		}
		setcookie ('checkkey', '', 0, '/', '');//不管登陆成功与否，置空验证码
		//判断登陆不成功次数是否超限
		if ($_COOKIE['lastlogintime']){
			if ((time () - $_COOKIE['lastlogintime']) < (LOGIN_TIME * 60)){
			  if ((LOGIN_NUM-1) < $_COOKIE['loginnum']){
				redirectAdmin ('LoginOutNum', SITE_URL.'admin/login.php');
			  }
			}
			else{
			  setcookie ('loginnum', 0, 0, '/', '');
			  //$_COOKIE['loginnum'] = 0;
			}
		}	
		$num = $this->db->num((((('select ID from admin where Name=\''.$username).'\' and Passwd=\'').md5 ($password)).'\' limit 1'));
		if (!$num){//登陆不成功
		  $loginnum = $_COOKIE['loginnum'];//登录不成功次数
		  if (empty ($loginnum)){
		    $loginnum = 0;
		  }		
		  $logintime = time();		  		
		  ++$loginnum;
		  setcookie ('loginnum', $loginnum, ($logintime + 86400), '/', '');
		  setcookie ('lastlogintime', $logintime, ($logintime + 86400), '/', '');
		  redirectAdmin ('LoginFail', SITE_URL.'admin/login.php');
		}
		
		//判断用户是否被锁定
		$num = $this->db->num((((('select ID from admin where Name=\''.$username).'\' and Passwd=\'').md5 ($password)).'\' and Checked=1  limit 1'));
		if (!$num){
		  redirectAdmin ('LoginClock', SITE_URL.'admin/login.php');
		}
		
		$r = $this->db->fetchRow ((((''.'select a.ID,a.Name,a.UserFlag,a.GroupID,b.Name as GroupName from admin a left join `group` b on a.GroupID=b.ID where a.Name=\'').$username).'\' limit 1'));
		$rnd = $this->u_make_password (20);
		$loginip = getIP();
		$now_time = time();
		////设置cookie，更新rnd随机码和登陆时间及登陆时的IP
		$this->db->query("UPDATE admin set Rnd='".$rnd."',LoginIp='".$loginip."',LoginTime=".$now_time." where Name='".$username."'");
		$set1 = setcookie ('admin_userid', $r['ID'], 0, '/', '');
		setcookie ('admin_username', $r['Name'], 0, '/', '');		
		$set2 = setcookie ('admin_groupid', $r['GroupID'], 0, '/', '');		
		setcookie ('admin_groupname', $r['GroupName'], 0, '/', '');
		$set3 = setcookie ('admin_rnd', $rnd, 0, '/', '');
		setcookie ('admin_flag', $r['UserFlag'], 0, '/', '');
		setcookie ('admin_logintime', time (), 0, '/', '');
		if ((($set1 AND $set2) AND $set3)){			
			redirectAdmin ('LoginSuccess', SITE_URL.'admin/index.php');//登陆成功页
		}
		else{			
			redirectAdmin ('NotCookie', SITE_URL.'admin/login.php');
		}
	}
	public function u_loginout ()
	{
	    $u_id = (int)$this->u_id;
	    $u_name = doAddslashes($this->u_name);		
		if ((!$u_id || !$u_name))
	    {
	    	redirectAdmin ('NotLogin', SITE_URL.'admin/login.php');
	    }	    
		setcookie ('admin_userid', '', 0, '/', '');
		setcookie ('admin_username', '', 0, '/', '');			
		setcookie ('admin_groupid', '', 0, '/', '');			
		setcookie ('admin_groupname', '', 0, '/', '');		
		setcookie ('admin_rnd', '', 0, '/', ''); 
		setcookie ('admin_flag', '', 0, '/', '');
		setcookie ('admin_logintime', '', 0, '/', '');  
		$rnd = $this->u_make_password (20);
	    $this->db->query ((((((''.'UPDATE admin set Rnd=\'').$rnd).'\' where ID=\'').$u_id).'\''));
	    redirectAdmin ('ExitSuccess', SITE_URL.'admin/login.php');
	}	
	public function u_is_login ($isadmin="")//$isadmin='admin':表示要求验证必须是管理员登录，不是则提示无权限
	{				
		$u_id = (int)$this->u_id;
		$u_name = doAddslashes ($this->u_name);
		$u_groupid = (int)$this->u_groupid;
		$u_rnd = doAddslashes ($this->u_rnd);
		$u_flag = (int)$this->u_flag;
		$u_logintime = $this->u_logintime;
		if ((!$u_id OR !$u_name)){
			redirectAdmin ('NotLogin', SITE_URL.'admin/login.php');
		}
		if($isadmin=="admin" && $u_flag!=1){
			redirectAdmin ('NotLevel', 'history.go(-1)');   
		}
		//$num = $this->db->num((((('select ID from admin where Name=\''.$u_name).'\' and Rnd=\'').$u_rnd).'\'  limit 1'));
		$num = $this->db->num((((('select ID from admin where ID=\''.$u_id).'\' and Rnd=\'').$u_rnd).'\'  limit 1'));
		if (!$num)
		{			
			setcookie ('admin_userid', '', 0, '/', '');
			setcookie ('admin_username', '', 0, '/', '');			
			setcookie ('admin_groupid', '', 0, '/', '');			
			setcookie ('admin_groupname', '', 0, '/', '');		
			setcookie ('admin_rnd', '', 0, '/', '');  
			setcookie ('admin_flag', '', 0, '/', ''); 
			setcookie ('admin_logintime', '', 0, '/', '');
			redirectAdmin ('SingleUser', SITE_URL.'admin/login.php');
		}	

		//$num = $this->db->num((((('select ID from admin where Name=\''.$u_name).'\' and Rnd=\'').$u_rnd).'\' and Checked=1  limit 1'));
		$num = $this->db->num((((('select ID from admin where ID=\''.$u_id).'\' and Rnd=\'').$u_rnd).'\' and Checked=1  limit 1'));
		if (!$num)
		{
			setcookie ('admin_userid', '', 0, '/', '');
			setcookie ('admin_username', '', 0, '/', '');			
			setcookie ('admin_groupid', '', 0, '/', '');			
			setcookie ('admin_groupname', '', 0, '/', '');		
			setcookie ('admin_rnd', '', 0, '/', '');  
			setcookie ('admin_flag', '', 0, '/', ''); 
			setcookie ('admin_logintime', '', 0, '/', '');
			redirectAdmin ('LoginClock', SITE_URL.'admin/login.php');
		}
		
		if ($u_logintime){
			if (((EXIT_TIME * 60) < (time () - $u_logintime))){
				//登陆如果超时，则清空cookie值,然后弹出超时信息
				setcookie ('admin_userid', '', 0, '/', '');
				setcookie ('admin_username', '', 0, '/', '');			
				setcookie ('admin_groupid', '', 0, '/', '');			
				setcookie ('admin_groupname', '', 0, '/', '');		
				setcookie ('admin_rnd', '', 0, '/', '');  
				setcookie ('admin_flag', '', 0, '/', ''); 
				setcookie ('admin_logintime', '', 0, '/', '');   
				redirectAdmin ('LoginTime', SITE_URL.'admin/login.php');
			}
			//检测了就要更新登陆时间，这样用户处理激活状态一直不会超时
			$set = setcookie ('admin_logintime', time (), 0, '/', '');		
		}							
	}
	public function u_make_password ($pw_length){
		$low_ascii_bound = 50;
		$upper_ascii_bound = 122;
		$notuse = array (58, 59, 60, 61, 62, 63, 64, 73, 79, 91, 92, 93, 94, 95, 96, 108, 111);
		$i = 1;
		while (($i < $pw_length))
		{
			mt_srand (((double)microtime () * 1000000));
			$randnum = mt_rand ($low_ascii_bound, $upper_ascii_bound);
			if (!in_array ($randnum, $notuse))
			{
				$password1 = ($password1.chr ($randnum));
				++$i;
				continue;
			}
		}	
		return $password1;
	}
	public function u_check_power($power_code="",$act="View"){//$act:View:查看权限,Edit:修改权限		
		$u_groupid = (int)$this->u_groupid;
		$sql = "SELECT ID FROM power WHERE GroupID=".$u_groupid." and Code='".$power_code."'";
		$sql .= ($act=='View')?" and View=1":"";
		$sql .= ($act=='Edit')?" and Edit=1":"";
		$num_power = $this->db->num($sql);
		if(!$num_power){
			redirectAdmin ('NotLevel', 'history.go(-1)');	
		}
	}
	
	//ajax检测是否登录用
	public function ajax_u_is_login ($isadmin="")//$isadmin='admin':表示要求验证必须是管理员登录，不是则提示无权限
	{				
		$res['msg'] = 0;
		
		$u_id = (int)$this->u_id;
		$u_name = doAddslashes ($this->u_name);
		$u_groupid = (int)$this->u_groupid;
		$u_rnd = doAddslashes ($this->u_rnd);
		$u_flag = (int)$this->u_flag;
		$u_logintime = $this->u_logintime;
		
		if ((!$u_id OR !$u_name)){
			//redirectAdmin ('NotLogin', SITE_URL.'admin/login.php');
			$res['info'] = 'NotLogin';
			return $res;
		}
		if($isadmin=="admin" && $u_flag!=1){
			//redirectAdmin ('NotLevel', 'history.go(-1)'); 
			$res['info'] = 'NotLevel';
			return $res;  
		}
		//$num = $this->db->num((((('select ID from admin where Name=\''.$u_name).'\' and Rnd=\'').$u_rnd).'\'  limit 1'));
		$num = $this->db->num((((('select ID from admin where ID=\''.$u_id).'\' and Rnd=\'').$u_rnd).'\'  limit 1'));
		if (!$num)
		{			
			setcookie ('admin_userid', '', 0, '/', '');
			setcookie ('admin_username', '', 0, '/', '');			
			setcookie ('admin_groupid', '', 0, '/', '');			
			setcookie ('admin_groupname', '', 0, '/', '');		
			setcookie ('admin_rnd', '', 0, '/', '');  
			setcookie ('admin_flag', '', 0, '/', ''); 
			setcookie ('admin_logintime', '', 0, '/', '');
			//redirectAdmin ('SingleUser', SITE_URL.'admin/login.php');
			$res['info'] = 'SingleUser';
			return $res;
		}	

		//$num = $this->db->num((((('select ID from admin where Name=\''.$u_name).'\' and Rnd=\'').$u_rnd).'\' and Checked=1  limit 1'));
		$num = $this->db->num((((('select ID from admin where ID=\''.$u_id).'\' and Rnd=\'').$u_rnd).'\' and Checked=1  limit 1'));
		if (!$num)
		{
			setcookie ('admin_userid', '', 0, '/', '');
			setcookie ('admin_username', '', 0, '/', '');			
			setcookie ('admin_groupid', '', 0, '/', '');			
			setcookie ('admin_groupname', '', 0, '/', '');		
			setcookie ('admin_rnd', '', 0, '/', '');  
			setcookie ('admin_flag', '', 0, '/', ''); 
			setcookie ('admin_logintime', '', 0, '/', '');
			//redirectAdmin ('LoginClock', SITE_URL.'admin/login.php');
			$res['info'] = 'LoginClock';
			return $res;
		}
		
		if ($u_logintime){
			if (((EXIT_TIME * 60) < (time () - $u_logintime))){
				//登陆如果超时，则清空cookie值,然后弹出超时信息
				setcookie ('admin_userid', '', 0, '/', '');
				setcookie ('admin_username', '', 0, '/', '');			
				setcookie ('admin_groupid', '', 0, '/', '');			
				setcookie ('admin_groupname', '', 0, '/', '');		
				setcookie ('admin_rnd', '', 0, '/', '');  
				setcookie ('admin_flag', '', 0, '/', ''); 
				setcookie ('admin_logintime', '', 0, '/', '');   
				//redirectAdmin ('LoginTime', SITE_URL.'admin/login.php');
				$res['info'] = 'LoginTime';
				return $res;
			}
			//检测了就要更新登陆时间，这样用户处理激活状态一直不会超时
			$set = setcookie ('admin_logintime', time (), 0, '/', '');				
		}		
		$res['msg'] = 1;
		return $res;					
	}
	
	
	//ajax检测操作权限
	public function ajax_u_check_power($power_code="",$act="View"){//$act:View:查看权限,Edit:修改权限		
		$res['msg'] = 0;
		$u_groupid = (int)$this->u_groupid;
		$sql = "SELECT ID FROM power WHERE GroupID=".$u_groupid." and Code='".$power_code."'";
		$sql .= ($act=='View')?" and View=1":"";
		$sql .= ($act=='Edit')?" and Edit=1":"";
		//echo $sql;exit;
		$num_power = $this->db->num($sql);
		if(!$num_power){
			$res['info'] = 'NotLevel';
			return $res;
		}
		$res['msg'] = 1;
		return $res;
	}
}
?>