<html>
<button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#userModal" data-whatever="@getbootstrap" data-id="${user.id}">瀏覽</button>
<div class="modal fade userModal" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userModalLabel">帳號詳情</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <form action="update_user.php" method="post">
            <div class="form-group">
              <label for="account" class="col-form-label">帳號:</label>
              <input type="text" class="form-control accountModal"  readonly name="account">
            </div>
            <span class="">權限:</span>
            <div class="form-group">
              <label for="admin" class="col-form-label">管理員</label>
              <input type="radio" class="form-check-label ml-2 adminModal" name="role" value="0" >
              <label for="account" class="col-form-label">會員</label>
              <input type="radio" class="form-check-label ml-2 memberModal" name="role" value="1" >
            </div>
            <div class="form-group">
              <label for="name" class="col-form-label">姓名:</label>
              <input type="text" class="form-control nameModal"  name="name">
            </div>
            <div class="form-group">
              <label for="email" class="col-form-label">信箱:</label>
              <input type="email"  class="form-control emailModal"   name="email">
            </div>
            <div class="form-group">
              <label for="phone" class="col-form-label">電話:</label>
              <input type="tel" class="form-control phoneModal"  name="phone">
            </div>
            <div class="form-group">
              <label for="careaTime" class="col-form-label">創建時間:</label>
              <input type="text" class="form-control createTimeModal"  name="createTime" readonly>
            </div>
            <div class="d-none">
              <input type="text" class="idModal"  name="id" readonly>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" data-dismiss="modal">取消</button>
              <button type="submit" class="btn btn-primary">更改</button>
              <a class="btn btn-danger text-white delete-btn" href="" data-id="">刪除帳號</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</html>