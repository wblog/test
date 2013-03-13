<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>wBlog博管程序by www.w3note.com</title>
<script type="text/javascript" src="../Public/Js/jquery-1.4.3.min.js"></script>
<script language="javascript" type="text/javascript" src="../Public/Js/formvalidator.js" charset="UTF-8"></script>
<script language="javascript" type="text/javascript" src="../Public/Js/formvalidatorregex.js" charset="UTF-8"></script>
<link href="./install.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});	
	$("#db_host").formValidator({onshow:"填写主机",onfocus:"填写mysql主机名称/IP地址"}).inputValidator({min:1,max:50,onerror:"填写主机"});
	$("#db_user").formValidator({onshow:"mysql用户名",onfocus:"mysql用户名"}).inputValidator({min:2,max:20,onerror:"mysql用户名"}).regexValidator({regexp:"^\\w+$",onError:"格式不正确"});
	$("#db_pwd").formValidator({onshow:"密 码",onfocus:"密码"}).inputValidator({min:6,max:20,onerror:"请填写密码"});  
	$("#db_name").formValidator({onshow:"填写数据库名",onfocus:"填写数据库名"}).inputValidator({min:2,max:20,onerror:"填写数据库名"}).regexValidator({regexp:"^\\w+$",onError:"格式不正确"});
	$("#db_prefix").formValidator({onshow:"填写数据前缀",onfocus:"填写数据前缀"}).inputValidator({min:1,max:20,onerror:"填写数据前缀"}).regexValidator({regexp:"^\\w+$",onError:"格式不正确"});	
	$("#hosturl").formValidator({onshow:"填写安装域名",onfocus:"域名需以'/'结尾"}).inputValidator({min:10,max:50,onerror:"填写安装域名"}).regexValidator({regexp:"^http[s]?:\\/\\/([\\w-]+\\.)+[\\w-]+([\\w-./?%&=]*)?$",onError:"格式不正确"});
	$("#admin").formValidator({onshow:"填写后台管理员名称",onfocus:"填写后台管理员名称"}).inputValidator({min:3,max:20,onerror:"填写后台管理员名称"}).regexValidator({regexp:"^\\w+$",onError:"格式不正确"});
	$("#adminpwd").formValidator({onshow:"密码要大于6个字符",onfocus:"密码要大于6个字符"}).inputValidator({min:6,max:20,onerror:"密码要大于6个字符"}); 
	$("#readminpwd").formValidator({onshow:"确认密码",onfocus:"确认密码"}).inputValidator({min:1,max:50,onerror:"请确认密码"}); 
	
	
});
</script>

</head>
<body>

<form action="check.php" method="post" id="myform" >
<div id="form">

		<p>&nbsp;</p>
		<div class="fieldset">
			<span class="legend">wBlog博客管理系统安装程序</span>
            <div id="result" class="none result" style="font-family:微软雅黑,Tahoma;margin-bottom: 10px;font-size:18px;color:green;text-align:center"></div>
			<table style="vertical-align:top;">
				<tr>
					<td><label for="lastname">填写主机:</label></td>
					<td><input name="db_host" id="db_host" type="text" value="127.0.0.1" class="required" style="width: 180px" /></td>
				</tr>
				<tr>
					<td><label for="firstname">用 户 名:</label></td>
					<td><input type="text" name="db_user" id="db_user" value="root" style="width: 180px" /></td>
				</tr>	
                <tr>
					<td><label for="firstname">密　　码:</label></td>
					<td>
                   <input type="password" name="db_pwd" id="db_pwd" style="width: 180px" />
                    </td>
				</tr>	
                  <tr>
					<td><label for="firstname">数据库名:</label></td>
					<td>
                   <input type="text" name="db_name" id="db_name" style="width: 180px" />
                    </td>
				</tr>
				 <tr>
					<td><label for="firstname">数据表前缀:</label></td>
					<td>
                   <input type="text" name="db_prefix" id="db_prefix" style="width: 180px" value="wb_" />
                    </td>
				</tr>
                <tr>
					<td><label for="firstname">安装域名:</label></td>
					<td>
                   <input type="text" name="hosturl" id="hosturl" style="width: 180px"  />
                    </td>
				</tr>
			</table>
			<br />
             
			
		</div><br>

		<div class="fieldset">
			<span class="legend">填写后台管理员信息</span>
            <div id="result" class="none result" style="font-family:微软雅黑,Tahoma;margin-bottom: 10px;font-size:18px;color:green;text-align:center"></div>
			<table style="vertical-align:top;">
				
				<tr>
					<td><label for="firstname">用 户 名:</label></td>
					<td><input type="text" name="admin" id="admin" style="width: 180px" value="admin"/></td>
				</tr>	
                <tr>
					<td><label for="firstname">密　　码:</label></td>
					<td>
                   <input type="password" name="adminpwd" id="adminpwd" style="width: 180px" />
                    </td>
				</tr>	
               <tr>
					<td><label for="firstname">确认密码:</label></td>
					<td>
                   <input type="password" name="readminpwd" id="readminpwd" style="width: 180px" />
                    </td>
				</tr>	   
			</table>
			<br />
             			
		</div>
	
</div>
<div style="text-align:right;width: 650px;margin-top:10px;"><input type="submit"  name=install id="dosubmit" value="安装"   /></div>
</form>
</body>
</html>