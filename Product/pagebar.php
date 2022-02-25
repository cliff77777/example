<ul class="pagination">
          <li class="page-item">
            <a  class="page-link prePage" data-prepage=<?php if($p>1){echo $p-1;}else{$p=1;echo$p;}?>>上一頁</a>
          </li>
          <?php 
            for($i=1; $i<=$pages;$i++){
          ?>
            <li class="page-item <?php if($i==$p):echo"active";else:endif?> locationPage">
              <a class="page-link" href='<?=$_SESSION["pageinfo"]["location"]?>?<?=$_SESSION["pageinfo"]["ct"]?>=<?=$_SESSION["pageinfo"]["category"]?>&p=<?=$i?>'><?=$i?></a>
            </li>
          <?php };?>
            <a class="page-link nextPage" data-nextpage=<?php if($p<$pages){echo $p+1;}else{echo$p;}?>>下一頁</a>
          </li>
        </ul>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script>
          let prepage=$(".prePage").data("prepage");
          let nextpage=$(".nextPage").data("nextpage");
          if(prepage!==<?=$p?>){
            $(".prePage").attr("href",'<?=$_SESSION["pageinfo"]["location"]?>?<?=$_SESSION["pageinfo"]["ct"]?>=<?=$_SESSION["pageinfo"]["category"]?>&p=<?php if($p>1){echo $p-1;}else{$p=1;echo$p;}?>')
          }


          if(<?=$p?><nextpage){
            $(".nextPage").attr("href",'<?=$_SESSION["pageinfo"]["location"]?>?<?=$_SESSION["pageinfo"]["ct"]?>=<?=$_SESSION["pageinfo"]["category"]?>&p=<?php if($p<$pages){echo $p+1;}else{echo$p;}?>')
          }

      
        </script>