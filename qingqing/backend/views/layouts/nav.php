<?php

// 控制台
function navControl($act=0)
{
    $liFormat = '<li class="%s">
							<a href="?r=site/index">
								<i class="icon-dashboard"></i>
								<span class="menu-text"> 控制台 </span>
							</a>
						</li>';
    if($act == 1) {
        $li = sprintf($liFormat, 'active');
    }
    else
        $li = sprintf($liFormat, '');
    return $li;
}

// 商品管理
function navProduct($act=0)
{
    $liFormat = '<li class="%s">
							<a href="#" class="dropdown-toggle">
								<i class="icon-edit"></i>
								<span class="menu-text"> 商品管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li class="%s">
									<a href="?r=classification/index">
										<i class="icon-double-angle-right"></i>
										商品类别目录
									</a>
								</li>

								<li class="%s">
									<a href="?r=originplace/index">
										<i class="icon-double-angle-right"></i>
										产地管理
									</a>
								</li>
								
								<li class="%s">
									<a href="?r=standard">
										<i class="icon-double-angle-right"></i>
										规格管理
									</a>
								</li>
								<li class="%s">
									<a href="?r=product"  class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>
										商品管理
										<b class="arrow icon-angle-down"></b>
									</a>
									<ul class="submenu">
									<li class="%s">
                                            <a href="?r=product/index">
                                                <i class="icon-leaf"></i>
                                                商品列表
                                            </a>
                                        </li>
                                        <li class="%s">
                                            <a href="?r=product/add-page">
                                                <i class="icon-leaf"></i>
                                                商品添加
                                            </a>
                                        </li>
                                    </ul>
								</li>
							</ul>
						</li>';
    if($act == 1)
        $li = sprintf($liFormat, 'active open', 'active', '', '', '', '', '');
    else if($act == 2)
        $li = sprintf($liFormat, 'active open', '', 'active', '', '', '', '');
    else if($act == 3)
        $li = sprintf($liFormat, 'active open', '', '', 'active', '', '', '');
    else if($act == 4)
        $li = sprintf($liFormat, 'active open', '', '','', 'active open', 'active', '');
    else if($act == 5)
        $li = sprintf($liFormat, 'active open', '', '','', 'active open', '', 'active');
    else
        $li = sprintf($liFormat, '', '', '','',  '', '', '');
    return $li;
}

// 广告管理
function navAdv($act=0)
{
    $liFormat = '<li class="%s">
							<a href="#" class="dropdown-toggle">
								<i class="icon-edit"></i>
								<span class="menu-text"> 广告管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
							<li class="%s">
									<a href="?r=adv/index">
										<i class="icon-double-angle-right"></i>
										广告列表
									</a>
								</li>
								<li class="%s">
									<a href="?r=adv/add">
										<i class="icon-double-angle-right"></i>
										广告添加
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
        'navProduct',
        'navAdv',
    ];
    foreach ($menu as $m) {
        if($m == $page)
            echo $m($active);
        else
            echo $m(0);
    }
}