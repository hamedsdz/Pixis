<?php
$this->load->model('User_m');
$this->load->model('Post_m');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('components/page_head',$this->data); ?>
</head>

<body>
    <div id="page">
        <?php
        $this->load->view('components/page_top',$this->data);
        $this->load->view($this->data['page'],$this->data);

        ?>

    </div>

    <footer>
        <?php
        $this->load->view('components/page_foot',$this->data);
        ?>
    </footer>
</body>

</html>
