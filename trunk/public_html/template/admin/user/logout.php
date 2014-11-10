<?php
unset($_SESSION);
session_unset();
session_destroy();
?><script type="text/javascript">
window.location = "<?=Config::get('WEBSITE_URL')?>admin/";
</script>