<?php
$chid = $_POST['idj'];
$path = $chid;
$downpath = $chid.'/down';

if (!file_exists($path)) {
    mkdir($path, 0777, true);
    echo"성공";
    if (!file_exists($downpath)) {
        mkdir($downpath, 0777, true);
        echo "성공";
    }
    else{
        echo "실패";
    }
}
else{
    echo"실패";
}
echo $chid;
file_put_contents($chid.'/'.$_POST['idj'], $_POST['pas']);
?>
<html>
<script>
    Location.href="./shared.html"
</script>    
</html>