<?php
/**
 * 引入外部HTML
 *
 * 处理编辑的外部内容
 *
 * @package		User
 * @author		indraw <indraw@163.com>
 * @date		2013.06.19
 * @copyright	Copyright (c) 2013 - 2014 赛尔互联
 * @link		http://www.eol.cn
 * @since		Version 1.0
 */
function smarty_function_include_edit($params, $template)
{
	//引入配置文件
    include(APPPATH."/config/app_config.php");
    $compile_dir = APPPATH."templates_c";
    
    $edit_url = $config['app_edit_url']."/".$params['url'];  //缓存文件
    $edit_time = $config['app_edit_time'] * 60;             //缓存时间
    
    //如果页面设置时间，使用页面设置的时间
    if(@$params['time'] >= 1)
		$edit_cache = $params['time'] * 60;
    $edit_cache = $compile_dir."/".md5($edit_url).".edit.".$params['url'];

	//var_dump(time());
	//var_dump(filemtime($edit_cache));
	//var_dump($edit_time);
	//更新缓存
    if(!file_exists($edit_cache) or (time()-filemtime($edit_cache)) > $edit_time  )
    {
	    $re = file_get_contents($edit_url);
	    file_put_contents($edit_cache,$re);
	}
	if(!$re = file_get_contents($edit_cache))
	{
	    $re = file_get_contents($edit_url);
	}
    
    return $re;
    
}

?>
