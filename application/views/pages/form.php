
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
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>
           
        

  
      <div class="container-fluid">
              <!-- Example row of columns -->
              <div class="row">
      <div class="col-lg-12 well">
          
       <h2><?php echo $headtitle; ?></h2>

<?php echo validation_errors(); ?>
<div class="col-lg-4 form-group">
    
    
<?php echo form_open('pages/form');
       if(!isset($uploads)){
            echo form_label("Title: ","title");
            if (empty(form_error('title'))){
            echo form_input("title","","class=form-control");} 
            else {?>
            <div class="form-group has-error">
        <?php echo form_input("title","","class=form-control");?>
            
            </div>
        <?php }?>
            </br>
        <?php     echo form_label("Description: ","description");
            echo form_textarea("description","","class=form-control");?>
            </br>
        <?php    echo form_label("File Name: ","filename");
            echo form_input("filename","","class=form-control");?>
            </br>
        <?php 
      }
        
    else {      
            echo form_label("Title: ","title");
            if (empty(form_error('title'))){
            echo form_input("title",$uploads['title'],"class=form-control");} 
            else {?>
            <div class="form-group has-error">
        <?php echo form_input("title",$uploads['title'],"class=form-control");?>
            
            </div>
        <?php }?>
            </br>
        <?php     echo form_label("Description: ","description");
            echo form_textarea("description",$uploads['description'],"class=form-control");?>
            </br>
        <?php    echo form_label("File Name: ","filename");
            echo form_input("filename",$uploads['filename'],"class=form-control");
            echo  form_hidden('id', $uploads['id']);?>
            </br>
           
      <?php }?>
       
 
            <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
        
   </br>
   </form>
</div> 
</div>
</div>
			  
           </div>
       

        
    
  

</body>
