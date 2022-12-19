
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3"id="SidebarIndex">
            <nav class="navbar bg-light navbar-light">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Auditoria</h3>
                   
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">
                            <?php
                            echo $user['user'];
                            ?>
                         </h6>
                        <!-- <span>Admin</span> -->
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Início</a>
                    <div disabled class="nav-item dropdown">
                        <a href="#" disabled class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Painel</a>
                        <div disabled class="dropdown-menu bg-transparent border-0">
                            <a href="button.html" class="dropdown-item">Buttons</a>
                            <a href="typography.html" class="dropdown-item">Typography</a>
                            <a href="element.html" class="dropdown-item">Other Elements</a>
                        </div>
                    </div>
                    <a href="#" disabled class="nav-item nav-link"><i class="fa fa-th me-2"></i>Resumo geral</a>
                    <div class="nav-item dropdown">
                        <a href="#" disabled class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Dashboard</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.php" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                        </div>
                    </div>
                    
                </div>
                
            </nav>
           
        </div>
        <!-- Sidebar End -->
