<?php 
$a_id = $_SESSION['a_id'];
$admin_table = $admin->ret("SELECT * FROM `admin` WHERE `a_id`='$a_id'");
$admin_row = $admin_table->fetch(PDO::FETCH_ASSOC);
?>
<div class="main-header">
          <div class="main-header-logo">
            <div class="logo-header" data-background-color="dark2">
              <a href="index.html" class="logo">
                <img
                  src="assets/img/kaiadmin/logo_light.svg"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="28"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar btn-hover-light">
                  <i class="gg-menu-right text-white"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler btn-hover-light">
                  <i class="gg-menu-left text-white"></i>
                </button>
              </div>
              <button class="topbar-toggler more btn-hover-light">
                <i class="gg-more-vertical-alt text-white"></i>
              </button>
            </div>
          </div>
          <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
            <div class="container-fluid">
              <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
              </nav>
              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li class="nav-item topbar-user dropdown hidden-caret">
                  <a class="dropdown-toggle profile-pic d-flex align-items-center" 
                     data-bs-toggle="dropdown"
                     href="#"
                     aria-expanded="false">
                    <div class="avatar-sm me-2">
                      <img
                        src="controller/upload/img24.jpg"
                        alt="..."
                        class="avatar-img rounded-circle border shadow-sm"
                      />
                    </div>
                    <span class="profile-username">
                      <span class="op-7 text-muted">Welcome, </span>
                      <span class="fw-bold text-dark"><?php echo $admin_row['a_name']?></span>
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn shadow-lg">
                    <div class="dropdown-user-scroll scrollbar-outer">
                      <li>
                        <div class="user-box p-4">
                          <div class="d-flex align-items-center">
                            <div class="avatar-lg me-3">
                              <img
                                src="controller/upload/img24.jpg"
                                alt="image profile"
                                class="avatar-img rounded-circle border shadow-sm"
                              />
                            </div>
                            <div class="u-text" style="min-width: 200px;">
                              <h4 class="fw-bold mb-2"><?php echo $admin_row['a_name']?></h4>
                              <p class="text-muted mb-0 text-truncate"><?php echo $admin_row['a_email']?></p>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item py-2 d-flex align-items-center" href="controller/auth.php?logout=logout">
                          <i class="fas fa-sign-out-alt me-2"></i> Logout
                        </a>
                      </li>
                    </div>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
        </div>
<style>
.btn-hover-light:hover {
    background: rgba(255,255,255,0.1);
    transition: all 0.3s ease;
}
.main-header {
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
}
.logo-header[data-background-color="dark2"] {
    background: #1a2035 !important;
}
.dropdown-menu {
    border: none;
    border-radius: 10px;
}
.dropdown-item:hover {
    background: #f8f9fa;
}
.profile-username {
    font-size: 0.9rem;
}
.avatar-sm img, .avatar-lg img {
    object-fit: cover;
}
.user-box {
    min-width: 320px;
}
.u-text {
    overflow: hidden;
}
.text-truncate {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.avatar-lg {
    width: 50px;
    height: 50px;
    min-width: 50px;
}
.avatar-lg img {
    width: 100%;
    height: 100%;
}
.text-dark {
    color: #2a2a2a !important;
}
.logo-header[data-background-color="dark2"] i {
    color: #2a2a2a !important;
}
</style>