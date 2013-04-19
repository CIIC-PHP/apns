<div class="container">
    <?php echo form_open('admin/app/create', array( 'class' => 'form-signin', )); ?>
    
    <fieldset class="well">
        <legend>Modify application</legend>
        
        <?php if (isset($errmsg) and ! empty($errmsg)): ?>
        <span class="help-block label label-warning"><?php echo $errmsg; ?></span>
        <?php endif; ?>
        
        <label for="Id">Id</label>
        <input type="text" id="id" name="id" value="<?php echo $app->id; ?>" readonly="readonly" />
        
        <label for="name">Name</label>
        <input type="text" placeholder="Application name..." id="name" name="name" value="<?php echo set_value('name'); ?>" />
        <?php echo form_error('name', '<span class="help-block label label-warning">', '</span>'); ?>
        
        <label for="description">Description</label>
        <input type="text" placeholder="Application description..." id="description" name="description" value="<?php echo set_value('description'); ?>" />
        <?php echo form_error('description', '<span class="help-block label label-warning">', '</span>'); ?>
        
        <label for="caDevNeed" class="checkbox">
            <input type="checkbox" id="caDevNeed" name="caDevNeed" value="caDevNeed" />
            <span>Upload Certificate (Develop)</span>
        </label>
        
        <label for="caDev">Certificate (Develop)</label>
        <input type="file" placeholder="Certificate (develop)..." id="caDev" name="caDev" value="" disabled="disabled" />
        <?php echo form_error('caDev', '<span class="help-block label label-warning">', '</span>'); ?>
        
        <label for="caProNeed" class="checkbox">
            <input type="checkbox" id="caProNeed" name="caProNeed" value="caProNeed" />
            <span>Upload Certificate (Product)</span>
        </label>
        
        <label for="caPro">Certificate (Product)</label>
        <input type="file" placeholder="Certificate (product)..." id="caPro" name="caPro" value="" disabled="disabled" />
        <?php echo form_error('caPro', '<span class="help-block label label-warning">', '</span>'); ?>
        
        <label for="status">Application status</label>
        <select id="status" name="status">
            <?php foreach ($status as $sk => $sv): ?>
            <option value="<?php echo $sv; ?>"><?php echo $sk; ?></option>
            <?php endforeach; ?>
        </select>
        
        <div class="well">
            <input class="btn btn-large btn-primary" type="submit" value="Modify" />
        </div>
    </fieldset>
    
    <?php echo form_close(); ?>
</div>