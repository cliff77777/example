
    <div class="mask" id="changePasswordModal">
        <div class="wrapper px-3 ">
            <div class="modal-header">
                <div class="text-center w-100 h4">
                    修改密碼
                </div>
            </div>
            <div class="input-group my-2">
                <label for="checkaccount" class="px-2">帳號:</label>
                <input type="text"  id="checkaccount" class="form-control" readonly data-account="">
            </div>
            <div class="input-group my-2">
                <label for="oldPassword" class="px-2">請輸入舊密碼:</label>
                <input type="password"  id="oldPassword" class="form-control" data-id="">
            </div>
            <form action="/example/user/update_Password.php" id="changePasswordForm" method="post">
            <div class="input-group my-2">
                <label for="newPassword" class="px-2">請輸入新密碼:</label>
                <input type="password" id="newPassword" name="newPassword" class="form-control" readonly>
            </div>
            <div class="input-group my-2">
                <label for="confirmPassword" class="px-2">再次確認密碼:</label>
                <input type="password" id="confirmPassword" class="form-control" readonly>
            </div>
                <input type="text" value="<?=$_SESSION["user"]["id"]?>" name="id" hidden>
            <div class="text-danger text-right" id="changePasswordError"></div>
            <div class="modal-footer justify-content-center">
                <a type="button" class="btn btn-success text-white" id="changeCancel">取消</a>
                <a type="button" class="btn btn-secondary text-white disabled"  id="changePassBtn" disabled="disabled">確認</a>
            </div>
            </form>
        </div>
    </div>
