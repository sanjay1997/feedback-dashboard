<nav class="pcoded-navbar">
                <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                <div class="pcoded-inner-navbar main-menu">
                    
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="">
                        </li>
                        <li class="<?= $this->uri->segment('1') == 'dashboard' ? 'active' : ''; ?>">
                            <a href="<?= base_url('dashboard'); ?>">
                                <span class="pcoded-micon"><i class="ti-home"></i></span>
                                <span class="pcoded-mtext">Dashboard</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="<?= $this->uri->segment('2') == 'index' ? 'active' : ''; ?>">
                            <a href="<?= base_url('leads/index'); ?>">
                                <span class="pcoded-micon"><i class="ti-layers"></i></span>
                                <span class="pcoded-mtext">Won Leads <span class="badge bg-danger text-white"><?= get_leads_value('Won'); ?></span></span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="<?= $this->uri->segment('2') == 'lost_leads' ? 'active' : ''; ?>">
                            <a href="<?= base_url('leads/lost_leads'); ?>">
                                <span class="pcoded-micon"><i class="ti-layers"></i></span>
                                <span class="pcoded-mtext">Lost Leads  <span class="badge bg-danger text-white"><?= get_leads_value('Lost'); ?></span></span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>

                        <li class="<?= $this->uri->segment('2') == 'south_won_leads' ? 'active' : ''; ?>">
                            <a href="<?= base_url('leads/south_won_leads'); ?>">
                                <span class="pcoded-micon"><i class="ti-layers"></i></span>
                                <span class="pcoded-mtext">South Won Leads <span class="badge bg-danger text-white"><?= get_south_leads_value('Won'); ?></span></span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>

                        <li class="<?= $this->uri->segment('2') == 'south_lost_leads' ? 'active' : ''; ?>">
                            <a href="<?= base_url('leads/south_lost_leads'); ?>">
                                <span class="pcoded-micon"><i class="ti-layers"></i></span>
                                <span class="pcoded-mtext">South Lost Leads <span class="badge bg-danger text-white"><?= get_south_leads_value('Lost'); ?></span></span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>

                        <li class="<?= $this->uri->segment('2') == 'connected_leads' ? 'active' : ''; ?>">
                            <a href="<?= base_url('leads/connected_leads'); ?>">
                                <span class="pcoded-micon"><i class="ti-layers"></i></span>
                                <span class="pcoded-mtext">Connected Leads <span class="badge bg-danger text-white"><?= get_feedback_count(1); ?></span></span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        
                        <li class="<?= $this->uri->segment('2') == 'standby_leads' ? 'active' : ''; ?>">
                            <a href="<?= base_url('leads/standby_leads'); ?>">
                                <span class="pcoded-micon"><i class="ti-layers"></i></span>
                                <span class="pcoded-mtext">Standby Leads  <span class="badge bg-danger text-white"><?= get_feedback_count(2); ?></span></span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>

                        <li class="<?= $this->uri->segment('2') == 'escalated_leads' ? 'active' : ''; ?>">
                            <a href="<?= base_url('leads/escalated_leads'); ?>">
                                <span class="pcoded-micon"><i class="ti-layers"></i></span>
                                <span class="pcoded-mtext">Escalated Leads  <span class="badge bg-danger text-white"><?= get_feedback_count(3); ?></span></span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>

                        <li class="" >
                            <a href="https://forms.office.com/Pages/ResponsePage.aspx?id=reFRbkvFOUu1mA_-muaP7wBUUdyISTNEmY7SyCVvVLJUOEswQ09XTzNENFgzOEVMT1hQSktMN0VFNS4u" target="_blank">
                                <span class="pcoded-micon"><i class="ti-layers"></i></span>
                                <span class="pcoded-mtext">Product Form  </span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="database_newly_added.php">
                                <span class="pcoded-micon"><i class="ti-layers"></i></span>
                                <span class="pcoded-mtext">Database Newly Added</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="pcoded-hasmenu">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                <span class="pcoded-mtext">Masters</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="company.php">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">Company</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="site.php">
                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                        <span class="pcoded-mtext">Site</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </div>
            </nav>