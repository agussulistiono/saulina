<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title> 
</head> 

<body>
    <!-- <form action="<?php echo base_url('Tagihan/upload_image')?>" method="post" enctype="multipart/form-data"> -->
    	<?php echo form_open_multipart('Tagihan/upload_image')?>
        Pilih file: <input type="file" name="filefoto" />
        <input type="submit" name="upload" value="upload" />
    <?php echo form_close()?>
</body> 
</html>