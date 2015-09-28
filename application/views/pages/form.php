
<?php if((isset($_SESSION['id']))  && ($_SESSION['message'] =='Super')) {  
   ?>

        

  
      <div class="container-fluid">
              <!-- Example row of columns -->
              <div class="row">
      <div class="col-lg-12 well">
          
       <h2><?php echo $headtitle; ?></h2>
       <?php echo validation_errors(); ?>
       </br>
       <?php echo $error['error'];?>


<div class="col-lg-4 form-group">
    

    
<?php echo form_open_multipart('pages/formsubmit');//echo form_open('pages/formsubmit');
       if(!isset($uploads)){
            echo form_label("Title: ","title");
            if (empty(form_error('title'))){
                echo form_input("title","","class=form-control");
            } 
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
           
            <input type="file" name="userfile" size="20" />
            
            <br />

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
            echo  form_input("filename",$uploads['filename'],"class=form-control");
            echo  form_hidden('slug', $uploads['slug']);
            echo  form_hidden('id', $uploads['id']);?>
            </br>
           

            <input type="file" name="userfile" size="20" />
                
            <br />
           
      <?php }?>
       
             <a href="<?php echo site_url('pages/view/listadmin');?>" onclick="return confirm('Are you sure?');">
            <input type='button' class="btn btn-default" value='Cancel'>
            </a>
        <button type="submit" class="btn btn-primary">Submit</button>
         <?php if(isset($uploads)){?>
        <a href="<?php echo site_url('pages/delete/'.$uploads['id']);?>" onclick="return confirm('Are you sure?');">
         <input type='button' class='btn btn-danger' value='Delete'>
         </a>
         <?php }?>
       </form>
     </br>
</div> 
</div>
</div>
			  
           </div>
       

        
    
  

</body>

<?php } else {
  redirect('/pages/index');
}?>