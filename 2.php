<?php
    $label0 = (float)$_POST['label_0'];
    $label1 = (float)$_POST['label_1'];
    $label2 = (float)$_POST['label_2'];
    $label3 = (float)$_POST['label_3'];
    $label4 = (float)$_POST['label_4'];

	$content2 = "content2";
	$target = 'input_image/'.$content2;
	$tmp_name = $_FILES['content2']['tmp_name'];
	move_uploaded_file($tmp_name,$target);
    
	$style2 = "style2";
	$target = 'input_image/'.$style2;
	$tmp_name = $_FILES['style2']['tmp_name'];
	move_uploaded_file($tmp_name,$target);

   	$content_seg = "content_seg";
	$target = 'input_image/'.$content_seg;
	$tmp_name = $_FILES['content_seg']['tmp_name'];
    	move_uploaded_file($tmp_name,$target);

    	$style_seg = "style_seg";
	$target = 'input_image/'.$style_seg;
	$tmp_name = $_FILES['style_seg']['tmp_name'];
	move_uploaded_file($tmp_name,$target);

	chdir('/var/www/html/input_image');
	exec('chmod 777 *');	
	exec('labelme_json_to_dataset content_seg -o content2_seg');
	exec('labelme_json_to_dataset style_seg -o style2_seg');
	exec('chmod 777 *');	
	chdir('/var/www/html/input_image/content2_seg');
	exec('chmod 777 label.png label_viz.png');
	chdir('/var/www/html/input_image/style2_seg');
	exec('chmod 777 label.png label_viz.png');

	chdir('/home/cho/FastPhotoStyle-master');
	exec("python demo.py --content_image_path /var/www/html/input_image/content2 --style_image_path /var/www/html/input_image/style2 --output_image_path /var/www/html/result_image/result2.png --content_seg_path /var/www/html/input_image/content2_seg/label.png --style_seg_path /var/www/html/input_image/style2_seg/label.png --label_weight $label0 $label1 $label2 $label3 $label4");
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
            <h1 class="head"><a href="index.html">Style Transfer</a></h1>
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
                <h2>원본 이미지</h2>
                <div class="center">
                <p>
                    <img src="http://221.148.108.156/input_image/content2" width="49%">
                    <img src="http://221.148.108.156/input_image/style2" width="49%">
                </p>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <h2>레이블 이미지</h2>
                <div class="center">
                <p>
                    <img src="http://221.148.108.156/input_image/content2_seg/label_viz.png" width="49%">
                    <img src="http://221.148.108.156/input_image/style2_seg/label_viz.png" width="49%">
                </p>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <h2>결과 이미지</h2>
		<p> <img src="http://221.148.108.156/result_image/result2.png" width="100%"> </p>
		<div class="center">
			<a href="http://221.148.108.156/result_image/result2.png" download>이미지 다운로드</a>
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
