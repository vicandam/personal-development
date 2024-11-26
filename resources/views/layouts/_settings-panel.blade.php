<div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
<div id="theme-settings" class="settings-panel">
    <i class="settings-close mdi mdi-close"></i>
    <p class="settings-heading">SIDEBAR SKINS</p>
    <div onclick="javascript: changeTheme('sidebar', 'default')" class="sidebar-bg-options {{auth()->user()->sidebar_skin != 'sidebar-dark' ? 'selected' : ''}}" id="sidebar-default-theme">
        <div class="img-ss rounded-circle bg-light border me-3"></div>Default
    </div>
    <div onclick="javascript: changeTheme('sidebar', 'sidebar-dark')" class="sidebar-bg-options {{auth()->user()->sidebar_skin == 'sidebar-dark' ? 'selected' : ''}}" id="sidebar-dark-theme">
        <div class="img-ss rounded-circle bg-dark border me-3"></div>Dark
    </div>
    <p class="settings-heading mt-2">HEADER SKINS</p>
    <div class="color-tiles mx-0 px-4">
        <div onclick="javascript: changeTheme('header', 'navbar-primary')" class="tiles default primary"></div>
        <div onclick="javascript: changeTheme('header', 'navbar-success')" class="tiles success"></div>
        <div onclick="javascript: changeTheme('header', 'navbar-warning')" class="tiles warning"></div>
        <div onclick="javascript: changeTheme('header', 'navbar-danger')" class="tiles danger"></div>
        <div onclick="javascript: changeTheme('header', 'navbar-info')" class="tiles info"></div>
        <div onclick="javascript: changeTheme('header', 'navbar-dark')" class="tiles dark"></div>
        <div onclick="javascript: changeTheme('header', 'navbar-light')" class="tiles light"></div>
    </div>
</div>
