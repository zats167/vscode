<?php
/*$sql = "
";
pdo_run($sql);
*/
pdo_query("insert into ".tablename('jyfen_plugin')."(title,addtime) values('jy_fen_plugin_red',unix_timestamp(now()));");

?>