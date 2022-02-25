    <div class="col-9" id="userData">
        <h3 class="text-center mt-5 py-3">會員基本資料</h3>
        <form action="/example/user/update_user.php" method="post" class="py-3" id="updataUserForm">
                <div class="mb-2 mt-2  input-group ">
                  <label for="signup_Account" class="mr-2">帳號:</label>
                  <input type="text" class="form-control" id="createAccount" name="account"  value="<?= $_SESSION["user"]["account"]?>" readonly >
                </div>
                <div class="mb-2 mt-2  input-group ">
                  <label for="name" class="mr-2">姓名:</label>
                  <input type="text" class="form-control" id="name" name="name" required value="<?= $_SESSION["user"]["name"]?>">
                </div>
                <div class="errorMsg text-right">
                  <small class="text-danger changeUse" id="nameErrorMsg"></small>
                </div>
                <div class="mb-2 mt-2  input-group ">
                  <label for="email" class="mr-2">信箱:</label>
                  <input type="email" class="form-control" id="email" name="email" required value="<?= $_SESSION["user"]["email"]?>">
                </div>
                <div class="errorMsg text-right">
                  <small class="text-danger changeUse" id="emailErrorMsg"></small>
                </div>
                <div class="mb-2 mt-2  input-group ">
                    <label for="phone" class="mr-2">電話:</label>
                    <input type="tel" class="form-control" name="phone" id="phone" required value="<?= $_SESSION["user"]["phone"]?>">
                </div>
                <div class="errorMsg text-right">
                  <small class="text-danger changeUse" id="phoneErrorMsg"></small>
                </div>
                <input type="text" value="<?=$_SESSION["user"]["id"]?>" name="id" hidden>
                <input type="text" value="<?=$_SESSION["user"]["role"]?>" name="role" hidden>
                <div class="justify-content-end d-flex">
                  <a type="button" class="btn btn-danger m-2 text-white" id="updateUserBtn">修改會員資料</a>
                  <a type="button" class="btn btn-primary m-2 text-white" id="updatePasswordBtn" data-id="<?=$_SESSION["user"]["id"]?>">修改密碼</a>
                  <a type="button" class="btn btn-info m-2 text-white" id="resetDataBtn">重置會員資料</a>
                </div>
                <div class="errorMsg text-right">
                  <small class="text-danger" id="finalErrorMsg"></small>
                </div>
              </form>
            </div>
