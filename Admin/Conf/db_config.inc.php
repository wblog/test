<?php
//w3note.com WBlog配置文件
if (!defined('W3CORE_PATH')) exit();
return array(
	'DB_TYPE'=>'mysql',
	'DB_HOST'=>'127.0.0.1',
	'DB_USER'=>'root',
	'DB_PWD'=>123456, 
	'DB_NAME'=>'fb5',
	'DB_PREFIX'=>'wb_',
	'HOSTURL'=>'http://127.0.0.1/fb5/',
	'RBAC_ROLE_TABLE'=>'wb_role',
	'RBAC_USER_TABLE'=>'wb_role_user',
	'RBAC_ACCESS_TABLE'=>'wb_access',
	'RBAC_NODE_TABLE'=>'wb_node',
	'KEYCODE'=>'JnSraZ',
);
?>