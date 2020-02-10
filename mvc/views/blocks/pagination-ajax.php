<?php 
  $numberPage = $data['number_page'];
  $currentPage = $data['current_page'];
 ?>
<nav aria-label="..." >
  <ul class="pagination justify-content-center">
    <li class="page-item <?php echo $currentPage==1?'disabled':'' ?>">
      <button class="page-link page-item-ajax" href="" tabindex="-1" page="<?php echo $currentPage-1; ?>">Trang trước</button>
    </li>
    <?php 
        for($i=1;$i<=$numberPage;$i++){
          if($i==$currentPage){
            echo '<li class="page-item active ">
                    <button class="page-link page-item-ajax" page="'.$i.'">'.$i.'</button>
                  </li>';
          }
          else
            echo '<li class="page-item "><button class="page-link page-item-ajax" page="'.$i.'">'.$i.'</button></li>';
        }
     ?>
    <li class="page-item <?php echo $currentPage==$numberPage?'disabled':'' ?>">
      <button class="page-link page-item-ajax" page="<?php echo $currentPage+1; ?>">Trang sau</button>
    </li>
  </ul>
</nav>
