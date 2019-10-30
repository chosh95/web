<?php
    $label_0 = (int)$_POST['label_0'];
    $label_1 = (int)$_POST['label_1'];
    $label_2 = (int)$_POST['label_2'];
    $label_3 = (int)$_POST['label_3'];
    $label_4 = (int)$_POST['label_4'];

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

    chdir('input_image');
    exec('labelme_json_to_dataset content_seg.json -o content_seg');
    exec('labelme_json_to_dataset style_seg.json -o style_seg');

    chdir('/home/cho/FastPhotoStyle-master');
    exec('python demo.py --content_image_path /var/www/html/input_image/content2 \
                        --style_image_path /var/www/html/input_image/style2 \
                        --output_image_path /var/www/html/result_image/result2.png \
                        --style_seg_path /var/www/html/input_image/style_seg/label.png \
                        --content_seg_path /var/www/html/input_image/content_seg/label.png\
                        --label_weight $label_0 $lable_1 $lable_2 $lable_3 $lable_4');
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
                <h2>결과 이미지</h2>
		<p> <img src="result_image/result2.png" width="100%"> </p>
		<div class="center">
			<a href="result_image/result2.png" download>이미지 다운로드</a>
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
