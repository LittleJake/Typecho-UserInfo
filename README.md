# Typecho-UserInfo

## 简介

UserInfo插件用于侧边栏创建widget窗口提供设置文本支持。

## 安装

1. 克隆项目

   ```` bash
   git clone https://github.com/LittleJake/Typecho-UserInfo.git
   ````

2. 将文件夹UserInfo复制至Typecho插件目录

3. 在Typecho后台启用插件

4. 设置插件，修改添加对应文字

## Widget调用

插入调用代码

````php
<?php
  $user = UserInfo_Plugin::getUser();
?>
````

具体返回字段

````php
array (size=3)
  'display' => boolean true
  'intro' => string '描述'
  'logo_url' => string 'logo url'
````

## 开源协议

[Apache License Version 2.0](https://github.com/LittleJake/Typecho-UserInfo/blob/master/LICENSE)