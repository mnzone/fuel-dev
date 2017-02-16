<ul class="nav nav-list">
    <li<?= \Input::uri() == '/ea/job/publish' ? ' class="active"' : '' ?>>
        <a href="/ea/job/publish">
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> 发布职位 </span>
        </a>

        <b class="arrow"></b>
    </li>
    <li<?= \Input::uri() == '/ea/job' ? ' class="active"' : '' ?>>
        <a href="/ea/job">
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> 职位管理 </span>
        </a>

        <b class="arrow"></b>
    </li>
    <li<?= \Input::uri() == '/ea/candidate' ? ' class="active"' : '' ?>>
        <a href="/ea/candidate">
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> 报名列表 </span>
        </a>

        <b class="arrow"></b>
    </li>
    <li<?= \Input::uri() == '/tools/init_cache' ? ' class="active"' : '' ?>>
        <a href="/tools/init_cache">
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> 更新缓存 </span>
        </a>

        <b class="arrow"></b>
    </li>
</ul><!-- /.nav-list -->
