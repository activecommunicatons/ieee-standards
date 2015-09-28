<?php if(isset($_SESSION['id'] )){   ?>


 
           
        

  
      <div class="container-fluid">
      <!-- Example row of columns -->
      <div class="row">
          <div class="col-lg-2 bg-primary">
          <h5>Selection</h5>
          <?php echo form_open('pages/query'); ?>
                      <div class="form-group ">
                      <label class="control-label">Search Query</label>
                         <?php echo form_hidden('page','list');?>
                     <div class="input-group">
                     <input type="text" class="form-control" name="query">
                       <span class="input-group-btn">
                       <button class="btn btn-default" type="submit">Go</button>
                    </span>
                 
                  </div>
                </div>
        </form>
            </div>
        <div class="col-lg-10 well">
          <h2>Papers</h2>
          
          <?php foreach ($uploads as $upload_item): ?>

        <h4><?php echo $upload_item['title']; ?></h4>
        <div class="main">
            <div>
            <object data="<?php echo site_url('uploads/'.$upload_item['filename'].'.pdf');?>" type="application/pdf" width="300" height="200">
            alt : <a href="<?php echo site_url('uploads/'.$upload_item['filename'].'.pdf');?>"><?php echo site_url('uploads/'.$upload_item['filename'].'.pdf');?></a>
            </object>
            </div>
        
                
             </br>
                </br>
    <?php endforeach; ?>
          
          
          </br>
           </div>
       </div>

        
    </div> 
  

</body>
<?php } else {
   redirect('/pages/index');
}?>