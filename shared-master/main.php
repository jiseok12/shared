<?php
        session_start();
        if(isset($_SESSION["id"])){
        $basename = basename($_SESSION["id"]);
        $source = basename($_SESSION["passwd"]);
        if(file_get_contents($basename."/".$basename)==$source){

	$sendid=$_POST['send-input'];
	$sendfile=$_POST['send-input-id'];
	if($sendid!=""){
	copy($_SESSION['id'].'/down/'.$sendfile,$sendid."/shared/".$sendfile);
	}
	
        $file_name = $_FILES['uploadfile']['name'];
        $file_tmp_name = $_FILES['uploadfile']['tmp_name'];
        $target_dir = $_SESSION["id"].'/down'.'/';
        $target_file = $target_dir . basename($_FILES["uploadfile"]["name"]);
        $chid =$_SESSION["id"];
        if(move_uploaded_file($file_tmp_name, $target_file)){
        }
        else {
        }
?>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shared</title>
   <style>
  body {
    font-family: "Lato", sans-serif;
    transition: background-color .5s;
    }
    body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    }

    .topnav {
    overflow: hidden;
    background-color: teal;
    }

    .topnav a {
    float: left;
    color: orange;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 40px;
    }
    .topnav a.active {
    /*background-color: #04AA6D;*/
    color: orange;
    }

    .topnav-right {
    float: right;
    }

    .sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 73px;
    left: 0;
    background-color: rgb(0, 0, 0);
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
    }

    .sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
    }

    .sidenav a:hover {
    color: #f1f1f1;
    }

    .sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
    }

    #main {
    transition: margin-left .5s;
    padding: 16px;
    margin-left: 250px;
    overflow: auto;
    height: 80%;
    }
    #main a{
        font-size: 30px;
        color:black;
        text-decoration:none;
    }
    #main a:visited{
        color:black;
    }
    #mySidenav{
        width: 250px;
    }
    .line{
        width : 100%;
        height : 150px;
        background-color: rgb(223, 223, 223);
        position: absolute;
        top: 50%;
        margin-top: -100px;
        text-align: center;
        font-size: 40px;
    }
    #upload{
        transition: margin-left .5s;
        padding: 16px;
        margin-left: 250px;
        overflow: auto;
        height: 100%;
        display: none;
        justify-content : center;
        overflow: auto;
    }
    
    #upload .up-box{
		width:100%;
        min-height: 600px;
        max-height: 1000px;
		border:none;
		margin:0 auto;
		background-color: rgb(223, 223, 223);
		border-radius: 30px;
        position: relative;
    }
    #send{
        transition: margin-left .5s;
        padding: 16px;
        margin-left: 250px;
        overflow: auto;
        height: 80%;
        display: none;
        justify-content : center;
        overflow: auto;
    }
    #send .up-box{
		width:100%;
        min-height: 600px;
        max-height: 1000px;
		border:none;
		margin:0 auto;
		background-color: rgb(223, 223, 223);
		border-radius: 30px;
        position: relative;
    }
    #listfile{
        width: 90%;
        height: 50%;
        overflow: auto;
    }
    #find{
        display: none;
        transition: margin-left .5s;
    padding: 16px;
    margin-left: 250px;
    overflow: auto;
    height: 80%;
    }
#shared {
    transition: margin-left .5s;
    padding: 16px;
    margin-left: 250px;
    overflow: auto;
    height: 150px;
    display: none;
    }
    #shared a{
        font-size: 30px;
        color:black;
        text-decoration:none;
    }
    #shared a:visited{
        color:black;
    }
    @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
    }
</style>
</head>
<body>
    <div class="topnav">
        <a class="active" >Shared</a>
    </div>
<div id="mySidenav" class="sidenav">
  <a href="#" onclick="drive()">drive</a>
  <a href="#" onclick="upload()">upload</a>
  <a href="#" onclick="find()">find</a>
  <a href="#" onclick="send()">send</a>
  <a href="#" onclick="shared()">shared</a>
