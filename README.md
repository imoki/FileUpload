# FileUpload
## 说明  
局域网内（建议仅用在局域网）用于将手机文件（如文本信息或图片）或电脑文件传输到搭建了此“FileUpload网站”的电脑上。以此达到数据不经过外网而直接在内网内临时传文件，解决了部分人不期望通过社交软件传送图片等文件到电脑的目的。  
  
## IIS服务器报错  
1. 文件大小限制  
1.1 问题：  
PHP Warning:  POST Content-Length of 10305395 bytes exceeds the limit of 8388608 bytes in Unknown on line 0  
1.1.1 解决：  
修改php.ini  
将post_max_size = 8M改为post_max_size = 512M  
将upload_max_filesize = 2M改为upload_max_filesize = 512M  
修改upload_max_filesize = 512M（原始2M），post_max_size = 600M（原始8M），post_max_size 必须大于等于upload_max_filesize  
1.1.2 配置编辑器  
下拉菜单节(S)，选中system.web>httpRuntime  
将executionTimeout的值设为00:30:00(即30分钟)  
下拉菜单节(S)，选中system.webServer>security>requestFiltering  
展开requestlimits，将maxAllowedContentLength的默认值设为512000000(即500m)  
1.1.3 若找不到设置，也可以直接在网站根目录建一个web.config文件，用此方法可以直接省略前面的步骤，web.config内容具体如下  
```HTML
<?xml version="1.0" encoding="UTF-8"?>  
<configuration>  
	<system.webServer>  
		<security>  
			<requestFiltering>  
				<requestLimits maxAllowedContentLength="512000000" />  
			</requestFiltering>  
		</security>  
	</system.webServer>  
<system.web>  
	<httpRuntime executionTimeout="1800" />  
</system.web>  
</configuration>  
```
  
## ps  
executionTimeout数值单位是秒，maxAllowedContentLength的数值单位是KB。  
  
## 问题  
功能暂时简单，暂未对代码进行优化升级，存在文件上传安全漏洞，请勿搭建在公网，建议只用在不经互联网传输的局域网内临时传送小空间图片及文字到电脑。  