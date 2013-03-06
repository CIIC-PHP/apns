<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title>test</title>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript">
            function cc() {
                $.post('http://localhost/ciic/php/apns/index.php?/admin/login', {
                    'id': 123
                }).done(function(data) {
                    alert(data);
                });
            }
        </script>
    </head>
    <body>
        <input type="button" name="btn" value="Button" onclick="cc();" />
    </body>
</html>
