<?php
function sendHeaders($file, $type, $name=NULL)
{
    if (empty($name))
    {
        $name = basename($file);
    }
    header('Pragma: public');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Cache-Control: private', false);
    header('Content-Transfer-Encoding: chunked');
    header('Content-Disposition: attachment; filename="'.$name.'";');
    header('Content-Type: ' . $type);
    header('Content-Length: ' . filesize($file));
}
$file = 'Sample.jpg';
if (is_file($file))
{
    sendHeaders($file, 'image/jpeg', 'My picture.jpg');
    $chunkSize = 16 * 16;
    $handle = fopen($file, 'rb');
    while (!feof($handle))
    {
        $buffer = fread($handle, $chunkSize);
        echo $buffer;
        ob_flush();
        flush();
        sleep(1);
    }
    fclose($handle);
    exit;
}