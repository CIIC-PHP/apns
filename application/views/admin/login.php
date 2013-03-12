<div class="container">
    <?php echo form_open('admin/login', array( 'class' => 'form-signin', )); ?>
    
    <fieldset>
        <legend>Please sign in</legend>
        
        <label>Account</label>
        <input type="text" placeholder="Please enter your account..." name="account" value="<?php echo set_value('account'); ?>" />
        <?php echo form_error('account', '<span class="help-block label label-warning">', '</span>'); ?>
        
        <label>Password</label>
        <input type="password" placeholder="Please enter your password..." name="password" value="" />
        <?php echo form_error('password', '<span class="help-block label label-warning">', '</span>'); ?>
        
        <input class="btn btn-block btn-large btn-primary" type="submit" value="Sign in" />
    </fieldset>
    
    <?php echo form_close(); ?>
</div>