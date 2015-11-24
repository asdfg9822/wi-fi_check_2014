<!DOCTYPE html>
<html>
<head>
    <title>Camera 기능</title>
</head>
<body>
    <form action="#" method="POST">
    Record List
    <select name="video_name" onchange="submit();">
        <option> Choice Video</option>
        <optgroup label="--------------"></optgroup>
    <?php foreach($file_name as $i=>$lists){ ?>
        <option value="<?php echo $file_val[$i];?>" > <?php echo $lists;?></option>
    <?php } ?>
    </select>
    <br>
    <video width="800" height="600" controls autoplay>
        <source src="/check_sys/files/video/<?php echo $video_name;?>" type="video/mp4">
        Your browser does not support the video tag.
     </video>
    </form>
</body>
</html>