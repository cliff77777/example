
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content top-zindex">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">登入</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="account" class="col-form-label">帳號:</label>
            <input type="text" class="form-control" id="account" name="account" required>
          </div>
          <div class="form-group">
            <label for="password" class="col-form-label">密碼:</label>
            <input type="password" class="form-control" id="password" name="password" required></input>
            <div class="errormsg">
            <small class="text-danger errormsg" id="errormsg"></small>
            </div>
            <div class="d-flex justify-content-end"><a href="/example/user/signUp.php">註冊</a></div>            
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" id="loginbtn" role="button">登入</button>
      </div>
    </div>
  </div>
</div>
