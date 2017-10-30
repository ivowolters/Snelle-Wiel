<li class="nav-item <?php if(BaseClass::$oVariables->sCurrentUrl == $value['link']){ echo "active"; } ?>">
    <a class="nav-link" <?php if($value['dialog'] == true){echo "onClick=\"window.open('$value[link]', 'newwindow', 'width=500,height=700'); return falst;\" href='#'";} else {echo "href='$value[link]'";} ?>><?php echo $value['name']; ?>
<?php if(BaseClass::$oVariables->sCurrentUrl == $value['link']){ echo "<span class=\"sr-only\">(current)</span>";} ?>
    </a>
</li>