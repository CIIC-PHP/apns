<div class="container">
    <?php echo form_open('admin/login', array( 'class' => 'form-signin', )); ?>
    
    <fieldset>
        <legend>Please sign in</legend>
        
        <label for="account">Account</label>
        <input type="text" placeholder="Please enter your account..." id="account" name="account" value="<?php echo set_value('account'); ?>" />
        <?php echo form_error('account', '<span class="help-block label label-warning">', '</span>'); ?>
        <?php if (isset($errmsg) and ! empty($errmsg)): ?>
        <span class="help-block label label-warning"><?php echo $errmsg; ?></span>
        <?php endif; ?>
        
        <label for="password">Password</label>
        <input type="password" placeholder="Please enter your password..." id="password" name="password" value="" />
        <?php echo form_error('password', '<span class="help-block label label-warning">', '</span>'); ?>
        
        <input class="btn btn-block btn-large btn-primary" type="submit" value="Sign in" />
    </fieldset>
    
    <?php echo form_close(); ?>
</div>