<div class="container">
    <?php echo form_open_multipart('admin/app/create'); ?>
    
    <fieldset>
        <legend>Application information</legend>
        
        <?php if (isset($errmsg) and ! empty($errmsg)): ?>
        <span class="help-block label label-warning"><?php echo $errmsg; ?></span>
        <?php endif; ?>
        
        <label for="id">Id</label>
        <input type="text" placeholder="Application id..." id="id" name="id" value="<?php echo set_value('id'); ?>" />
        <?php echo form_error('id', '<span class="help-block label label-warning">', '</span>'); ?>
        
        <label for="name">Password</label>
        <input type="text" placeholder="Application name..." id="name" name="name" value="<?php echo set_value('name'); ?>" />
        <?php echo form_error('name', '<span class="help-block label label-warning">', '</span>'); ?>
        
        <label for="description">Description</label>
        <input type="text" placeholder="Application description..." id="description" name="description" value="<?php echo set_value('description'); ?>" />
        <?php echo form_error('description', '<span class="help-block label label-warning">', '</span>'); ?>
        
        <label for="caDev">Certificate (Develop)</label>
        <input type="file" placeholder="Certificate (develop)..." id="caDev" name="caDev" value="" />
        <?php echo form_error('caDev', '<span class="help-block label label-warning">', '</span>'); ?>
        
        <label for="caPro">Certificate (Product)</label>
        <input type="file" placeholder="Certificate (product)..." id="caPro" name="caPro" value="" />
        <?php echo form_error('caPro', '<span class="help-block label label-warning">', '</span>'); ?>
        
        <div>
            <input class="btn btn-large btn-primary" type="submit" value="Sign in" />
        </div>
    </fieldset>
    
    <?php echo form_close(); ?>
</div>