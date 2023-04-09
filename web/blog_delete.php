<?php

require_once('blog.php');

$blog = new Blog();
$result = $blog->delete($_GET['id']);

?>
<p><a href="/dot_web/web/index2.php">Go back</a></p>
<!-- <p><a href="/">戻る</a></p> -->
    
