<html>
  <head><h1><center>ADD URL DATA</center></h1></head>
  <body>
   <?php
    if(isset($invalidiput))
    {
    print_r($invalidinput);
    }
    ?>
  <?php echo validation_errors();?>
  <?php echo form_open('Textcontroller/checktext');?>
  <div><label>URL:</label><span style="padding-right:42px;"></span></label><input type = "text" name = "url">
</div><br>
  <span style = "padding-right:90px;"></span><input type = "submit" value = "submit">
  
  <?php echo form_close();?>
</body>
</html>