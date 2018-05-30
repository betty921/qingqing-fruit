<?php



//  控制台 
function navControl($act=0)
{
    $liFormat = '<li class="%s">
							<a href="?c=index&m=showIndex">
								<i class="icon-dashboard"></i>
								<span class="menu-text">  控制台 </span>
							</a>
						</li>';
    if($act == 1) {
        $li = sprintf($liFormat, 'active');
    }
    else
        $li = sprintf($liFormat, '');
    return $li;
}

//颜色
function navColor($act=0)
{
    $liFormat = '<li class="%s">
							<a href="/testPHP/hibuy/backend/?c=Color&m=showAddColor" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 颜色管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="/testPHP/hibuy/backend/?c=Color&m=showAddColor">
										<i class="icon-double-angle-right"></i>
										添加商品颜色
									</a>
								</li>

								<li class="%s">
									<a href="/testPHP/hibuy/backend/?c=Color&m=showListColor">
										<i class="icon-double-angle-right"></i>
										商品颜色列表
									</a>
								</li>
    		
    		 					
							</ul>
						</li>';
    if($act == 1)
        $li = sprintf($liFormat, 'active open', 'active', '');
    else if($act == 2)
        $li = sprintf($liFormat, 'active open', '', 'active');
    else
        $li = sprintf($liFormat, '', '', '','');
    return $li;
}

// 尺码
function navSize($act=0)
{
    $liFormat = '<li class="%s">
							<a href="?c=Size&m=showAddSize" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text"> 尺寸管理</span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="?c=Size&m=showAddSize">
										<i class="icon-double-angle-right"></i>
										添加商品尺寸
									</a>
								</li>

								<li class="%s">
									<a href="?c=Size&m=showListSize">
										<i class="icon-double-angle-right"></i>
										商品尺寸列表
									</a>
								</li>
							</ul>
						</li>';
    if($act == 1)
        $li = sprintf($liFormat, 'active open', 'active', '');
    else if($act == 2)
        $li = sprintf($liFormat, 'active open', '', 'active');
    else
        $li = sprintf($liFormat, '', '', '');
    return $li;
}

// 商品分类管理
function navProductCategory($act=0)
{
    $liFormat = '<li class="%s">
							<a href="?c=Category&m=showAddCategory" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text">商品分类管理  </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="?c=Category&m=showAddCategory">
										<i class="icon-double-angle-right"></i>
										添加商品分类
									</a>
								</li>

								<li class="%s">
									<a href="?c=Category&m=showListCategory">
										<i class="icon-double-angle-right"></i>
										商品分类列表
									</a>
								</li>
							</ul>
						</li>';
    if($act == 1)
        $li = sprintf($liFormat, 'active open', 'active', '');
    else if($act == 2)
        $li = sprintf($liFormat, 'active open', '', 'active');
    else
        $li = sprintf($liFormat, '', '', '');
    return $li;
}

//潮流穿搭

function navDress($act=0){
	
	$liFormat = '<li class="%s">
							<a href="?c=Dress&m=showAddDress" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text">潮流穿搭分类管理  </span>
	
								<b class="arrow icon-angle-down"></b>
							</a>
	
							<ul class="submenu">
								<li class="%s">
									<a href="?c=Dress&m=showAddDress">
										<i class="icon-double-angle-right"></i>
										添加潮流穿搭分类
									</a>
								</li>
	
								<li class="%s">
									<a href="?c=Dress&m=showListDress">
										<i class="icon-double-angle-right"></i>
										潮流穿搭分类列表
									</a>
								</li>
							</ul>
						</li>';
	if($act == 1)
		$li = sprintf($liFormat, 'active open', 'active', '');
	else if($act == 2)
		$li = sprintf($liFormat, 'active open', '', 'active');
	else
		$li = sprintf($liFormat, '', '', '');
	return $li;
}

//每周流行分类
function navPopular($act=0){
	
	$liFormat = '<li class="%s">
							<a href="?c=Popular&m=showAddPopular" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text">每周流行分类管理  </span>
	
								<b class="arrow icon-angle-down"></b>
							</a>
	
							<ul class="submenu">
								<li class="%s">
									<a href="?c=Popular&m=showAddPopular">
										<i class="icon-double-angle-right"></i>
										添加每周流行分类
									</a>
								</li>
	
								<li class="%s">
									<a href="?c=Popular&m=showListPopular">
										<i class="icon-double-angle-right"></i>
										每周流行分类列表
									</a>
								</li>
							</ul>
						</li>';
	if($act == 1)
		$li = sprintf($liFormat, 'active open', 'active', '');
	else if($act == 2)
		$li = sprintf($liFormat, 'active open', '', 'active');
	else
		$li = sprintf($liFormat, '', '', '');
	return $li;
}

