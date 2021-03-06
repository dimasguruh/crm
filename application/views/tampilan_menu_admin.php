<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="<?php echo base_url('sales');?>">
            <i class="fa fa-dashboard"></i><span>Home</span><i class="fa fa-angle-left pull-right"></i>
          </a>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Sales</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('sales');?>"><i class="fa fa-circle-o"></i>Data</a></li>
            <li><a href="<?php echo base_url('sales/activity');?>"><i class="fa fa-circle-o"></i>Sales Activity</a></li>
            <li><a href="<?php echo base_url('sales/customer');?>"><i class="fa fa-circle-o"></i>Customer Performance</a></li>            
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
</aside>