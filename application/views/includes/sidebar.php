<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element text-center"> <span>
                    <center><img width="65px" class="img-circle" alt="image" src="<?php echo base_url('file-uploads/user-account-files/avatars/'.$this->session->userdata['avatar']); ?>" /></center>
                     </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $this->session->userdata['name']; ?> </strong>
                     </span> <span class="text-muted text-xs block"><?php echo $this->session->userdata['designation']; ?> <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="profile.html">Profile</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="mailbox.html">Mailbox</a></li>
                                <li class="divider"></li>
                                <li><a href="login.html">Logout</a></li>
                            </ul>
                </div>

                <div class="logo-element">
                    HRMS+
                </div>
            </li>
            
            <li class="<?php if($this->uri->segment(1) == 'dashboard') echo 'active'; ?>">
                <a href="<?php if($this->session->userdata['designation'] == 'Admin') echo base_url('employees/hr'); else echo base_url('dashboard'); ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
            </li>

            <li class="<?php if($this->uri->segment(1) == 'payroll') echo 'active'; ?>">
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Payroll</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="<?php if($this->uri->segment(3) == 'generate_payslip' || $this->uri->segment(3) == 'request_leave') echo 'active'; ?>"><a href="<?php echo base_url('payroll/payroll'); ?>">Generate Payslip</a></li>
                </ul>
            </li>
            <?php if($this->session->userdata['designation'] !== 'Admin'): ?>
                
                <li class="<?php if($this->uri->segment(2) == 'personal') echo 'active'; ?>">
                    <a href="#"><i class="fa fa-user-secret"></i> <span class="nav-label">Personal</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">

                        <li class="<?php if($this->uri->segment(3) == 'leaves' || $this->uri->segment(3) == 'request_leave') echo 'active'; ?>"><a href="<?php echo base_url('user/personal/leaves'); ?>">Requested Leaves</a></li>

                        <li class="<?php if($this->uri->segment(3) == 'trainings' || $this->uri->segment(3) == 'request_training') echo 'active'; ?>"><a href="<?php echo base_url('user/personal/trainings'); ?>">Requested Trainings</a></li>

                        <li class="<?php if($this->uri->segment(3) == 'late_sitting' || $this->uri->segment(3) == 'request_late_sitting') echo 'active'; ?>"><a href="<?php echo base_url('user/personal/late_sitting'); ?>">Late Sittings</a></li>

                        <li class="<?php if($this->uri->segment(3) == 'off_days' || $this->uri->segment(3) == 'request_off_day' ) echo 'active'; ?>"><a href="<?php echo base_url('user/personal/off_days'); ?>">Off Days</a></li>

                        <li class="<?php if($this->uri->segment(3) == 'missing_time' || $this->uri->segment(3) == 'request_missing_time' )  echo 'active'; ?>"><a href="<?php echo base_url('user/personal/missing_time'); ?>">Missed TimeIN/TimeOUT</a></li>

                        <li class="<?php if($this->uri->segment(3) == 'advance_pay_requests' || $this->uri->segment(3) == 'request_advance_pay' )  echo 'active'; ?>"><a href="<?php echo base_url('user/personal/advance_pay'); ?>">Advance Pay Requests</a></li>

                       <li class="<?php if($this->uri->segment(3) == 'loan_requests' || $this->uri->segment(3) == 'request_loan' )  echo 'active'; ?>"><a href="<?php echo base_url('user/personal/loan_requests'); ?>">Loan Requests</a></li>

                    </ul>
                </li>

            <?php endif; ?>

            <li class="<?php if($this->uri->segment(1) == 'settings') echo 'active'; ?>">
                <a href="#"><i class="fa fa-wrench"></i> <span class="nav-label">Settings</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <?php if(is_function_accessible('settings', 'user', 'company_profile')): ?>
                        <li class="<?php if($this->uri->segment(3) == 'company_profile') echo 'active'; ?>"><a href="<?php echo base_url('settings/user/company_profile'); ?>">Company Profile</a></li>
                    <?php endif; ?>

                    <li class="<?php if($this->uri->segment(3) == 'personal_profile') echo 'active'; ?>"><a href="<?php echo base_url('settings/user/personal_profile'); ?>">Personal Profile</a></li>

                    <li class="<?php if($this->uri->segment(3) == 'change_password') echo 'active'; ?>"><a href="<?php echo base_url('settings/user/change_password'); ?>">Change Password</a></li>

                </ul>
            </li>

        </ul>

    </div>
</nav>