//商品样式

function navStyle($act=0){

	$liFormat = '<li class="%s">
							<a href="?c=Style&m=showAddStyle" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text">商品样式表 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="?c=Style&m=showAddStyle">
										<i class="icon-double-angle-right"></i>
										添加商品样式
									</a>
								</li>

								<li class="%s">
									<a href="?c=Style&m=showListStyle">
										<i class="icon-double-angle-right"></i>
										商品样式列表
									</a>
								</li>
							</ul>
						</li>';
	if($act == 1)
		$li = sprintf($liFormat, 'active open', 'active', '');
	else if($act == 2)
		$li = sprintf($liFormat, 'active open', '', 'active');
	else
		$li = sprintf($liFormat, '', '', '');
	return $li;
}
//商品
function navProduct($act=0){
	$liFormat = '<li class="%s">
							<a href="?c=Product&m=showAddProduct" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text">总商品表 </span>
	
								<b class="arrow icon-angle-down"></b>
							</a>
	
							<ul class="submenu">
								<li class="%s">
									<a href="?c=Product&m=showAddProduct">
										<i class="icon-double-angle-right"></i>
										添加商品
									</a>
								</li>
	
								<li class="%s">
									<a href="?c=Product&m=showListProduct">
										<i class="icon-double-angle-right"></i>
										商品列表
									</a>
								</li>
							</ul>
						</li>';
	if($act == 1)
		$li = sprintf($liFormat, 'active open', 'active', '');
	else if($act == 2)
		$li = sprintf($liFormat, 'active open', '', 'active');
	else
		$li = sprintf($liFormat, '', '', '');
	return $li;
}
//轮播图
function navLunbo($act=0){
	$liFormat = '<li class="%s">
							<a href="?c=Lunbo&m=showAddLunbo" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text">轮播图表 </span>
	
								<b class="arrow icon-angle-down"></b>
							</a>
	
							<ul class="submenu">
								<li class="%s">
									<a href="?c=Lunbo&m=showAddLunbo">
										<i class="icon-double-angle-right"></i>
										添加轮播图
									</a>
								</li>
	
								<li class="%s">
									<a href="?c=Lunbo&m=showListLunbo">
										<i class="icon-double-angle-right"></i>
										轮播图列表
									</a>
								</li>
			
							
							</ul>
						</li>';
	if($act == 1)
		$li = sprintf($liFormat, 'active open', 'active', '');
	else if($act == 2)
		$li = sprintf($liFormat, 'active open', '', 'active');
	
	else
		$li = sprintf($liFormat, '', '', '');
	return $li;
}
//热点文章
function navArticle($act=0){
	
	$liFormat = '<li class="%s">
							<a href="?c=Article&m=AddArticle" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text">热点文章管理 </span>
	
								<b class="arrow icon-angle-down"></b>
							</a>
	
							<ul class="submenu">
								<li class="%s">
									<a href="?c=Article&m=AddArticle">
										<i class="icon-double-angle-right"></i>
										添加文章内容
									</a>
								</li>
	
								<li class="%s">
									<a href="?c=Article&m=showListArticle">
										<i class="icon-double-angle-right"></i>
										文章内容查看
									</a>
								</li>
		
				
							</ul>
						</li>';
	if($act == 1)
		$li = sprintf($liFormat, 'active open', 'active', '');
	else if($act == 2)
		$li = sprintf($liFormat, 'active open', '', 'active');
	
	else
		$li = sprintf($liFormat, '', '', '');
	return $li;
	
}

function navMenu($page, $active)
{
    $menu = [
        'navControl',
        'navColor',
        'navSize',
        'navProductCategory',
    	'navDress',
    	'navPopular',
    	'navStyle',
    	'navProduct',
    	'navLunbo',
    	'navArticle'
    ];
    foreach ($menu as $m) {
        if($m == $page)
            echo $m($active);
        else
            echo $m(0);
    }
}