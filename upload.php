<?php
include_once("index.php");
$routCsv = glob("*.csv");
$newRoutCsv = $_FILES['uploadFile']['name'];
if (!is_dir("./upload")) {
    mkdir("./upload");
}
//получаем данные из csv файла в массив
$csvArray = [];
if($_FILES['uploadFile']['name'] != NULL)
{
    if (($file = fopen($routCsv[0], "r+")) !== false) {
        while (($data = fgetcsv($file, 1000, ";")) !== false) {
            $csvArray[] = $data;
        }
    }
    fclose($file);
}

//перезаписываем значения массива в файлы
for ($i = 0; $i < count($csvArray); $i++) {
    $rout = "./upload/" . $csvArray[$i][0];
    if (!file_exists($rout)) {
        $nameData[] = ($csvArray[$i]);
        $fileopen = fopen($rout, "a+");
        $pushText = fwrite($fileopen, $csvArray[$i][1]);
        fclose($fileopen);
    }
}
//создаём новый файл на сервере
if ($_POST["button"] != NULL and $_FILES['uploadFile']['name'] != NULL) {
    $routLoad = $_FILES['uploadFile']['name'];
    for ($i = 0; $i< count($routCsv); $i++)
    {
    unlink($routCsv[$i]);
    }
    move_uploaded_file($_FILES['uploadFile']['tmp_name'], $routLoad);
}

?>