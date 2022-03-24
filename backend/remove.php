<?php

if (isset($_POST['path'])) {
    unlink('../' . $_POST['path']);
    echo 'done';
}
