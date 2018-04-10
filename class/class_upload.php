<?PHP
class Upload
{
	private $_maxSize = 13;//最大文件大小(M)
	//定义允许上传的文件扩展名
	private $_extArr = array(
				'image' => array('gif', 'jpg', 'jpeg', 'png', 'bmp'),
				'flash' => array('swf', 'flv'),
				'media' => array('swf', 'flv', 'mp3', 'wav', 'wma', 'wmv', 'mid', 'avi', 'mpg', 'asf', 'rm', 'rmvb'),
				'file' => array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'htm', 'html', 'txt', 'zip', 'rar', 'gz', 'bz2', 'apk'));
	private $_savePath = '';//上传文件保存目录路径（如d:/www/website/uploadfile/）
	private $_saveUrl = '';//保存文件的文件夹(如uploadfile/)
	
	public function __construct($sysRoot='',$folderPath='uploadfile/'){//$sysRoot:站点根目录文件路径，$folder:在站点根目录下，保存上传文件的文件夹
		$savePath = $sysRoot.$folderPath;
		$this->_savePath = realpath($savePath). '/';
		$this->_saveUrl = $folderPath;
	}	
	
	/**
	* 文件上传
	*
	* @access public
	* @param $postName 文件上传时input的name名值
	* @param $dirName 文件保存时的目录名(文件夹名必须在$this->_extArr数组中，即image/flash/media/file)
	* @param $fileName 文件上传到服务器上存储的文件名（不包括文件扩展名）
	* @return array  msg:0失败,1成功  info:提示信息
	*/
	public function doUpload ($postName,$dirName='image',$fileName=''){
		$result = array();
		$result['msg'] = 0;
		//PHP上传失败
		if (!empty($_FILES[$postName]['error'])) {
			switch($_FILES[$postName]['error']){
				case '1':
					$result['info'] = '超过php.ini允许的大小。';
					break;
				case '2':
					$result['info'] = '超过表单允许的大小。';
					break;
				case '3':
					$result['info'] = '图片只有部分被上传。';
					break;
				case '4':
					$result['info'] = '请选择上传文件。';
					break;
				case '6':
					$result['info'] = '找不到临时目录。';
					break;
				case '7':
					$result['info'] = '写文件到硬盘出错。';
					break;
				case '8':
					$result['info'] = 'File upload stopped by extension。';
					break;
				case '999':
				default:
					$result['info'] = '未知错误。';
			}
			return $result;
		}
		
		
		//有上传文件时
		if (empty($_FILES) === false) {
			//原文件名
			$file_name = $_FILES[$postName]['name'];
			//服务器上临时文件名
			$tmp_name = $_FILES[$postName]['tmp_name'];
			//文件大小
			$file_size = $_FILES[$postName]['size']/(1024*1024);
			//检查文件名
			if (!$file_name) {				
				$result['info']="请选择上传文件。";
				return $result;
			}
			//检查目录
			if (@is_dir($this->_savePath) === false) {
				$result['info']="上传目录不存在。";
				return $result;
			}
			//检查目录写权限
			if (@is_writable($this->_savePath) === false) {
				$result['info']="上传目录没有写权限。";
				return $result;
			}
			//检查是否已上传
			if (@is_uploaded_file($tmp_name) === false) {
				$result['info']="上传失败。";
				return $result;
			}
			//检查文件大小
			if ($file_size > $this->_maxSize) {
				$result['info']="上传文件大小超过限制。";
				return $result;
			}
			//检查目录名
			if (empty($this->_extArr[$dirName])) {
				$result['info']="目录名不正确。";
				return $result;
			}
			//获得文件扩展名
			$temp_arr = explode(".", $file_name);
			$file_ext = array_pop($temp_arr);
			$file_ext = trim($file_ext);
			$file_ext = strtolower($file_ext);
			
			$filePath = $this->_savePath;
			$saveUrl = $this->_saveUrl;
			//检查扩展名
			if (in_array($file_ext, $this->_extArr[$dirName]) === false) {
				$result['info']="上传文件扩展名是不允许的扩展名。\n只允许" . implode(",", $this->_extArr[$dirName]) . "格式。";
				return $result;
			}
			//创建文件夹
			if ($dirName !== '') {				
				$filePath .= $dirName . "/";				
				$saveUrl .= $dirName . "/";
				if (!file_exists($filePath)) {
					mkdir($filePath);
				}
			}
			$ymd = date("Ymd");
			$filePath .= $ymd . "/";
			$saveUrl .= $ymd . "/";
			if (!file_exists($filePath)) {
				mkdir($filePath);
			}
			
			//新文件名
			if(!empty($fileName)){//自定义的新文件名(不包括文件扩展名)
				$new_file_name = $fileName. '.' . $file_ext;			
			}
			else{
				$new_file_name = date("YmdHis") . '_' . rand(10000, 99999) . '.' . $file_ext;
			}
			
			$filePathName = $filePath.$new_file_name;
			if (file_exists($filePathName)) {
				$result['info']="保存的文件名已经存在。";
				return $result;
			}			
			
			//移动文件
			if (move_uploaded_file($tmp_name, $filePathName) === false) {
				$result['info']="上传文件失败。";
				return $result;
			}
			@chmod($filePathName, 0644);
			//$file_url = $saveUrl . $new_file_name;
			
			$result['msg'] = 1;
			$result['info']= array('path'=>$saveUrl,'name'=>$new_file_name);
		}
		return $result;
	}
}
?>