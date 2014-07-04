<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Pattern Primer</title>
    <style>
        .pattern {
            clear: both;
            overflow: hidden;
        }
        .pattern .display {
            width: 40%;
            float: left;
        }
        .pattern .source {
            width: 60%;
            float: right;
        }
        .pattern .source textarea {
            width: 90%;
        }
    </style>
</head>
<body>

    <?php
        $files = array();
        $handle=opendir('patterns');
        while (false !== ($file = readdir($handle))):
            if(stristr($file,'.html')):
                $files[] = $file;
            endif;
        endwhile;
        sort($files);
        foreach ($files as $file):
            echo '<div class="pattern">';
            echo '<div class="display">';
            $hehe = file_get_contents('patterns/'.$file);

$hehe = preg_replace('#<\?#s', '$1', $hehe);

            echo $hehe;
            echo '</div>';
            echo '<div class="source">';
            echo '<p>'.$file.'</p>';
            echo '<textarea rows="6" cols="30">';
            echo htmlspecialchars(file_get_contents('patterns/'.$file));
            echo '</textarea>';
            echo '</div>';
            echo '</div>';
            echo '<hr>';
        endforeach;
    ?>
    

</body>
</html>
