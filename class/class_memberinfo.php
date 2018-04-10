<?PHP
class MemberInfo
{
	public $member_id = '';
	public $member_name = '';
	public $member_type = '';//用户类型值：1|2|3，一个用户可能多个值,会员类型，1：玩家，2：房主，3：代理商
	public $member_type_name_arr = array(1=>'玩家',2=>'房主',3=>'代理商');
	//public $member_rnd = '';
	public $member_flag = '';//用户状态
	private $db = null;
	
	public function __construct($db=null){
		$this->member_id = !empty($_COOKIE['member_userid'])?$_COOKIE['member_userid']:'';
		$this->member_name = !empty($_COOKIE['member_username'])?$_COOKIE['member_username']:'';
		$this->member_type = !empty($_COOKIE['member_type'])?$_COOKIE['member_type']:'';
		//$this->member_rnd = !empty($_COOKIE['member_rnd'])?$_COOKIE['member_rnd']:'';
		$this->member_flag = !empty($_COOKIE['member_flag'])?$_COOKIE['member_flag']:'';
		$this->member_logintime = !empty($_COOKIE['member_logintime'])?$_COOKIE['member_logintime']:'';
		$this->db = $db;
	}
	
	public function member_login ($username,$password,$remember=0){
		require_once (SYS_ROOT . "admin/include/message.php");
		$username = doAddslashes ($username);
		$password = doAddslashes ($password);
		$result['REV'] = false;
		if (!$username OR !$password ){
			$result['MSG'] = $message_r['EmptyInput'];
			return $result;
		}		
		if($remember){//记住用户名(7天)
			setcookie ('member_username', $username, (time()+7*24*3600), '/', '');
		}
		//判断登陆不成功次数是否超限
		if ($_COOKIE['member_lastlogintime']){
			if ((time () - $_COOKIE['member_lastlogintime']) < (LOGIN_TIME * 60)){
			  if ((LOGIN_NUM-1) < $_COOKIE['member_loginnum']){
				$result['MSG'] = $message_r['LoginOutNum'];
				return $result;
			  }
			}
			else{
			  setcookie ('member_loginnum', 0, 0, '/', '');
			}
		}
		$num = $this->db->num("select id from member where mobile='".$username."' and pwd='".md5($password)."' limit 1");
		if (!$num){//登陆不成功
			$member_loginnum = $_COOKIE['member_loginnum'];//登录不成功次数
			if (empty ($member_loginnum)){
				$member_loginnum = 0;
			}		
			$logintime = time();		  		
			++$member_loginnum;
			setcookie ('member_loginnum', $member_loginnum, ($logintime + 86400), '/', '');
			setcookie ('member_lastlogintime', $logintime, ($logintime + 86400), '/', '');
			$result['MSG'] = $message_r['LoginFail'];
			return $result;
		}
		
		//判断用户是否被锁定
		$num = $this->db->num("select id from member where mobile='".$username."' and pwd='".md5($password)."' and status=1 limit 1");
		if (!$num){
			$result['MSG'] = $message_r['LoginClock'];
			return $result;
		}
		
		//查询用户信息
		$r = $this->db->fetchRow ("select id,mobile,status from member where mobile='".$username."' and pwd='".md5($password)."' limit 1");
		//查询会员类型表
		$membertype_arr = array();//用户类型值,一个用户可能多个值,会员类型，1：玩家，2：房主，3：代理商
		$query = $this->db->query("select id,member_type from member_type where member_id='".$r['id']."'");
		$r_member_type = $this->db->fetch($query);
		if($r_member_type){
			foreach($r_member_type as $key=>$info){
				$membertype_arr[] = $info['member_type'];		
			}
		}
		else{
			$membertype_arr[0] = 1;
		}
		
		//$rnd = $this->member_make_password (20);
		$loginip = getIP();
		$now_time = time();
		////设置cookie，更新rnd随机码和登陆时间及登陆时的IP
		//$this->db->query("UPDATE member set Rnd='".$rnd."',login_ip='".$loginip."',login_time=".$now_time." where mobile='".$username."'");
		$this->db->query("UPDATE member set login_ip='".$loginip."',login_time=".$now_time." where id='".$r['id']."'");
		$set1 = setcookie ('member_userid', $r['id'], 0, '/', '');
		$set2 = setcookie ('member_username', $r['mobile'], 0, '/', '');		
		setcookie ('member_type', implode("|", $membertype_arr), 0, '/', '');		
		//$set3 = setcookie ('member_rnd', $rnd, 0, '/', '');
		setcookie ('member_flag', $r['status'], 0, '/', '');
		setcookie ('member_logintime', time (), 0, '/', '');
		//if ((($set1 AND $set2) AND $set3)){
		if ($set1 AND $set2){
			$result['REV'] = true;
			$result['MSG'] = $message_r['LoginSuccess'];
			$result['DATA'] = $membertype_arr;
			return $result;
		}
		else{
			$result['MSG'] = $message_r['NotCookie'];
			return $result;			
		}
	}
	
