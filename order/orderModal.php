<html>
<div class="modal fade orderModal" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title  " id="orderModalLabel">訂單詳情</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <div class="">訂單號:<span id="orderNumberModal"></span></div>
          <table class="table  table-striped">
            <thead>
              <tr>
                <th>商品名稱</th>
                <th>購買數量</th>
                <th>商品單價</th>
                <th>小計</th>
              </tr>
            </thead>
            <tbody id="modalTable">
              <!-- <tr>
                <td class="productNameModal" id=""></td>
                <td class="productAmountModal" id=""></td>
                <td class="productPPricrModal" id=""></td>
                <td class="subTotalModal" id="subTotalModal"></td>
                
              </tr> -->
            </tbody>
            <tfoot>
            <tr class="border-0">
                <td colspan="3" class="">總金額:</td>
                <td class="text-center" id="modalTotal"></td>
              </tr>
            </tfoot>

          </table>
        
        
          
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">返回</button>
            <form action="delete_Order.php" method="post">
              <input type="text" hidden name="id" id="deleteID">
              <input type="text" value="checkpassword" hidden name="checkpassword" id="checkpassword">
              <?php if($_SESSION["user"]["role"]===0):?>
            <button type="submit" class="btn btn-danger" id="modalDeleteBtn">刪除</button>
            <?php ; endif;?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</html>