</div>
    <div id="main">
    <ul>
    <?php
        $list = scandir($_SESSION["id"].'/down');
        $download=$_SESSION["id"].'/down';
        $pathdown=$_SESSION["id"];
        $i = 0;

        while($i < count($list)){
            $title = htmlspecialchars($list[$i]);
            if($list[$i] != '.') {
                if($list[$i] != '..') {
                    echo "<li><a href=\"$download/$title\" download>$title</a><hr></li>\n";
                }
            }
        $i = $i + 1;
        }
    ?>

    </ul>
    </div>
   <div id="upload">
    <form action="./main.php" method="post" enctype="multipart/form-data">
       <div class="up-box">
        <div class="line">
            <img src="iconsmind-outline-triangle-arrowdown.ico" width="100px"><br>
            <label class="input-file-button" for="uploadfile" style="vertical-align : middle;">파일 선택</label>
            <input type="file" name="uploadfile" id="uploadfile" onchange="filename(this.value);" style="display:none;width:0;"}}/>
        </div>
        </div>
        <br>
        <div id="filechange" style="text-align: center;">선택한 파일:</div>
       <div class="up2-box" style="margin:0px auto;" >
            <br>
          <input type="submit" value="upload" name="submit" style="margin:auto;width: 100%; background-color: rgb(17, 187, 17);height: 30px;font-size: 24px;">
       </div>
    </form>
</div>
<div id="find">
    <h2>현재 존재하는 id</h2>
    <ul>
        <?php
        $list = scandir('shared');
        $download=$_SESSION["id"].'/down';
        $pathdown=$_SESSION["id"];
        $i = 0;

        while($i < count($list)){
            $title = htmlspecialchars($list[$i]);
            if($list[$i] != '.') {
                if($list[$i] != '..') {
                    echo "<li><h4>$title</h4><hr></li>\n";
                }
            }
        $i = $i + 1;
        }
    ?>
    </ul>
</div>

<div id="send">
    <h2>파일 보내기</h2>
    <form action="./main.php" method="post">
        <b>send id</b><input type="text" id="send-input"name="send-input" style="text-align: center; margin: auto;"><br>
        <b>파일 이름</b><input type="text" id="send-input-id" name="send-input-id" style="text-align: center; margin: auto;">
        <div id="listfile">
            <ul id="menu">
 <?php
        $list = scandir($_SESSION["id"].'/down');
        $download=$_SESSION["id"].'/down';
        $pathdown=$_SESSION["id"];
        $i = 0;

        while($i < count($list)){
            $title = htmlspecialchars($list[$i]);
            if($list[$i] != '.') {
                if($list[$i] != '..') {
		    $titletwo = "menu(".$title.")";
                    echo "<li><a onclick=\"$titletwo\">$title</a><hr></li>\n";
                }
            }
        $i = $i + 1;
        }
    ?>
            </ul>
        </div>
        <br>
        <input type="submit" value="전송" style="margin:auto;width: 100%; background-color: rgb(17, 187, 17);height: 40px;font-size: 24px;">
    </form>
</div>
<div id="shared">
    <ul>
	<?php
        $list = scandir($_SESSION["id"].'/shared');
        $download=$_SESSION["id"].'/shared';
        $pathdown=$_SESSION["id"];
        $i = 0;

        while($i < count($list)){
            $title = htmlspecialchars($list[$i]);
            if($list[$i] != '.') {
                if($list[$i] != '..') {
                    echo "<li><a href=\"$download/$title\" download>$title</a><hr></li>\n";
                }
            }
        $i = $i + 1;
        }
    	?>
    </ul>
</div>
<script>
function menu(a){
        document.getElementById("send-input-id").value=a;
    }
    function upload(){
        let upload=document.getElementById("upload");
        document.getElementById("main").style.display="none";
        document.getElementById("send").style.display="none";
        document.getElementById("upload").style.display="none";
        document.getElementById("shared").style.display="none";
        upload.style.display="block";
    }
    function drive(){
        let upload=document.getElementById("main");
        document.getElementById("upload").style.display="none";
        document.getElementById("send").style.display="none";
        document.getElementById("find").style.display="none";
        document.getElementById("shared").style.display="none";
        upload.style.display="block";
    }
    function filename(a){
        document.getElementById("filechange").innerText="선택한 파일:"+a;
    }
    function find(){
        document.getElementById("main").style.display="none";
        document.getElementById("send").style.display="none";
        document.getElementById("upload").style.display="none";
        document.getElementById("shared").style.display="none";
        document.getElementById("find").style.display="block";
    }
    function send(){
        document.getElementById("main").style.display="none";
        document.getElementById("find").style.display="none";
        document.getElementById("upload").style.display="none";
        document.getElementById("shared").style.display="none";
        document.getElementById("send").style.display="block";
    }
    function shared(){
        document.getElementById("main").style.display="none";
        document.getElementById("find").style.display="none";
        document.getElementById("upload").style.display="none";
        document.getElementById("send").style.display="none";
        document.getElementById("shared").style.display="block";
    }
</script>
    <br>
</body>
</html>
<?php
        }
        else{
        echo "로그인 실패";
	?>
	<script>location.href="/shared.html";
	<?php
	}
}
?>