	public function member_loginout ()
	{
	    $member_id = (int)$this->member_id;
	    $member_name = doAddslashes($this->member_name);		
		if ((!$member_id || !$member_name))
	    {
	    	redirect ('NotLogin', SITE_URL.'index.php');
	    }	    
		setcookie ('member_userid', '', 0, '/', '');
		setcookie ('member_username', '', 0, '/', '');			
		setcookie ('member_type', '', 0, '/', '');			
		//setcookie ('member_rnd', '', 0, '/', ''); 
		setcookie ('member_flag', '', 0, '/', '');
		setcookie ('member_logintime', '', 0, '/', '');  
		//$rnd = $this->member_make_password (20);
	    //$this->db->query ((((((''.'UPDATE member set Rnd=\'').$rnd).'\' where id=\'').$member_id).'\''));
	    redirect ('ExitSuccess', SITE_URL.'index.php');
	}	
	public function member_is_login ($check_member_type=0)//检测用户类型值，1：玩家，2：房主，3：代理商
	{				
		$member_id = (int)$this->member_id;
		$member_name = doAddslashes ($this->member_name);
		$member_type = $this->member_type;
		//$member_rnd = doAddslashes ($this->member_rnd);
		$member_flag = (int)$this->member_flag;
		$member_logintime = $this->member_logintime;
		if ((!$member_id OR !$member_name)){
			redirect ('NotLogin', SITE_URL.'index.php');
		}
		/*$num = $this->db->num((((('select id from member where id=\''.$member_id).'\' and Rnd=\'').$member_rnd).'\'  limit 1'));
		if (!$num){			
			setcookie ('member_userid', '', 0, '/', '');
			setcookie ('member_username', '', 0, '/', '');			
			setcookie ('member_type', '', 0, '/', '');			
			setcookie ('member_rnd', '', 0, '/', '');  
			setcookie ('member_flag', '', 0, '/', ''); 
			setcookie ('member_logintime', '', 0, '/', '');
			redirect ('SingleUser', SITE_URL.'index.php');
		}*/	

		//$num = $this->db->num((((('select id from member where id=\''.$member_id).'\' and Rnd=\'').$member_rnd).'\' and status=1  limit 1'));
		$num = $this->db->num((('select id from member where id=\''.$member_id).'\' and status=1  limit 1'));
		if (!$num){
			setcookie ('member_userid', '', 0, '/', '');
			setcookie ('member_username', '', 0, '/', '');			
			setcookie ('member_type', '', 0, '/', '');			
			//setcookie ('member_rnd', '', 0, '/', '');  
			setcookie ('member_flag', '', 0, '/', ''); 
			setcookie ('member_logintime', '', 0, '/', '');
			redirect ('LoginClock', SITE_URL.'index.php');
		}
		
		//检测用户类型不为空，则判断登录用户是否具有该用户类型（一个用户可能多个值）
		if ($check_member_type){
			$member_type_arr = empty($member_type)?array():explode('|', $member_type);
			if (!in_array($check_member_type, $member_type_arr)) {
				setcookie ('member_userid', '', 0, '/', '');
				setcookie ('member_username', '', 0, '/', '');			
				setcookie ('member_type', '', 0, '/', '');			
				//setcookie ('member_rnd', '', 0, '/', '');  
				setcookie ('member_flag', '', 0, '/', ''); 
				setcookie ('member_logintime', '', 0, '/', '');
				redirect ('非法访问，您的用户类型不是'.$this->member_type_name_arr[$check_member_type], SITE_URL.'index.php',false);
			}
		}
		
		if ($member_logintime){
			if (((EXIT_TIME * 60) < (time () - $member_logintime))){
				//登陆如果超时，则清空cookie值,然后弹出超时信息
				setcookie ('member_userid', '', 0, '/', '');
				setcookie ('member_username', '', 0, '/', '');			
				setcookie ('member_type', '', 0, '/', '');			
				setcookie ('member_flag', '', 0, '/', ''); 
				setcookie ('member_logintime', '', 0, '/', '');   
				redirect ('LoginTime', SITE_URL.'index.php');
			}
			//检测了就要更新登陆时间，这样用户处理激活状态一直不会超时
			$set = setcookie ('member_logintime', time (), 0, '/', '');		
		}							
	}
	public function member_make_password ($pw_length){
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
	
	//ajax检测是否登录用
	public function ajax_member_is_login ($check_member_type=0)//检测用户类型值，1：玩家，2：房主，3：代理商
	{				
		require_once (SYS_ROOT . "admin/include/message.php");
		$res['REV'] = 0;
		
		$member_id = (int)$this->member_id;
		$member_name = doAddslashes ($this->member_name);
		$member_type = $this->member_type;
		//$member_rnd = doAddslashes ($this->member_rnd);
		$member_flag = (int)$this->member_flag;
		$member_logintime = $this->member_logintime;
		if ((!$member_id OR !$member_name)){
			//redirect ('NotLogin', SITE_URL.'index.php');
			$res['MSG'] = $message_r['NotLogin'];
			return $res;
		}
		/*$num = $this->db->num((((('select id from member where id=\''.$member_id).'\' and Rnd=\'').$member_rnd).'\'  limit 1'));
		if (!$num){			
			setcookie ('member_userid', '', 0, '/', '');
			setcookie ('member_username', '', 0, '/', '');			
			setcookie ('member_type', '', 0, '/', '');			
			setcookie ('member_rnd', '', 0, '/', '');  
			setcookie ('member_flag', '', 0, '/', ''); 
			setcookie ('member_logintime', '', 0, '/', '');
			//redirect ('SingleUser', SITE_URL.'index.php');
			$res['MSG'] = $message_r['SingleUser'];
			return $res;
		}*/	

		//$num = $this->db->num((((('select id from member where id=\''.$member_id).'\' and Rnd=\'').$member_rnd).'\' and status=1  limit 1'));
		$num = $this->db->num((('select id from member where id=\''.$member_id).'\' and status=1  limit 1'));
		if (!$num){
			setcookie ('member_userid', '', 0, '/', '');
			setcookie ('member_username', '', 0, '/', '');			
			setcookie ('member_type', '', 0, '/', '');			
			//setcookie ('member_rnd', '', 0, '/', '');  
			setcookie ('member_flag', '', 0, '/', ''); 
			setcookie ('member_logintime', '', 0, '/', '');
			//redirect ('LoginClock', SITE_URL.'index.php');
			$res['MSG'] = $message_r['LoginClock'];
			return $res;
		}
		
		//检测用户类型不为空，则判断登录用户是否具有该用户类型（一个用户可能多个值）
		if ($check_member_type){
			$member_type_arr = empty($member_type)?array():explode('|', $member_type);
			if (!in_array($check_member_type, $member_type_arr)) {
				setcookie ('member_userid', '', 0, '/', '');
				setcookie ('member_username', '', 0, '/', '');			
				setcookie ('member_type', '', 0, '/', '');			
				//setcookie ('member_rnd', '', 0, '/', '');  
				setcookie ('member_flag', '', 0, '/', ''); 
				setcookie ('member_logintime', '', 0, '/', '');
				//redirect ('非法访问，您的用户类型不是'.$this->member_type_name_arr[$check_member_type], SITE_URL.'index.php',false);
				$res['MSG'] = '非法访问，您的用户类型不是'.$this->member_type_name_arr[$check_member_type];
				return $res;
			}
		}
		
		if ($member_logintime){
			if (((EXIT_TIME * 60) < (time () - $member_logintime))){
				//登陆如果超时，则清空cookie值,然后弹出超时信息
				setcookie ('member_userid', '', 0, '/', '');
				setcookie ('member_username', '', 0, '/', '');			
				setcookie ('member_type', '', 0, '/', '');			
				setcookie ('member_flag', '', 0, '/', ''); 
				setcookie ('member_logintime', '', 0, '/', '');   
				//redirect ('LoginTime', SITE_URL.'index.php');
				$res['MSG'] = $message_r['LoginTime'];
				return $res;
			}
			//检测了就要更新登陆时间，这样用户处理激活状态一直不会超时
			$set = setcookie ('member_logintime', time (), 0, '/', '');		
		}	
		$res['REV'] = 1;
		return $res;						
	}
}
?>