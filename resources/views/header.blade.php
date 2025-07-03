<div class="header">
    <div class="title">
        日本の禮物
        <img src="{{ asset('/img/japaneseFlag-fixed.png') }}" alt="">
    </div>
    <div class="menu-icon" onclick="openNav()">
        <span id="menu-span1"></span><span id="menu-span2"></span><span id="menu-span3"></span>
    </div>
    <div id="navOverlay" class="nav-overlay" onclick="closeNav()"></div>
    <nav id="sideNav" class="side-nav">
        <div class="close-btn" onclick="closeNav()">&times;</div>
        <div class="nav-menu" onclick="location.href='#1'">@yield('location1')</div>
        <div class="nav-menu" onclick="location.href='#2'">@yield('location2')</div>
        <div class="nav-menu" onclick="location.href='#prefectureForm'">查詢禮物</div>
        <div class="nav-menu" onclick="location.href='#4'">聯絡管理者</div>
    </nav>
</div>

