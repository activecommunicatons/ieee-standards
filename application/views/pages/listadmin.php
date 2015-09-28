
<?php if((isset($_SESSION['id']))  && ($_SESSION['message'] =='Super')) {   ?>


           
        

  
      <div class="container-fluid well">
              <!-- Example row of columns -->
              
         <div class="row">           
       <div class="col-lg-5">         
      
        <h2>Document Managing</h2>
                    </br>
                    <?php echo form_open('pages/query'); ?>
                      <div class="form-group ">
                      <label class="control-label">Search Query</label>
                     <div class="input-group">
                     <input type="text" class="form-control" name="query">
                     <?php echo form_hidden('page','listadmin');?>
                       <span class="input-group-btn">
                       <button class="btn btn-default" type="submit">Go</button>
                    </span>
                  </div>
                </div>
        </form>
        </div>
        <div class="col-lg-12 ">
       <a href="<?php echo site_url('pages/form');?>">
       <button type="button" class="btn btn-primary btn-sm">Add new document</button>
       </a>
       
 
      <?php foreach ($uploads as $upload_item): ?>

        <h4><?php echo $upload_item['title']; ?></h4>
       
            <div>
            <object data="<?php echo site_url('uploads/'.$upload_item['filename'].'.pdf');?>" type="application/pdf" width="300" height="200">
            alt : <a href="<?php echo site_url('uploads/'.$upload_item['filename'].'.pdf');?>"><?php echo site_url('uploads/'.$upload_item['filename'].'.pdf');?></a>
            </object>
            </div>
                
          <p><a href ="<?php echo site_url('pages/form/'.$upload_item['slug']);?>">edit</a></p>
                
             </br>
                </br>
    <?php endforeach; ?>
 </div>
</div>
</div>
</body>
<?php } else {
   redirect('/pages/index');
}?>