<div class="container message-box">
    
    <div class="hero-unit">
        <h1>Note! A message for you!</h1>
        <h2><?php echo $message; ?></h2>
        <h3>Please wait for <?php echo $delay / 1000; ?> seconds to redirect.</h3>
        <h3>If the page does not redirect!</h3>
        <p><a href="<?php echo $url; ?>" class="btn btn-primary btn-large">Please click here...</a></p>
    </div>
    
</div>
<script type="text/javascript">
    (function(window) {
        window.setTimeout(function() {
            location.href = "<?php echo $url; ?>";
        }, <?php echo $delay; ?>);
    })(window);
</script>