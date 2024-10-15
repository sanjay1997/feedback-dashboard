<nav class="navbar header-navbar pcoded-header">
        <div class="navbar-wrapper">
            <div class="navbar-logo">
                <a class="mobile-menu" id="mobile-collapse" href="#!">
                    <i class="ti-menu"></i>
                </a>
                <div class="mobile-search">
                    <div class="header-search">
                        <div class="main-search morphsearch-search">
                            <div class="input-group">
                                <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                <input type="text" class="form-control" placeholder="Enter Keyword">
                                <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="index.php">
                    <img class="img-fluid nav-logo" src="<?= base_url(); ?>assets/images/header_logo.png" alt="Theme-Logo" width="100px" />
                </a>
                <a class="mobile-options">
                    <i class="ti-more"></i>
                </a>
            </div>

            <div class="navbar-container container-fluid">
                <!-- <div class="powered_by">
                    <p>Powered By</p>
                </div> -->
                <ul class="nav-left">
                    <li>
                        <form action="<?= base_url('dashboard/set_session'); ?>" method="post" id="year_form" >
                            <select class="form-control d-none" name="year" id="year" onchange="set_year_session(this.value)">
                                <option value="">Select Year</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                            </select>

                            <input type="month" name="year_month" value="<?= $this->session->userdata('year_month'); ?>" id="year_month" onchange="set_year_session(this.value)">
                        </form>
                    </li>
                </ul>
                <ul class="nav-right"> 
                    <li class="user-profile header-notification">
                        <a href="#!">
                            <img src="<?= base_url(); ?>assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                            <span><?= $this->session->userdata('fb_fname'); ?></span>
                            <i class="ti-angle-down"></i>
                        </a>
                        <ul class="show-notification profile-notification">
                           
                            <li>
                                <a href="<?= base_url('auth/logout'); ?>">
                                <i class="ti-layout-sidebar-left"></i> Logout
                            </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>