<?php
	$name = $_POST['name'];
	$style1 = "style1";
	$target = 'input_image/'.$style1;
	$style1_type = $_FILES['style1']['type'];
	$tmp_name = $_FILES['style1']['tmp_name'];
	$error = $_FILES['style1']['error'];
	move_uploaded_file($tmp_name,$target);
	
	$name = $_POST['name'];
	$content1 = "content1";
	$target = 'input_image/'.$content1;
	$content1_type = $_FILES['content1']['type'];
	$tmp_name = $_FILES['content1']['tmp_name'];
	$error = $_FILES['content1']['error'];
	move_uploaded_file($tmp_name,$target);

	chdir('/home/cho/FastPhotoStyle-master');
	exec("python demo.py --content_image_path /var/www/html/input_image/content1 --style_image_path /var/www/html/input_image/style1 --output_image_path /var/www/html/result_image/result.png");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Style Transfer</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="wrap">
        <header>
            <h1><a href="index.html">Style Transfer</a></h1>
            <nav>   
                <div class="header">
                    <ul class="header-gnb">
                        <li><a href="index.html">Home</li>
                        <li><a href="1.html">Simple Transfer</a></li>
                        <li><a href="2-3.html">Transfer Using Label</a>
                            <ul>
                                <li><a href="2-1.html">Labelme 설치법</a></li>
                                <li><a href="2-2.html">Label 설명서</a></li>
                                <li><a href="2-3.html">Transfer</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <section>
            <div class="container">
                <h2>결과 이미지</h2>
		<p> <img src="result_image/result.png" width="100%"> </p>
		<div class="center">
			<a href="result_image/result.png" download>이미지 다운로드</a>
		</div>
            </div>
        </section>
        <footer>
            <p>2019 홍익대학교 컴퓨터 공학과 졸업 프로젝트</p>
            <P>팀장 : 김서우 연락처 : yrs02087@naver.com</P>
            <p>팀원 : 조성호 연락처 : chosh-95@hanmail.net</p>
        </footer>
    </div>
</body>
</html>