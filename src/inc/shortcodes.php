<?php
function muaseo_shortcode() {
    ob_start();
    ?>
    <div class="muaseo-wrapper">
        <button id="muaseo-button"></button>
        <div id="muaseo-countdown"></div>
    </div>
    <div class="muaseo-text-wrapper hide">
        <div class="">Mã code: </div>
        <div id="muaseo-text"></div>
        <button class="muaseo-copy"></button>
    </div>

    <script>
        (function($) {
            $(document).ready(function() {
                var countdown = <?php echo get_option('muaseo_countdown', 60); ?>;
                var textToShow = '<?php echo esc_html(get_option('muaseo_text', 'Kết thúc đếm ngược!')); ?>';

                var countdownInterval;
                var countdownElement = $('#muaseo-countdown');
                var textElement = $('#muaseo-text');

                function startCountdown() {
                    countdownElement.text('Đợi ' + countdown + 's');

                    countdownInterval = setInterval(function() {
                        countdown--;
                        countdownElement.text('Đợi ' + countdown + 's');

                        if (countdown <= 0) {
                            clearInterval(countdownInterval);
                            countdownElement.hide();
                            $('.muaseo-text-wrapper').removeClass('hide');
                            textElement.text(textToShow);
                        }
                    }, 1000);
                }

                $('#muaseo-button').click(function() {
                    startCountdown();
                });

                $('.muaseo-copy').click(function() {
                    var copyButton = $(this);
                    var textToCopy = textElement.text();

                    var tempInput = document.createElement('textarea');
                    tempInput.value = textToCopy;
                    document.body.appendChild(tempInput);

                    tempInput.select();
                    document.execCommand('copy');
                    document.body.removeChild(tempInput);

                    alert('Đã sao chép');
                });

                // Xử lý sự kiện mở tab
                var tabActive = true;

                $(window).on('focus', function() {
                    if (!tabActive) {
                        tabActive = true;
                        startCountdown();
                    }
                });

                $(window).on('blur', function() {
                    tabActive = false;
                    clearInterval(countdownInterval);
                });
            });
        })(jQuery);
    </script>
    <?php
    return ob_get_clean();
}

add_shortcode('muaseo', 'muaseo_shortcode');

// Styles
function muaseo_style() {
    wp_enqueue_style('muaseo-custom', MUASEO_URI . 'src/assets/css/muaseo.css');
}
add_action('wp_enqueue_scripts','muaseo_style');