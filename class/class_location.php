<?PHP
class Location
{
	private $_id = '';
	private $_db = null;
	
	public function __construct($db=null){
		$this->_db = $db;
	}
	
	/**
	* 获取省/市/县的名称
	*
	* @access public
	* @param $id 国标码
	* @return array
	*/
	public function getLocationName ($id){
		$aResult = array();
		$province = substr($id,0,2).'0000';
		if($province=='110000' || $province=='120000' || $province=='310000' || $province=='500000'){
			$city = $id;
		}
		else{
			$city = substr($id,0,4).'00';
		}				
		$sql = "SELECT (SELECT Name FROM Location WHERE ID='".$province."') as ProvinceName,(SELECT Name FROM Location WHERE ID='".$city."') as CityName,(SELECT Name FROM Location WHERE ID='".$id."') as LocationName,(SELECT FullName FROM Location WHERE ID='".$id."') as FullName";
		$aResult = $this->_db->fetchRow($sql);
		return $aResult;
	}
	
	/**
	* 获取省列表
	*
	* @access public
	* @param $id 国标码
	* @return array
	*/
	public function getProvinceList (){
		$aResult = array();
		//$sql = "SELECT ID,Name FROM Location WHERE right(ID,4)='0000' ORDER BY ID asc";
		$sql = "SELECT ID,Name FROM Location WHERE right(ID,4)='0000' and left(ID,2)<>'71' and left(ID,2)<>'81' and left(ID,2)<>'82' and left(ID,2)<>'91' and left(ID,2)<>'99' ORDER BY ID asc";
		//$sql = "SELECT ID,Name FROM Location WHERE right(ID,4)='0000' and left(ID,2)<>'91' and left(ID,2)<>'99' ORDER BY ID asc";
		$query = $this->_db->query($sql);
		$provinceArr = $this->_db->fetch($query);
		return $provinceArr;
	}

	/**
	* 获取城市列表
	*
	* @access public
	* @param $id 国标码
	* @return array
	*/
	public function getCityList ($province){
		$aResult = array();
		$left_2 = substr($province,0,2);
		if($province=='110000' || $province=='120000' || $province=='310000' || $province=='500000'){
			$sql = "SELECT ID,Name FROM Location WHERE left(ID,2)='".$left_2."' and ID<>'".$province."' ORDER BY ID asc";		
		}
		else{
			$sql = "SELECT ID,Name FROM Location WHERE left(ID,2)='".$left_2."' and right(ID,2)='00' and ID<>'".$province."' ORDER BY ID asc";
		}
		$query = $this->_db->query($sql);
		$cityArr = $this->_db->fetch($query);
		return $cityArr;
	}	
}
?>