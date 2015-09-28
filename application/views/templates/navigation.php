 <body>
 <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo base_url();?>pages/index">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="<?php echo base_url();?>pages/view/list">Documents</a></li>
           <?php if (isset($_SESSION['message'])) {
                   if($_SESSION['message']=='Super'){?>
                <li><a href="<?php echo base_url();?>pages/view/listadmin">Documents Management</a></li> 
           <?php } }?>
            <li><form method="post" accept-charset="utf-8" action="<?php echo base_url();?>pages/logout"
          class="navbar-form navbars-right">            
          <button type="submit" class="btn btn-danger">Log Out</button>

</form><li>
          </ul>
        </div>
      </div>
    </nav>