# Example 前後端整合商城網站

## 基本說明

- 該作品是以前後端整合為目標開發的 demo 商城網站，主要應用 CSS、HTML、Jquery、Bootscript、完成前端功能，後端部分則使用 PHP、MYSQL 搭配 XAMPP 打包工具架設，前後端溝通採用 AXIOS 進行。
---

### 使用說明

- 請將GitHub 將專案clone後放入xampp/hotdoc中，再將sql資料夾中的product_db.sql匯入資料庫中並以product_db命名資料庫，再開啟xampp ，可由Login.php登入(圖一) ，也可以從任一網頁按下右上方的登入後輸入資料登入(圖二)。
- 圖一
   ![](https://i.imgur.com/AyTTb7f.png)

- 圖二
   ![](https://i.imgur.com/mua3JBA.png)
   (備註:**如需註冊也可按下密碼下方的註冊文字進入註冊頁面**)
   

## 網站功能
- 帳號區分管理員、一般會員權限， 依權限不同navber顯示的內容也有所不同 。所註冊的帳號都是一般會員帳號，需要透過管理員帳號的帳號管理功能才能更改帳號的權限。 

- 預先創立的管理員帳號密碼提供如下
   - 帳號:admin001
   - 密碼:admin001 

### 一般會員

1. 會員註冊:會員註冊沒有安排在Login.php，需透過其他頁面右上角的登入鈕後會出現註冊的超連結，點選後即可到註冊頁面進入註冊頁面
![image](https://user-images.githubusercontent.com/86657049/157193654-6d0b976d-f391-4075-9bfc-27e7b67e90fc.png)
![image](https://user-images.githubusercontent.com/86657049/157193803-10ab62b5-bfea-48f0-a1d2-8331cf75f779.png)</br>
(補充：輸入帳號的部分可以有透過axios做實時的帳號比對，檢查是否有同樣的帳號)

2. 會員登入

3. 會員基本資料修改</br>![image](https://user-images.githubusercontent.com/86657049/157194013-5a3e6080-00ef-41be-90ff-e79122a23fc0.png)
4. 賣場商品</br>![image](https://user-images.githubusercontent.com/86657049/157194253-53d921ed-113e-4949-b808-7d1defa4c22e.png)</br>
(說明：進入賣場可透過側欄進行商品收尋，按下購物車按鈕可加入購物車)

5. 加入購物車、結帳</br>![image](https://user-images.githubusercontent.com/86657049/157194326-60427687-0238-43fc-ae39-6734b7a9eab7.png)</br>
(補充:按下右上方購物車按鈕可以進入購物車頁面，如沒有登入會員在按下結帳時會跳出需登入後才能結帳的提示訊息，登入後及在按下結帳即可完成結帳)

6. 訂單查詢: 可以在會員中心->購買紀錄中察看訂單
![image](https://user-images.githubusercontent.com/86657049/157194806-b69b93be-ee61-4335-8763-464f76ad659e.png)

7. 登出

### 管理權限會員

1. 擁有一般會員 1~7 項的功能
2. 帳號管理(可修改所有會員的資料以及帳號的權限)
![image](https://user-images.githubusercontent.com/86657049/157195500-7cc58e63-629c-4368-a330-a49ac2102182.png)
3. 查詢所有訂單:透過navbar->訂單列表->查詢
![image](https://user-images.githubusercontent.com/86657049/157195598-1939c68d-1ea3-4c94-9c1f-f854152450a9.png)</br>(補充:進入訂單頁面，按下查詢按鈕可以查看全部會員的訂單，也可以查詢時間查看時間區間的訂單)
4. 刪除訂單:透過navbar->訂單列表->查詢->詳情
![image](https://user-images.githubusercontent.com/86657049/157195772-cee3e518-7410-4f84-8a9e-e7ccfb09f5ed.png)
5. 新增商品：透過navbar->編輯商品可以進入商品頁面，按下新增商品則可進入新增商品頁面
![image](https://user-images.githubusercontent.com/86657049/157196161-8b54f903-6d9a-4d68-88c1-edf983817460.png)
7. 編輯商品

## 技術與版本

- CSS3
- HTML5
- Jquery3.3.1
- Bootscript4.3.1
- PHP
- MYSQL
- XAMPP3.3.0
- AXIOS
