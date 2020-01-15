<?php 
  $numberPage = $data['number_page'];
  $currentPage = $data['current_page'];
 ?>
<nav aria-label="..." >
  <ul class="pagination justify-content-center">
    <li class="page-item <?php echo $currentPage==1?'disabled':'' ?>">
      <a class="page-link" href="<?php echo $data['link_page'].($currentPage-1); ?>" tabindex="-1">Trang trước</a>
    </li>
    <?php 
        for($i=1;$i<=$numberPage;$i++){
          if($i==$currentPage){
            echo '<li class="page-item active">
                    <a class="page-link" href="'.$data['link_page'].$i.'">'.$i.'</a>
                  </li>';
          }
          else
            echo '<li class="page-item"><a class="page-link" href="'.$data['link_page'].$i.'">'.$i.'</a></li>';
        }
     ?>
    <li class="page-item <?php echo $currentPage==$numberPage?'disabled':'' ?>">
      <a class="page-link" href="<?php echo $data['link_page'].($currentPage+1); ?>">Trang sau</a>
    </li>
  </ul>
</nav>
