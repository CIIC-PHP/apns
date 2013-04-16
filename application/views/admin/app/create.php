<div class="container">
    <?php echo form_open('admin/app/create'); ?>
    
    <fieldset>
        <legend>Application information</legend>
        
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
        <input type="text" placeholder="Application certificate (develop)..." id="caDev" name="caDev" value="<?php echo set_value('caDev'); ?>" disabled="disabled" />
        <?php echo form_error('caDev', '<span class="help-block label label-warning">', '</span>'); ?>
        
        <label for="caPro">Certificate (Product)</label>
        <input type="text" placeholder="Application certificate (product)..." id="caPro" name="caPro" value="<?php echo set_value('caPro'); ?>" disabled="disabled" />
        <?php echo form_error('caPro', '<span class="help-block label label-warning">', '</span>'); ?>
        
        <?php if (isset($errmsg) and ! empty($errmsg)): ?>
        <span class="help-block label label-warning"><?php echo $errmsg; ?></span>
        <?php endif; ?>
        
        <input class="btn btn-block btn-large btn-primary" type="submit" value="Sign in" />
    </fieldset>
    
    <?php echo form_close(); ?>
</div>