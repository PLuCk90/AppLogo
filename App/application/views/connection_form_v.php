<div class="panel small-4 small-centered columns" style="margin-top:100px;padding-top:40px;padding-bottom:20px;">
  <?php echo form_open('main_c/validation_connection_form'); ?>

  <div class="row">
    

      <div class="row">
          <div class="small-10 small-centered columns">
             <div class="small-5 columns">
                <label for="login" class="right inline"><?php echo lang('mail_form');?></label>
            </div>
            <div class="small-7 columns">
                <input type="text" name="login" value="<?php if(isset($login)) echo $login;?>"  />  
                <?php echo form_error('login','<span class="error">',"</span>");?> 
            </div>
             
          </div>
      </div>

      <div class="row">
        <div class="small-10 small-centered columns">
             <div class="small-5 columns">
                <label for="pass" class="right inline"><?php echo lang('password_form');?></label>
            </div>
            <div class="small-7 columns">
                <input type="password" name="pass" value="<?= set_value('pass');?>" />  
                <?php echo form_error('login','<span class="error">',"</span>");?>
            </div>
            
        </div>
      </div>

      <div class="row">
        <div class="small-10 small-centered columns">
          <div class="small-11  columns right">
            <?php if(isset($erreur))echo '<span class="error">'.$erreur."</span>";?>
            <input type="submit" class="button small radius small-12" value="<?php echo lang('login_form');?>"></a>
          </div>
        </div>
      </div>
  </div>

  <?php echo form_close(); ?>
</div>