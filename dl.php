<?php




$file_path = './sample.csv';

// HTTPヘッダ設定
// ファイルを強制ダウロードする場合↓
// header('Content-Type: application/force-download');
// ファイルの種類は気にしない場合↓
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename*=UTF-8\'\'' . rawurlencode($file_path));

// ファイル出力
// readfile($file_path);

for ($i=0; $i < 10; $i++) { 
  echo "$i\n";
  sleep(1);
}