<?php
$maxPage = floor((($dataCount - 1) / $this->config->item('page_limit'))) + 1;
if ($maxPage > 1) {
    ?>
    <ul class="pagination pagination-sm inline">
        <li>
            <button class="btn btn-primary" name="page" value="1" <?php echo $pagination['page'] == 1 ? 'disabled' : '' ?>><<</button>
        </li>
        <li>
            <button class="btn btn-primary" name="page" value="<?php echo $pagination['page'] - 1 ?>" <?php echo $pagination['page'] == 1 ? 'disabled' : '' ?>><</button>
        </li>
        <?php
        $countPageNumber = 3;
        for ($i = -3; $i <= $countPageNumber; $i++) {
            $pageNumber = $pagination['page'] + $i;
            if ($pageNumber > 0) {
                if ($pageNumber <= $maxPage) {
                    $btn = '<li><button class="btn btn-primary" name="page" value="' . $pageNumber . '"';
                    if ($i === 0) {
                        $btn .= ' disabled';
                    }
                    echo $btn .= '>' . $pageNumber . '</button></li>';
                }
            } else {
                $countPageNumber++;
            }
        }
        ?>
        <li>
            <button class="btn btn-primary" name="page" value="<?php echo $pagination['page'] + 1 ?>" <?php echo $pagination['page'] == $maxPage ? 'disabled' : '' ?> >></button>
        </li>
        <li>
            <button class="btn btn-primary" name="page" value="<?php echo $maxPage ?>" <?php echo $pagination['page'] == $maxPage ? 'disabled' : '' ?>>>></button>
        </li>
    </ul>
    <?php
}?>