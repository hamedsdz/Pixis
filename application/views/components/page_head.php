<title>Pixis</title>

<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<!-- CSS -->
<link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/dist/css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="<?= base_url('/assets/plugins/kamadatepicker/kamadatepicker.min.css') ?>">

<!-- Main CSS -->
<link rel="stylesheet" href="<?= base_url('assets/css/globalStyle.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/dashboard/style.css') ?>">

<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">

<!-- Java Script -->
<script type="text/javascript" language="javascript" src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<script type="text/javascript" language="javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" language="javascript" src="<?= base_url('/assets/plugins/kamadatepicker/kamadatepicker.min.js') ?>"></script>
<script type="text/javascript" language="javascript" src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    var baseUrl = '<?= base_url() ?>';
    var csrfTokenName = '<?= $this->security->get_csrf_token_name() ?>';
</script>