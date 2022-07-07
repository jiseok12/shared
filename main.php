<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>shared</title>
        <style>
            header {  
                height: 75px;
                color: white;
                background-color: teal;
                font-weight: bold;
                position: fixed;
                top: 0;
                width: 100%;
                left:0;
                right: 0;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            * {
                box-sizing: border-box;
            }
            
            .box1::-webkit-scrollbar {
                display: none; /* Chrome, Safari, Opera*/
            }
            a{
                text-decoration: none;
                font-style:none;
                color:black;
            }
            .main-box{
                margin:0px auto;
                width:800px;
                height:75%;
                border: 2px solid black;
                overflow: scroll;
                text-overflow: ellipsis;
                white-space: nowrap;
            }
            .main-box::-webkit-scrollbar {
                display: none; 
            }
            .up-box{
                margin:0px auto;
                width:800px;
                height:50px;
                border: 2px solid black;
            }
            .up2-box{
                margin:0px auto;
                width:800px;
                height:25px;
                border: 2px solid black;
            }
            li{
                list-style: none;
            }
            @media (max-width:800px){
                .main-box{
                    width: 99%;
                }
                .up-box{
                    width: 99%;

                }
            }
        </style>
    </head>
    <body>
        <header>
            <h1 style="margin:30px;font-size: 3em; color:orange;">shared</h1>
        </header>
        <?php
        session_start();
        if(isset($_SESSION["id"])){
            $basename = basename($_SESSION["id"]);
            $source = basename($_SESSION["passwd"]);
            if(file_get_contents($basename."/".$basename)==$source){
                $file_name = $_FILES['uploadfile']['name'];
                $file_tmp_name = $_FILES['uploadfile']['tmp_name'];
                $target_dir = $_SESSION["id"].'/down'.'/';
                $target_file = $target_dir . basename($_FILES["uploadfile"]["name"]);
                $chid =$_SESSION["id"];
                if(move_uploaded_file($file_tmp_name, $target_file)){
                }
        ?>
        <div class="main-box" style="margin-top:75px;">
            <ul style="font-size: 2em;">
                <?php
                $list = scandir($_SESSION["id"].'/down');
                $download=$_SESSION["id"].'/down';
                $pathdown=$_SESSION["id"];
                $i = 0;
                while($i < count($list)){
                    $title = htmlspecialchars($list[$i]);
                    if($list[$i] != '.') {
                        if($list[$i] != '..') {
                            echo "<li><a href=\"$download/$title\" style='font-size:3em;'>$title</a><hr></li>\n";
                        }
                    }
                    $i = $i + 1;
                }
                ?>
            </ul>
        </div>
        <form action="./main.php" method="post" enctype="multipart/form-data">
            <div class="up-box" style="margin-top:20px;">
                <button type="file" name="uploadfile" id="uploadfile" style="width:100%;height:100%; ">파일 불러오기</button>
            </div>
            <div class="up2-box" style="margin-top:5px;">
                <input type="submit" value="upload" name="submit" style="margin: auto; width: 100%;display: inline;">
            </div>
        </form>
        <?php
            }
            else{
            echo "로그인 실패";
            }
        }
        ?>
    </body>
</html>