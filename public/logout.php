<?php include 'templates/base.php'; ?>

<?php startblock('content') ?>
	<p>Logging out, please wait...</p>
<?php endblock() ?>

<?php startblock('footer_js') ?>
<script type="text/javascript">
    (function ($) {
        // Submit ajax request to API for logout action.
        $.ajax({
            type: 'POST',
            data: 'request=logout',
            url: '<?php echo API_URL . 'index.php'?>',
            async: true,
            success: function (response) {
                // Redirect to the login page.
                document.location.href = '<?php echo BASE_URL ?>';
            },
            error: function () {
                alert("An error has occured while logging out!");
            }
        });
    })(jQuery);
</script>
<?php endblock() ?>
