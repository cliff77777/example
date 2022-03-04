# Example 前後端整合商城網站

## 基本說明

- 該作品是以前後端整合為目標開發的 demo 商城網站，主要應用 CSS、HTML、Jquery、Bootscript、完成前端功能，後端部分則使用 PHP、MYSQL 搭配 XAMPP 打包工具架設，前後端溝通採用 AXIOS 進行。

## 網站功能

### 一般會員

1. 會員註冊
2. 會員登入
3. 會員基本資料修改
4. 賣場商品
5. 加入購物車、結帳
6. 訂單查詢
7. 登出

### 管理權限會員

1. 擁有一般會員 1~7 項的功能
2. 帳號管理(可修改所有會員的資料以及帳號的權限)
3. 查詢所有訂單
4. 刪除訂單
5. 新增商品
6. 編輯商品

### 使用說明

- 如需實際使用請將 clone 後將全部資料放入 xampp/hotdoc 中，再將 sql 資料夾中的 product_db.sql 匯入資料庫中並以 product_db 命名資料庫，再且開啟 xampp 後可以從

1. Login.php 登入
   ![](https://i.imgur.com/AyTTb7f.png)
2. 也可以從任一網頁按下右上方的登入後輸入資料登入，**如需註冊也可按下密碼下方的註冊文字進入註冊頁面**
   ![](https://i.imgur.com/mua3JBA.png)

- 帳號區分管理員以及一般會員權限，**依權限的不同再 navber 可以看到的內容也將不同**，所註冊的帳號都是一般會員帳號，需要透過管理員帳號透過帳號管理才能更改帳號的權限。
  ![](https://i.imgur.com/jnLqBuo.png)
  ![](https://i.imgur.com/J3rn8iZ.png)

- 預先創立的管理員帳號密碼提供如下
  - 帳號:admin001
  - 密碼:admin001

## 技術與版本

- CSS3
- HTML5
- Jquery3.3.1
- Bootscript4.3.1
- PHP
- MYSQL
- XAMPP3.3.0
- AXIOS
