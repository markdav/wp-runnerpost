<?php
/**
 * Represents the view for the administration dashboard.
 *
 * This includes the header, options, and other information that should provide
 * The User Interface to the end user.
 *
 * @package   Plugin_Name
 * @author    Your Name <email@example.com>
 * @license   GPL-2.0+
 * @link      http://example.com
 * @copyright 2014 Your Name or Company Name
 */
?>

<script>
    jQuery(document).ready(function () {
        jQuery("#run_time").val('2010-10-10 11:11')
        jQuery("#run_time").datetimepicker({dateFormat: 'yy-mm-dd', hour: 12, minute: 15});
        jQuery('#addRunLog').submit(saveRunLog);

    });


    function saveRunLog() {

        var newLogForm = jQuery(this).serialize();

        jQuery.ajax({
            type: "POST",
            url: "<?php echo admin_url( 'admin-ajax.php' ); ?>",
            data: newLogForm,
            success: function (data) {
                jQuery("#feedback").html(data);
            }
        });

        return false;
    }
</script>

<div class="wrap">

    <h2><?php echo esc_html(get_admin_page_title()) ?></h2>

    <p>

    <div id='addOrEditRun'>
        <form id='addRunLog' method="post" enctype="multipart/form-data" action="">
            <table>
                <tr>
                    <th><label for="run_time">When</label></th>
                    <td><input name="run_time" id="run_time" type="text"></td>
                </tr>
                <tr>
                    <th><label for="run_distance">Distance</label></th>
                    <td><input name="run_distance" id="run_distance" size="5" type="text">
                        <select name="run_unit" id="run_unit">
                            <option selected>miles</option>
                            <option>kilometers</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="run_note">Note</label></th>
                    <td><textarea name="run_note" id="run_note" cols="50" rows="5"></textarea></td>
                </tr>
                <tr>
                    <th><label for="run_url">URL</label></th>
                    <td><input name="run_url" id="run_url" type="text" size="50"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Save Run"/></td>
                </tr>
            </table>
            <input type="hidden" name="action" value="saveRunEntry"/>
            <input type="hidden" name="nonce" id="nonce" value="<?php echo wp_create_nonce( 'ajax-save-run-nonce' ) ?>"/>
        </form>
    </p>
    <div id='feedback'></div>
</div>

</div>
