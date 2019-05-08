<?php echo $error;?>

<?php echo form_open_multipart('Upload/do_upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>
