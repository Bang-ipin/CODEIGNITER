<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $filenya ='';
        foreach($data->result_array() as $rows):
            $filenya = $rows['files'];
        endforeach;

        $file = $filenya;
        $filename = $filenya;
        // header ('Content-type: application/pdf');
        // header ('Content-Disposition: inline; filename="'.$filename.'"');
        // header ('Content-Transfer-Encoding:binary');
        // header ('Accept-Ranges:bytes');
        // @readfile($file);
        echo " <object data='".base_url('asset/files/'.$filenya.'')."' width='1024' height='600'  type='application/pdf' ></object>";
    ?>
</body>
</html>



