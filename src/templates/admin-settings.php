<?php
    if (isset($_POST['muaseo_save'])) {
        update_option('muaseo_text', sanitize_text_field($_POST['muaseo_text']));
        update_option('muaseo_countdown', absint($_POST['muaseo_countdown']));
    }

    $text = get_option('muaseo_text', 'Kết thúc đếm ngược!');
    $countdown = get_option('muaseo_countdown', 60);
?>

<div class="wrap">
    <h2>Cài đặt MuaSEO</h2>

    <form method="post">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scrope="row">
                        <label for="muaseo_text">Mã code hiển thị:</label>
                    </th>
                    <td>
                        <input type="text" id="muaseo_text" name="muaseo_text" value="<?php echo esc_attr($text); ?>" />
                    </td>
                </tr>
                <tr>
                    <th scrope="row">
                        <label for="muaseo_countdown">Thời gian (giây):</label>
                    </th>
                    <td>
                        <input type="number" id="muaseo_countdown" name="muaseo_countdown" value="<?php echo esc_attr($countdown); ?>" />
                    </td>
                </tr>
            </tbody>
        </table>
        
        <p>
            <input type="submit" name="muaseo_save" value="Lưu cài đặt" class="button-primary" />
        </p>
    </form>

    <p>Sử dụng shortcode <code>[muaseo]</code> chèn vào nơi muốn hiển thị.</p>
    <p>* Nếu chèn trực tiếp vào file code, bạn dùng đoạn mã sau: <code>&lt;?php echo  do_shortcode('[muaseo]') ?&gt;</code></p>
</div>