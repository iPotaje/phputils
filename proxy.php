<?php
// http://apirtod.laspalmasgc.es/api/rest/datasets/hoteles.json?items=50
//http://localhost/utils/proxy.php?url=http://apirtod.laspalmasgc.es/api/rest/datasets/hoteles.json?items=50
require('lib/cors.php');

if (!isset($_GET['url']))
{
  echo "Error URL. Must use: ?url=http://example.com";
  return -1;
}

$url = $_GET['url'];

//http://stackoverflow.com/questions/10524748/why-im-getting-500-error-when-using-file-get-contents-but-works-in-a-browser
$opts = array('http' => array(
    'method' => "GET",
    'header' => "User-Agent Mozilla/5.0 (Windows NT 6.1; WOW64; rv:24.0) Gecko/20100101 Firefox/24.0\r\n"
    . "Accept:text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8\r\n"
    . "Accept-Encoding:gzip, deflate\r\n"
    . "Accept-Language:cs,en-us;q=0.7,en;q=0.3\r\n"
    . "Connection:keep-alive\r\n"
    ));
$context = stream_context_create($opts);
$html = file_get_contents($url, false, $context);

cors();

echo $html;
