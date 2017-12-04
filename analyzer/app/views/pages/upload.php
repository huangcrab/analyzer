<?php require APPROOT . '/views/inc/header.php'; ?>
    <form action="<?php echo URLROOT; ?>/pages/upload" method="post" enctype="multipart/form-data">
            <input type="file" name="zip" class="form-control form-control-lg <?php echo (!empty($data['file_err'])) ? 'is-invalid' : ''; ?>">

                <span class="invalid-feedback"><?php echo $data['file_err'];?></span>
                 
            <hr>
            <input type="submit" value="Upload" class="btn btn-success">
    </form>
<?php require APPROOT . '/views/inc/footer.php'; ?>
