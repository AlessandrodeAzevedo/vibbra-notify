<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var message = "<?= $message ?>";
    var timeOut =((message.length / 10) * 1000) > 5000 ? (message.length / 10) * 1000 : 5000;
    notyf.success({
        message: message,
        duration: timeOut,
        icon: false
    });
});
</script>
