<?php
include_once("upload.php");
?>
<link rel="stylesheet" href="style.css">

<div class="box">
    <table>
        <tr>
            <th>Название</th>
            <th>Содержимое</th>
        </tr>
        <?php foreach ($csvArray as $item): ?>
            <tr>
                <td><?php echo $item[0] ?></td>
                <td><?php echo $item[1] ?></td>
            </tr>
        <?php endforeach ?>
        <form name="form" enctype="multipart/form-data" method="post">
            <div class="load">
                <input class="chooseFile" type="file" name="uploadFile">
                <input class="sumbit" type="submit" value="Отправить" name="button">
            </div>
        </form>
    </table>
</div>

   

