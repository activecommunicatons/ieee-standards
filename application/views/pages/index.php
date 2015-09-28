 <?php if ( !isset($_SESSION['id']) ) {?>
<body>
 
    <nav class="navbar navbar-default  navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
        
       
          <a class="navbar-brand" href="#">Project name</a>
        </div>
          
        <div id="navbar" class="navbar-collapse collapse">
      
         <form method="post" accept-charset="utf-8" action="<?php echo base_url();?>pages/index"
          class="navbar-form navbars-left">            

                      <div class="form-group">
             <?php echo form_input("member_num","","class=form-control");?>
                      
             
             </div>
            <div class="form-group">
               <?php echo form_password("password","","class=form-control");?>
            </div>
            <button type="submit" class="btn btn-default">Sign in</button>
            

</form>

   
   </div><!--/.navbar-collapse -->

      </div>
           
    </nav>   
   <?php }?>        
        

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <?php echo validation_errors(); ?>
        <h1>Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details »</a></p>
        </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details »</a></p>
       </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details »</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p>© Company 2014</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

  

</body>
</html>