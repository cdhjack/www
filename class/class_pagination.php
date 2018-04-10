<?php  if ( ! defined('SYS_ROOT')) exit('No direct script access allowed');

class MYPagination {
	public $page = 1;         //当前页
	public $rows = 0;         //总条数
	public $perseg = 5;       //每段页数
	public $perpage = 10;     //每页条数
	public $href = "";        //条件传递
	
	private $pages = 0;       //总页数
	private $lastseg = 0;     //上段开始页号
	private $nextseg = 0;     //下段开始页号

	function __construct()
	{
		
	}
	
	/*
	-----------------------------------------------------------
	函数名称：get_begin
	简要描述：获取开始行
	输出：int
	-----------------------------------------------------------
	*/
	function get_begin()
	{
		//if (intval($this->page) > $this->get_pages())
		if (intval($this->page) > $this->get_pages() && $this->get_pages()>0)
		{
			$this->page = $this->pages;
		}
		if(intval($this->page) < 1)
		{
			$this->page = 1;
		}
		return $this->perpage * ($this->page - 1);
	}

	/*
	-----------------------------------------------------------
	函数名称：create_link
	简要描述：分页处理函数
	输出：string
	-----------------------------------------------------------
	*/
	function create()
	{
		$this->get_pages();
		if ($this->pages <= 1)
		{
			return "<span>第 {$this->pages} 页/共 {$this->pages} 页</span>";
		}
		else
		{
			$segment = $this->get_segment();		
			
			//$link_str = $this->lastseg >= 1 ? $this->get_item('首页', 1) . ' ' . $this->get_item('&lt;&lt;', $this->lastseg) : '';
			$link_str = $this->get_item('&lt;上一页', (($this->page-1)>0)?($this->page-1):1);
			$link_str .= $segment;
			//$link_str .= $this->nextseg <= $this->pages ? $this->get_item('&gt;&gt;', $this->nextseg) . ' ' . $this->get_item('末页', $this->pages) : '';
			$link_str .= $this->get_item('下一页&gt;', (($this->page+1)>$this->pages)?$this->pages:($this->page+1));
			//$link_str .= " 第{$this->page}页/共{$this->pages}页";
			
			return $link_str;
		}
	}//end func
	
	/*
	-----------------------------------------------------------
	函数名称：get_pages
	简要描述：分页处理函数
	输出：string
	-----------------------------------------------------------
	*/
	function get_pages()
	{
		if ( ! $this->pages)
			$this->pages = ceil($this->rows / $this->perpage);
		return $this->pages;
	}
	
	/*
	-----------------------------------------------------------
	函数名称：get_item()
	简要描述：获取每一个链接
	输出：string
	-----------------------------------------------------------
	*/
	function get_item($link_name, $page_num)
	{		
		if (strpos($this->href, '?') === false)
		{
			list($uri,) = explode('?', $_SERVER['REQUEST_URI']);
			$this->href = $uri . '?' . ($this->href === '' ? '' : $this->href . '&');
		}
		return str_replace(array('%page_num%', '%link_name%'), array($page_num, $link_name), '<a href="' . $this->href  . 'page=%page_num%' . '">%link_name%</a>');
	}
	
	/*
	-----------------------------------------------------------
	函数名称：get_segment()
	简要描述：获取每个分段
	输出：string
	-----------------------------------------------------------
	*/
	function get_segment()
	{
		$link_str = '';
		
		$start = floor(($this->page - 1) / $this->perseg) * $this->perseg + 1;
		$end = min($this->pages, floor(($this->page - 1) / $this->perseg) * $this->perseg + $this->perseg);
		
		$this->lastseg = (floor(($this->page - 1) / $this->perseg) - 1) * $this->perseg + 1;
		$this->nextseg = (floor(($this->page - 1) / $this->perseg) + 1) * $this->perseg + 1;
		
		for ($i = $start;$i <= $end;$i ++)
		{
			$link_str .= ' ' . ($i == $this->page ? '<a href="javascript:;" class="onPage">' . $i . '</a>' : $this->get_item($i, $i));
		}
		return $link_str . ' ';
	}

}
//-----------------------------------------------------------------------------
//end