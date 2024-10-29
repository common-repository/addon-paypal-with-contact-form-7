<?php

if (!defined('ABSPATH'))
  exit;
if (!class_exists('cfywpay_cf7_panel')) {
    class cfywpay_cf7_panel {

        protected static $instance;

        function cf7wpay_editor_panels( $panels ) {
            $paypal = array(
                'paypal-panel' => array(
                    'title' => __( 'Paypal Settings', 'contact-form-7' ),
                    'callback' => array( $this, 'cf7wpay_pp_strp_editor_panel_popup'),
                ),
                'stripe-panel' => array(
                    'title' => __( 'Stripe Settings', 'contact-form-7' ),
                    'callback' => array( $this, 'cf7wpay_pp_strp_settings_editor_panel_popup'),
                ),
            );
            $panels = array_merge($panels,$paypal);
            return $panels;
        }


        function cf7wpay_pp_strp_editor_panel_popup() {
            
            if(isset($_REQUEST['post']) && $_REQUEST['post'] != '') {
                $formid = sanitize_text_field($_REQUEST['post']);     
            } else {
                $formid = NULL;
            }
            
            ?>
            <h2>Paypal</h2>
                <fieldset>
                    <table class="cf7wpay_paypal_main">
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <label>Use Paypal</label>
                                </th>
                                <td>
                                    <input type="checkbox" name="enabled_use_paypal" value="on" <?php if(get_post_meta( $formid, CF7WPAYPREFIX.'enabled_use_paypal', true ) == "on") { echo "checked"; } ?>><label>Use Paypal</label>
                                </td>
                            </tr>
                           
                            <tr>
                                <th scope="row">
                                    <label>Customer Email</label>
                                </th>
                                <td>
                                    <input type="text" name="customer_email" value="<?php echo get_post_meta( $formid, CF7WPAYPREFIX.'customer_email', true );?>">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label>Payment Gateway</label>
                                </th>
                                <td>
                                    <p><strong>[payment payment]</strong> - Use this custom tag to add payment method option to your form.</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </fieldset>
             <h2>PayPal Settings</h2>
                <fieldset>
                    <table class="cf7wpay_paypal_main">
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <label>Use Sandbox</label>
                                </th>
                                <td>
                                    <input type="checkbox" name="enabled_use_Sandbox" <?php if(get_post_meta( $formid, CF7WPAYPREFIX.'enabled_use_Sandbox', true ) == "on"){ echo "checked"; } ?>><label>Use Sandbox</label>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label>Pay with Paypal Label</label>
                                </th>
                                <td>
                                    <input type="text" name="pw_paypal_label" value="Pay with Paypal" disabled>
                                    <label class="ocpw_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/addon-paypal-with-contact-form-7-pro/" target="_blank">link</a></label>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label>PayPal Business Email</label>
                                </th>
                                <td>
                                    <input type="text" name="paypal_bus_email" value="<?php echo get_post_meta( $formid, CF7WPAYPREFIX.'paypal_bus_email', true );?>">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label>Currency</label>
                                </th>
                                <td>
                                    <?php $currency = get_post_meta( $formid, CF7WPAYPREFIX.'currency', true ); ?>
                                    <select name="currency">
                                        <option value="AUD" <?php if($currency == "AUD"){ echo "selected"; }?>>
                                            Australian dollar (AUD)
                                        </option>
                                        <option value="BRL" <?php if($currency == "BRL"){ echo "selected"; }?>>
                                            Brazilian real (BRL)
                                        </option>
                                        <option value="GBP" <?php if($currency == "GBP"){ echo "selected"; }?>>
                                            British pound (GBP)
                                        </option>
                                        <option value="CAD" <?php if($currency == "CAD"){ echo "selected"; }?>>
                                            Canadian dollar (CAD)
                                        </option>
                                        <option value="CZK" <?php if($currency == "CZK"){ echo "selected"; }?>>
                                            Czech koruna (CZK)
                                        </option>
                                        <option value="DKK" <?php if($currency == "DKK"){ echo "selected"; }?>>
                                            Danish krone (DKK)
                                        </option>
                                        <option value="EUR" <?php if($currency == "EUR"){ echo "selected"; }?>>
                                            Euro (EUR)
                                        </option>
                                        <option value="HKD" <?php if($currency == "HKD"){ echo "selected"; }?>>
                                            Hong kong Dollar (HKD)
                                        </option>
                                        <option value="HUF" <?php if($currency == "HUF"){ echo "selected"; }?>>
                                            Hungarian forint (HUF)
                                        </option>
                                        <option value="ILS" <?php if($currency == "ILS"){ echo "selected"; }?>>
                                            Israeli new shekel (ILS)
                                        </option>
                                        <option value="JPY" <?php if($currency == "JPY"){ echo "selected"; }?>>
                                            Japanese yen (JPY)
                                        </option>
                                        <option value="MYR" <?php if($currency == "MYR"){ echo "selected"; }?>>
                                            Malaysian Ringgit (MYR)
                                        </option>
                                        <option value="MXN" <?php if($currency == "MXN"){ echo "selected"; }?>>
                                            Mexican peso (MXN)
                                        </option>
                                        <option value="TWD" <?php if($currency == "TWD"){ echo "selected"; }?>>
                                            New Taiwan dollar (TWD)
                                        </option>
                                        <option value="NZD" <?php if($currency == "NZD"){ echo "selected"; }?>>
                                            New Zealand dollar (NZD)
                                        </option>
                                        <option value="NOK" <?php if($currency == "NOK"){ echo "selected"; }?>>
                                            Norwegian krone (NOK)
                                        </option>
                                        <option value="PHP" <?php if($currency == "PHP"){ echo "selected"; }?>>
                                            Philippine peso (PHP)
                                        </option>
                                        <option value="PLN" <?php if($currency == "PLN"){ echo "selected"; }?>>
                                            Polish złoty (PLN)
                                        </option>
                                        <option value="RUB" <?php if($currency == "RUB"){ echo "selected"; }?>>
                                            Russian ruble (RUB)
                                        </option>
                                        <option value="SGD" <?php if($currency == "SGD"){ echo "selected"; }?>>
                                            Singapore dollar (SGD)
                                        </option>
                                        <option value="SEK" <?php if($currency == "SEK"){ echo "selected"; }?>>
                                            Swedish krona (SEK)
                                        </option>
                                        <option value="CHF" <?php if($currency == "CHF"){ echo "selected"; }?>>
                                            Swiss franc (CHF)
                                        </option>
                                        <option value="THB" <?php if($currency == "THB"){ echo "selected"; }?>>
                                            Thai baht (THB)
                                        </option>
                                        <option value="TRY" <?php if($currency == "TRY"){ echo "selected"; }?>>
                                            Turkish Lira (TRY)
                                        </option>
                                        <option value="USD" <?php if($currency == "USD"){ echo "selected"; }?>>
                                            U.S dollar (USD)
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label>Success Return URL</label>
                                </th>
                                <td>
                                    <input type="text" name="suc_url" value="<?php echo get_post_meta( $formid, CF7WPAYPREFIX.'suc_url', true );?>">
                                </td>
                            </tr> 
                            <tr>
                                <th scope="row">
                                    <label>Cancel Return URL (Optional)</label>
                                </th>
                                <td>
                                    <input type="text" name="can_url" value="<?php echo get_post_meta( $formid, CF7WPAYPREFIX.'can_url', true );?>">
                                </td>
                            </tr> 
                            
                        </tbody>
                    </table>
                     <h2>Static Value</h2>
                    <table class="cf7wpay_paypal_main">
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <label>Item Description</label>
                                </th>
                                <td>
                                    <input type="text" name="item_description" value="Demo Testing" disabled>
                                    <label class="ocpw_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/addon-paypal-with-contact-form-7-pro/" target="_blank">link</a></label>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label>Item ID / SKU</label>
                                </th>
                                <td>
                                    <input type="text" name="item_id_sku" value="SKU_DEMO" disabled>
                                    <label class="ocpw_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/addon-paypal-with-contact-form-7-pro/" target="_blank">link</a></label>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label>Custom Amount</label>
                                </th>
                                <td>
                                    <?php $amount_choice = get_post_meta( $formid, CF7WPAYPREFIX.'amount_choice', true ); ?>
                                    <input type="number" name="paypal_amount" value="<?php echo get_post_meta( $formid, CF7WPAYPREFIX.'paypal_amount', true );?>">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label>Custom Quantity</label>
                                </th>
                                <td>
                                    <input type="number" name="paypal_quantity" value="<?php echo get_post_meta( $formid, CF7WPAYPREFIX.'paypal_quantity', true );?>"  min="1">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label>Tax Fixed Rates</label>
                                </th>
                                <td>
                                    <input type="number" name="tax_rates" value="<?php echo get_post_meta( $formid, CF7WPAYPREFIX.'tax_rates', true );?>">
                                    <span class="cfppl7notice">Set a fixed amount,for Example for $0.70 tax,enter 0.70</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label>Discount rates</label>
                                </th>
                                <td>
                                    <input type="number" name="discount_rate" value="<?php echo get_post_meta( $formid, CF7WPAYPREFIX.'discount_rate', true );?>">
                                </td>
                                
                            </tr>
                        </tbody>
                    </table>
                    <h2>Dynamic Value</h2>
                    <p><strong>Note:</strong> When using <strong>Custom Amount</strong> and <strong>Custom Quantity</strong> dynamic values defined below will be ignored, means either use <strong>Custom Amount</strong> and <strong>Custom Quantity</strong> for single static product or use multiple products adding details below.</p>
                    <div class="after-add-more">
                        <div class="field_wrapper">
                            <div class="custom_product">
                                <div class="ocscw_child_div">
                                    <?php 
                                        $table_dis = get_post_meta( $formid, CF7WPAYPREFIX.'dis', true);
                                        $table_prices = get_post_meta( $formid, CF7WPAYPREFIX.'prices', true);
                                        $table_qunty = get_post_meta( $formid, CF7WPAYPREFIX.'qunty', true);
                                        $table_array = unserialize($table_dis);
                                        $table_price_array = unserialize($table_prices);
                                        $table_qunty_array = unserialize($table_qunty);


                                        if(!empty($table_array[0])) {
                                            $totalcol = get_post_meta( $formid, CF7WPAYPREFIX.'totalcol', true);

                                            if($totalcol == '') {
                                                $totalcol = 1;
                                            }

                                            $totalrow  = get_post_meta( $formid, CF7WPAYPREFIX.'totalrow', true);
                                            
                                            if($totalrow == '') {
                                                $totalrow = 1;
                                            }

                                            echo '<table class="ococf7_tbl">';

                                            echo '<input type="hidden" name="totalrow" value="'.$totalrow.'">';
                                            echo '<input type="hidden" name="totalcol" value="'.$totalcol.'">';

                                            $count = 0;

                                            /*first row create*/
                                            $tr = '<tr><td></td>';

                                                for($j=0; $j<$totalcol-1; $j++) {
                                                    $tr .='<td><a class="addcolumn"><img src= "'. CF7WPAY_PLUGIN_DIR . '/includes/image/plus-circular-button_1.png"></a><a class="deletecolumn"><img src= "'. CF7WPAY_PLUGIN_DIR . '/includes/images/delete.png"></a></td>';

                                                }
                                            $tr .= '<td></td></tr>';
                                            /*end first row create*/

                                            for($i=0; $i<$totalrow; $i++) {
                                                
                                                $tr .= "<tr>";
                                                    $td = "";

                                                    for($j=0; $j<$totalcol; $j++) {
                                                        $td .='<td><label>price</label><input type="text" name="prices[]" value="'.$table_price_array[$count].'"></td>';
                                                        $td .='<td><label>Quantity</label><input type="text" name="qunty[]" value="'.$table_qunty_array[$count].'"></td>';
                                                        $td .='<td><label>Description</label><input type="text" name="dis[]" value="'.$table_array[$count].'"></td>';
                                                        $count++;
                                                    }
                                                    
                                                    $tr .= $td;
                                                    
                                                $tr .= "</tr>";
                                            }
                                            echo $tr;
                                            echo '</table>';
                                        } else {
                                            ?>
                                            <table class="ococf7_tbl">
                                                <input type="hidden" name="totalrow">
                                                <input type="hidden" name="totalcol">
                                                <tr>
                                                    <td><label>Price</label><input type="text" name="prices[]"></td>
                                                    <td><label>Quantity</label><input type="text" name="qunty[]"></td>
                                                    <td><label>Description</label><input type="text" name="dis[]"></td>
                                                </tr>
                                            </table> 
                                            <?php
                                        }
                                        
                                    ?>
                                    <div class="ocscw_inner_pro"> 
                                        <a class="addrowwww">
                                            <img src= " <?php echo CF7WPAY_PLUGIN_DIR . '/includes/image/plus-circular-button_1.png' ?>">
                                        </a>
                                        <label class="ocpw_pro_link">Add multiple Dynamic value is Only available in pro version <a href="https://www.xeeshop.com/product/addon-paypal-with-contact-form-7-pro/" target="_blank">link</a></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p><strong>Note:</strong> If you want to use radio buttons or select dropdown in form, you can use <strong>[radio price "item1-$10--10" "item2-$20--20"]</strong>, in this example <strong>item1-$10</strong> will be your label and <strong>10</strong> will be value of radio button elements. simply seperate label and value with <strong>"--"</strong> seperator.</p>
                </fieldset>
            <?php
        }


        function cf7wpay_pp_strp_settings_editor_panel_popup() {

            if(isset($_REQUEST['post']) && $_REQUEST['post'] != '') {
                $formid = sanitize_text_field($_REQUEST['post']);
            } else {
                $formid = NULL;
            }

            ?>
           
            <h2>Stripe</h2>
            <fieldset>
                <table class="cf7wpay_paypal_main">
                    <tbody>
                        <tr>
                            <th scope="row">
                                <label>Use Stripe</label>
                            </th>
                            <td>
                                <input type="checkbox" name="enabled_use_stripe" value="on" <?php if(get_post_meta( $formid, CF7WPAYPREFIX.'enabled_use_stripe', true ) == "on") { echo "checked"; } ?>><label>Use Stripe</label>

                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label>Customer Email</label>
                            </th>
                            <td>
                                <input type="text" name="stripe_customer_email" value="<?php echo get_post_meta( $formid, CF7WPAYPREFIX.'stripe_customer_email', true );?>">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label>Payment Gateway</label>
                            </th>
                            <td>
                                <p><strong>[payment payment]</strong> - Use this custom tag to add payment method option to your form.</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label>Item Description</label>
                            </th>
                            <td>
                                <input type="text" name="stripe_item_description" value="Demo Testing" disabled>
                                <label class="ocpw_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/addon-paypal-with-contact-form-7-pro/" target="_blank">link</a></label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label>Item ID / SKU</label>
                            </th>
                            <td>
                                <input type="text" name="stripe_item_id_sku" value="SKU_DEMO" disabled>
                                <label class="ocpw_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/addon-paypal-with-contact-form-7-pro/" target="_blank">link</a></label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label>Amount</label>
                            </th>
                            <td>
                                <?php $amount_choice = get_post_meta( $formid, CF7WPAYPREFIX.'amount_choice', true ); ?>
                                <input type="radio" name="amount_choice" value="custom" disabled>
                                <label style="opacity: .8;">Custom Price</label>
                                <input type="radio" name="amount_choice" value="field" <?php if($amount_choice == "field"){ echo "checked"; }else{ echo "checked";} ?>>
                                <label>Field Price</label>
                                <input type="number" name="amount" value="<?php echo get_post_meta( $formid, CF7WPAYPREFIX.'amount', true );?>" style="display: none;" disabled>
                                <input type="text" name="fieldamount" value="<?php echo get_post_meta( $formid, CF7WPAYPREFIX.'fieldamount', true );?>" style="display: none;">
                                <label class="ocpw_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/addon-paypal-with-contact-form-7-pro/" target="_blank">link</a></label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label>Quantity</label>
                            </th>
                            <td>
                                <?php $qty_choice = get_post_meta( $formid, CF7WPAYPREFIX.'qty_choice', true ); ?>
                                
                                <input type="radio" name="qty_choice" value="custom" disabled>

                                <label>Custom Quantity</label>

                                <input type="radio" name="qty_choice" value="field" <?php if($qty_choice == "field"){ echo "checked"; }else{echo "checked";} ?>>

                                <label>Field Quantity</label>

                                <input type="number" name="quantity" value="<?php echo get_post_meta( $formid, CF7WPAYPREFIX.'quantity', true );?>" style="display: none;" min="1" disabled>

                                <input type="text" name="fieldquantity" value="<?php echo get_post_meta( $formid, CF7WPAYPREFIX.'fieldquantity', true );?>" style="display: none;">
                                <label class="ocpw_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/addon-paypal-with-contact-form-7-pro/" target="_blank">link</a></label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
            <h2>Stripe Settings</h2>
            <fieldset>
                <table class="cf7wpay_paypal_main">
                    <tbody>
                         
                        <tr>
                            <th scope="row">
                                <label>Use Sandbox</label>
                            </th>
                            <td>
                                <input type="checkbox" name="enabled_stripe_Sandbox" <?php if(get_post_meta( $formid, CF7WPAYPREFIX.'enabled_stripe_Sandbox', true ) == "on"){ echo "checked"; } ?>><label>Use Sandbox</label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label>Pay with Stripe Label</label>
                            </th>
                            <td>
                                <input type="text" name="pw_stripe_label" value="Pay with Stripe" disabled>
                                <label class="ocpw_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/addon-paypal-with-contact-form-7-pro/" target="_blank">link</a></label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label>Live Publishable Key</label>
                            </th>
                            <td>
                                <input type="text" name="stripe_live_pub_key" value="<?php echo get_post_meta( $formid, CF7WPAYPREFIX.'stripe_live_pub_key', true );?>">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label>Live Secret Key</label>
                            </th>
                            <td>
                                <input type="text" name="stripe_live_secret_key" value="<?php echo get_post_meta( $formid, CF7WPAYPREFIX.'stripe_live_secret_key', true );?>">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label>Test Publishable Key</label>
                            </th>
                            <td>
                                <input type="text" name="stripe_test_pub_key" value="<?php echo get_post_meta( $formid, CF7WPAYPREFIX.'stripe_test_pub_key', true );?>">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label>Test Secret Key</label>
                            </th>
                            <td>
                                <input type="text" name="stripe_test_secret_key" value="<?php echo get_post_meta( $formid, CF7WPAYPREFIX.'stripe_test_secret_key', true );?>">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label>Currency</label>
                            </th>
                            <td>
                                <?php $stripe_currency = get_post_meta( $formid, CF7WPAYPREFIX.'stripe_currency', true ); ?>
                                <select name="stripe_currency">
                                    <option value="AUD" <?php if($stripe_currency == "AUD"){ echo "selected"; }?>>
                                        Australian dollar (AUD)
                                    </option>
                                    <option value="BRL" <?php if($stripe_currency == "BRL"){ echo "selected"; }?>>
                                        Brazilian real (BRL)
                                    </option>
                                    <option value="GBP" <?php if($stripe_currency == "GBP"){ echo "selected"; }?>>
                                        British pound (GBP)
                                    </option>
                                    <option value="CAD" <?php if($stripe_currency == "CAD"){ echo "selected"; }?>>
                                        Canadian dollar (CAD)
                                    </option>
                                    <option value="CZK" <?php if($stripe_currency == "CZK"){ echo "selected"; }?>>
                                        Czech koruna (CZK)
                                    </option>
                                    <option value="DKK" <?php if($stripe_currency == "DKK"){ echo "selected"; }?>>
                                        Danish krone (DKK)
                                    </option>
                                    <option value="EUR" <?php if($stripe_currency == "EUR"){ echo "selected"; }?>>
                                        Euro (EUR)
                                    </option>
                                    <option value="HKD" <?php if($stripe_currency == "HKD"){ echo "selected"; }?>>
                                        Hong kong Dollar (HKD)
                                    </option>
                                    <option value="HUF" <?php if($stripe_currency == "HUF"){ echo "selected"; }?>>
                                        Hungarian forint (HUF)
                                    </option>
                                    <option value="ILS" <?php if($stripe_currency == "ILS"){ echo "selected"; }?>>
                                        Israeli new shekel (ILS)
                                    </option>
                                    <option value="JPY" <?php if($stripe_currency == "JPY"){ echo "selected"; }?>>
                                        Japanese yen (JPY)
                                    </option>
                                    <option value="MYR" <?php if($stripe_currency == "MYR"){ echo "selected"; }?>>
                                        Malaysian Ringgit (MYR)
                                    </option>
                                    <option value="MXN" <?php if($stripe_currency == "MXN"){ echo "selected"; }?>>
                                        Mexican peso (MXN)
                                    </option>
                                    <option value="TWD" <?php if($stripe_currency == "TWD"){ echo "selected"; }?>>
                                        New Taiwan dollar (TWD)
                                    </option>
                                    <option value="NZD" <?php if($stripe_currency == "NZD"){ echo "selected"; }?>>
                                        New Zealand dollar (NZD)
                                    </option>
                                    <option value="NOK" <?php if($stripe_currency == "NOK"){ echo "selected"; }?>>
                                        Norwegian krone (NOK)
                                    </option>
                                    <option value="PHP" <?php if($stripe_currency == "PHP"){ echo "selected"; }?>>
                                        Philippine peso (PHP)
                                    </option>
                                    <option value="PLN" <?php if($stripe_currency == "PLN"){ echo "selected"; }?>>
                                        Polish złoty (PLN)
                                    </option>
                                    <option value="RUB" <?php if($stripe_currency == "RUB"){ echo "selected"; }?>>
                                        Russian ruble (RUB)
                                    </option>
                                    <option value="SGD" <?php if($stripe_currency == "SGD"){ echo "selected"; }?>>
                                        Singapore dollar (SGD)
                                    </option>
                                    <option value="SEK" <?php if($stripe_currency == "SEK"){ echo "selected"; }?>>
                                        Swedish krona (SEK)
                                    </option>
                                    <option value="CHF" <?php if($stripe_currency == "CHF"){ echo "selected"; }?>>
                                        Swiss franc (CHF)
                                    </option>
                                    <option value="THB" <?php if($stripe_currency == "THB"){ echo "selected"; }?>>
                                        Thai baht (THB)
                                    </option>
                                    <option value="TRY" <?php if($stripe_currency == "TRY"){ echo "selected"; }?>>
                                        Turkish Lira (TRY)
                                    </option>
                                    <option value="USD" <?php if($stripe_currency == "USD"){ echo "selected"; }?>>
                                        U.S dollar (USD)
                                    </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label>Success Return URL</label>
                            </th>
                            <td>
                                <input type="text" name="stripe_suc_url" value="<?php echo get_post_meta( $formid, CF7WPAYPREFIX.'stripe_suc_url', true );?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Default Text: </b>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label>Card Number</label>
                            </th>
                            <td>
                                <input type="text" name="stripe_card_number_def_txt" value="Card Number" disabled>
                                <label class="ocpw_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/addon-paypal-with-contact-form-7-pro/" target="_blank">link</a></label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label>Card Code (CSV)</label>
                            </th>
                            <td>
                                <input type="text" name="stripe_card_code_csv_def_txt" value="Card Code (CSV)" disabled>
                                <label class="ocpw_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/addon-paypal-with-contact-form-7-pro/" target="_blank">link</a></label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label>Expiration (MM/YY)</label>
                            </th>
                            <td>
                                <input type="text" name="stripe_expiration_mmyy_def_txt" value="Expiration (MM/YY)" disabled>
                                <label class="ocpw_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/addon-paypal-with-contact-form-7-pro/" target="_blank">link</a></label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label>Billing Zip / Postal Code</label>
                            </th>
                            <td>
                                <input type="text" name="stripe_billing_zip_post_code_def_txt" value="Billing Zip / Postal Code" disabled>
                                <label class="ocpw_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/addon-paypal-with-contact-form-7-pro/" target="_blank">link</a></label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label>Pay</label>
                            </th>
                            <td>
                                <input type="text" name="stripe_pay_def_txt" value="Pay" disabled>
                                <label class="ocpw_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/addon-paypal-with-contact-form-7-pro/" target="_blank">link</a></label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label>Status</label>

                            </th>
                            <td>
                                <input type="text" name="stripe_status_def_txt" value="Status" disabled>
                                <label class="ocpw_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/addon-paypal-with-contact-form-7-pro/" target="_blank">link</a></label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label>Order</label>
                            </th>
                            <td>
                                <input type="text" name="stripe_order_def_txt" value="Order" disabled>
                                <label class="ocpw_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/addon-paypal-with-contact-form-7-pro/" target="_blank">link</a></label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label>Payment Successful</label>
                            </th>
                            <td>
                                <input type="text" name="stripe_pay_suc_def_txt" value="Payment Successful" disabled>
                                <label class="ocpw_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/addon-paypal-with-contact-form-7-pro/" target="_blank">link</a></label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label>Payment Failed</label>
                            </th>
                            <td>
                                <input type="text" name="stripe_pay_fail_def_txt" value="Payment Failed" disabled>
                                <label class="ocpw_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/addon-paypal-with-contact-form-7-pro/" target="_blank">link</a></label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label>Processing Payment</label>
                            </th>
                            <td>
                                <input type="text" name="stripe_procs_pay_def_txt" value="Processing Payment" disabled>
                                <label class="ocpw_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/addon-paypal-with-contact-form-7-pro/" target="_blank">link</a></label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label>Currency Symbol</label>
                            </th>
                            <td>
                                <input type="text" name="stripe_currency_sym_def_txt" value="$" disabled>
                                <label class="ocpw_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/addon-paypal-with-contact-form-7-pro/" target="_blank">link</a></label>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </fieldset>
            <?php
        }

        function  cf7wpay_recursive_sanitize_text_field($array) {
            
            if(!empty($array)) {
                foreach ( $array as $key => &$value ) {
                    if ( is_array( $value ) ) {
                        $value = $this->cf7wpay_recursive_sanitize_text_field($value);
                    }else{
                        $value = sanitize_text_field( $value );
                    }
                }
            }
            return $array;
        }

       
        function cf7wpay_after_save( $instance) {
    
            $formid = $instance->id;

            if(isset($_POST['enabled_use_paypal']) && !empty($_POST['enabled_use_paypal'])) {
                $enabled_use_paypal = sanitize_text_field($_POST['enabled_use_paypal']);
            } else {
                $enabled_use_paypal = 'off';
            }
            update_post_meta( $formid, CF7WPAYPREFIX.'enabled_use_paypal', $enabled_use_paypal );

            if(isset($_POST['enabled_use_stripe']) && !empty($_POST['enabled_use_stripe'])) {
                $enabled_use_stripe = sanitize_text_field($_POST['enabled_use_stripe']);
            } else {
                $enabled_use_stripe = 'off';

            }
            update_post_meta( $formid, CF7WPAYPREFIX.'enabled_use_stripe', $enabled_use_stripe );

            $enabled_use_Sandbox = sanitize_text_field($_POST['enabled_use_Sandbox']);
            update_post_meta( $formid, CF7WPAYPREFIX.'enabled_use_Sandbox', $enabled_use_Sandbox );

            $totalrow         = sanitize_text_field( $_REQUEST['totalrow'] );
            update_post_meta( $formid, CF7WPAYPREFIX.'totalrow', $totalrow );

            $totalcol         = sanitize_text_field( $_REQUEST['totalcol'] );
            update_post_meta( $formid, CF7WPAYPREFIX.'totalcol', $totalcol );

            $dis_data   = $this->cf7wpay_recursive_sanitize_text_field( $_REQUEST['dis'] );
            update_post_meta(  $formid, CF7WPAYPREFIX.'dis', serialize($dis_data) );

            $prices_data   = $this->cf7wpay_recursive_sanitize_text_field( $_REQUEST['prices'] );
            update_post_meta(  $formid, CF7WPAYPREFIX.'prices', serialize($prices_data) );

            $qunty_data   = $this->cf7wpay_recursive_sanitize_text_field( $_REQUEST['qunty'] );
            update_post_meta(  $formid, CF7WPAYPREFIX.'qunty', serialize($qunty_data) );

            $enabled_stripe_Sandbox = sanitize_text_field($_POST['enabled_stripe_Sandbox']);
            update_post_meta( $formid, CF7WPAYPREFIX.'enabled_stripe_Sandbox', $enabled_stripe_Sandbox );

            $paypal_bus_email = sanitize_text_field($_POST['paypal_bus_email']);
            update_post_meta( $formid, CF7WPAYPREFIX.'paypal_bus_email', $paypal_bus_email );

            $customer_email = sanitize_text_field($_POST['customer_email']);
            update_post_meta( $formid, CF7WPAYPREFIX.'customer_email', $customer_email );

            $stripe_customer_email = sanitize_text_field($_POST['stripe_customer_email']);
            update_post_meta( $formid, CF7WPAYPREFIX.'stripe_customer_email', $stripe_customer_email );

            $amount_choice = sanitize_text_field($_POST['amount_choice']);
            update_post_meta( $formid, CF7WPAYPREFIX.'amount_choice', $amount_choice );

            $paypal_amount = sanitize_text_field($_POST['paypal_amount']);
            update_post_meta( $formid, CF7WPAYPREFIX.'paypal_amount', $paypal_amount );

            $paypal_quantity = sanitize_text_field($_POST['paypal_quantity']);
            update_post_meta( $formid, CF7WPAYPREFIX.'paypal_quantity', $paypal_quantity );

            $amount = sanitize_text_field($_POST['amount']);
            update_post_meta( $formid, CF7WPAYPREFIX.'amount', $amount );
            
            $fieldamount = sanitize_text_field($_POST['fieldamount']);
            update_post_meta( $formid, CF7WPAYPREFIX.'fieldamount', $fieldamount );

            $qty_choice = sanitize_text_field($_POST['qty_choice']);
            update_post_meta( $formid, CF7WPAYPREFIX.'qty_choice', $qty_choice );

            $quantity = sanitize_text_field($_POST['quantity']);
            update_post_meta( $formid, CF7WPAYPREFIX.'quantity', $quantity );
            
            $fieldquantity = sanitize_text_field($_POST['fieldquantity']);
            update_post_meta( $formid, CF7WPAYPREFIX.'fieldquantity', $fieldquantity );

            $currency = sanitize_text_field($_POST['currency']);
            update_post_meta( $formid, CF7WPAYPREFIX.'currency', $currency );

            $suc_url = sanitize_text_field($_POST['suc_url']);
            update_post_meta( $formid, CF7WPAYPREFIX.'suc_url',$suc_url );

            $tax_rates = sanitize_text_field($_POST['tax_rates']);
            update_post_meta( $formid, CF7WPAYPREFIX.'tax_rates', $tax_rates );

            $can_url = sanitize_text_field($_POST['can_url']);
            update_post_meta( $formid, CF7WPAYPREFIX.'can_url', $can_url );

            $stripe_live_pub_key = sanitize_text_field($_POST['stripe_live_pub_key']);
            update_post_meta( $formid, CF7WPAYPREFIX.'stripe_live_pub_key', $stripe_live_pub_key );

            $stripe_live_secret_key = sanitize_text_field($_POST['stripe_live_secret_key']);
            update_post_meta( $formid, CF7WPAYPREFIX.'stripe_live_secret_key', $stripe_live_secret_key );

            $stripe_test_pub_key = sanitize_text_field($_POST['stripe_test_pub_key']);
            update_post_meta( $formid, CF7WPAYPREFIX.'stripe_test_pub_key', $stripe_test_pub_key );

            $discount_rate = sanitize_text_field($_POST['discount_rate']);
            update_post_meta( $formid, CF7WPAYPREFIX.'discount_rate', $discount_rate );

            $stripe_test_secret_key = sanitize_text_field($_POST['stripe_test_secret_key']);
            update_post_meta( $formid, CF7WPAYPREFIX.'stripe_test_secret_key', $stripe_test_secret_key );

            $stripe_currency = sanitize_text_field($_POST['stripe_currency']);
            update_post_meta( $formid, CF7WPAYPREFIX.'stripe_currency', $stripe_currency );

            $stripe_suc_url = sanitize_text_field($_POST['stripe_suc_url']);
            update_post_meta( $formid, CF7WPAYPREFIX.'stripe_suc_url', $stripe_suc_url );
        }


        function save_application_form($wpcf7) {
            $submission = WPCF7_Submission::get_instance();
            $files = $submission->uploaded_files();
            $upload_dir    = wp_upload_dir();
            $cf7wpay_dirname = $upload_dir['basedir'].'/cf7wpay_uploads';
            $time_now      = time();
            foreach ($files as $file_key => $file) {
                copy($file, $cf7wpay_dirname.'/'.$time_now.'-'.basename($file));
            }
            $_SESSION['image_name'] = $time_now.'-'.basename($file);
        }


        function cf7wpay_ajax_json_echo( $response, $result ) {
            global $wpdb;
            $table_name    = $wpdb->prefix.'cf7wpay_forms';
            $time_now      = time();

            $form = WPCF7_Submission::get_instance();

            if ( $form ) {

                $black_list   = array('_wpcf7', '_wpcf7_version', '_wpcf7_locale', '_wpcf7_unit_tag',
                '_wpcf7_is_ajax_call','cfdb7_name', '_wpcf7_container_post','_wpcf7cf_hidden_group_fields',
                '_wpcf7cf_hidden_groups', '_wpcf7cf_visible_groups', '_wpcf7cf_options','g-recaptcha-response');

                $data           = $form->get_posted_data();
                $files          = $form->uploaded_files();

                $uploaded_files = array();
                foreach ($files as $file_key => $file) {
                    array_push($uploaded_files, $file_key);
                }

                $form_data   = array();
                $form_data['cf7wpay_status'] = 'unread';
 
                foreach ($data as $key => $d) {
                   
                    $matches = array();

                    if ( !in_array($key, $black_list ) && !in_array($key, $uploaded_files ) && empty( $matches[0] ) ) {

                        $tmpD = $d;

                        if ( ! is_array($d) ) {

                            $bl   = array('\"',"\'",'/','\\','"',"'");
                            $wl   = array('&quot;','&#039;','&#047;', '&#092;','&quot;','&#039;');

                            $tmpD = str_replace($bl, $wl, $tmpD );
                        }

                        $form_data[$key] = $tmpD;
                    }
                    if ( in_array($key, $uploaded_files ) ) {
                        $form_data[$key.'cfdb7_file'] = $_SESSION['image_name'];
                    }
                }

                $form_post_id = $result['contact_form_id'];
                $form_value   = serialize( $form_data );
                $form_date    = current_time('Y-m-d H:i:s');

                $wpdb->insert( $table_name, array(
                    'form_post_id' => $form_post_id,
                    'form_value'   => $form_value,
                    'form_date'    => $form_date
                ) );

                $insert_id = $wpdb->insert_id;
            }

            $formid                 = $result['contact_form_id'];
            $amount_choice          = get_post_meta( $formid, CF7WPAYPREFIX.'amount_choice', true );
            $qty_choice             = get_post_meta( $formid, CF7WPAYPREFIX.'qty_choice', true );
            $paymentgateway         = 'payment';
            $customer_email         = get_post_meta( $formid, CF7WPAYPREFIX.'customer_email', true );
            $stripe_customer_email  = get_post_meta( $formid, CF7WPAYPREFIX.'stripe_customer_email', true );
            $customer               = get_post_meta( $formid, CF7WPAYPREFIX.'customer_email', true );
            $item_id_sku            = "SKU_DEMO";
            $tax_rates              = get_post_meta( $formid, CF7WPAYPREFIX.'tax_rates', true );
            
            //paypal settings
            $enabled_use_paypal     = get_post_meta( $formid, CF7WPAYPREFIX.'enabled_use_paypal', true );
            $enabled_use_Sandbox    = get_post_meta( $formid, CF7WPAYPREFIX.'enabled_use_Sandbox', true );
            $paypal_bus_email       = get_post_meta( $formid, CF7WPAYPREFIX.'paypal_bus_email', true );
            $currency               = get_post_meta( $formid, CF7WPAYPREFIX.'currency', true );
            $suc_url                = get_post_meta( $formid, CF7WPAYPREFIX.'suc_url', true );
            $can_url                = get_post_meta( $formid, CF7WPAYPREFIX.'can_url', true );

            //stripe settings
            $enabled_use_stripe         = get_post_meta( $formid, CF7WPAYPREFIX.'enabled_use_stripe', true );
            $enabled_stripe_Sandbox     = get_post_meta( $formid, CF7WPAYPREFIX.'enabled_stripe_Sandbox', true );
            $stripe_live_pub_key        = get_post_meta( $formid, CF7WPAYPREFIX.'stripe_live_pub_key', true );
            $stripe_live_secret_key     = get_post_meta( $formid, CF7WPAYPREFIX.'stripe_live_secret_key', true );
            $stripe_test_pub_key        = get_post_meta( $formid, CF7WPAYPREFIX.'stripe_test_pub_key', true );
            $stripe_test_secret_key     = get_post_meta( $formid, CF7WPAYPREFIX.'stripe_test_secret_key', true );
            $stripe_currency            = get_post_meta( $formid, CF7WPAYPREFIX.'stripe_currency', true );
            $stripe_suc_url             = get_post_meta( $formid, CF7WPAYPREFIX.'stripe_suc_url', true );
            $stripe_insert_id           = $insert_id;

            $stripe_card_number_def_txt = "Card Number";

            if($stripe_card_number_def_txt == '') {
                $stripe_card_number_def_txt = 'Card Number';
            }

            $stripe_card_code_csv_def_txt = "Card Code (CSV)";

            if($stripe_card_code_csv_def_txt == '') {
                $stripe_card_code_csv_def_txt = 'Card Code (CSV)';
            }

            $stripe_expiration_mmyy_def_txt    = "Expiration (MM/YY)";

            if($stripe_expiration_mmyy_def_txt == '') {
                $stripe_expiration_mmyy_def_txt = 'Expiration (MM/YY)';
            }

            $stripe_billing_zip_post_code_def_txt    = "Billing Zip / Postal Code";

            if($stripe_billing_zip_post_code_def_txt == '') {
                $stripe_billing_zip_post_code_def_txt = 'Billing Zip / Postal Code';
            }

            $stripe_pay_def_txt    = "Pay";
                
            if($stripe_pay_def_txt == '') {
                $stripe_pay_def_txt = 'Pay';
            }

            $stripe_currency_sym_def_txt    = "$";

            if($stripe_currency_sym_def_txt == '') {
                $stripe_currency_sym_def_txt = '$';
            }

            $stripe_status_def_txt      = "Status";
            $stripe_order_def_txt       = "Order";
            $stripe_pay_suc_def_txt     = "Payment Successful";
            $stripe_pay_fail_def_txt    = "Payment Failed";
            $stripe_procs_pay_def_txt   = "Processing Payment";
            $table_prices               = get_post_meta( $formid, CF7WPAYPREFIX.'prices', true); 
            $discount_rate              = get_post_meta( $formid, CF7WPAYPREFIX.'discount_rate', true );
            $table_price_array          = unserialize($table_prices);
            $table_dis                  = get_post_meta( $formid, CF7WPAYPREFIX.'dis', true); 
            $table_qunty                = get_post_meta( $formid, CF7WPAYPREFIX.'qunty', true); 
            $table_array                = unserialize($table_dis);
            $table_qunty_array          = unserialize($table_qunty);


            if($enabled_use_Sandbox == "on") {
                $paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
                define("CF7WPAY_USE_SANDBOX", 1);
            } else {
                $paypal_url = "https://www.paypal.com/cgi-bin/webscr";

                define("CF7WPAY_USE_SANDBOX", 0);
            }

            $stripe_pub_key = '';
            $stripe_secret_key = '';

            if($enabled_stripe_Sandbox == "on") {
                $stripe_pub_key = $stripe_test_pub_key;
                $stripe_secret_key = $stripe_test_secret_key;
            } else {
                $stripe_pub_key = $stripe_live_pub_key;
                $stripe_secret_key = $stripe_live_secret_key;
            }

            if($paymentgateway != '') {
                $payment_gateway     = $data[$paymentgateway];
            } else {
                $payment_gateway     = '';
            }

            if($stripe_customer_email != '') {
                $custmr_email = $data[$stripe_customer_email];
            } else {
                $custmr_email = '';
            }


            if($amount_choice == "custom") {
                $amount              = get_post_meta( $formid, CF7WPAYPREFIX.'amount', true );
            } else {
                $field               = get_post_meta( $formid, CF7WPAYPREFIX.'fieldamount', true );
                $amount              = $data[$field];

                if(is_array($amount)) {
                    $amount = $amount[0];
                }

                if(stripos($amount, "--")) {
                    $piecesd = explode("--", $amount);
                    if(!empty($piecesd[1])) {
                        $amount = $piecesd[1];
                    } else {
                        $amount = $piecesd[0];
                    }
                }
            }
            
            $paypal_amount = get_post_meta( $formid, CF7WPAYPREFIX.'paypal_amount', true );
            
            if(!empty($paypal_amount)) {
                $amount_papl = get_post_meta( $formid, CF7WPAYPREFIX.'paypal_amount', true );
            }

            if($qty_choice == "custom") {
                $quantity = get_post_meta( $formid, CF7WPAYPREFIX.'quantity', true );
            } else {
                $fieldquantity = get_post_meta( $formid, CF7WPAYPREFIX.'fieldquantity', true );
                $quantity      = $data[$fieldquantity];
            }
            $paypal_quntity = get_post_meta( $formid, CF7WPAYPREFIX.'paypal_quantity', true );
            
            if(!empty($paypal_quntity)) {
                $quantity_papl = $paypal_quntity;
            } else {
                $quantity_papl = 1;
            }

            if(empty($quantity)) {
                $quantity = 1;
            }


            $final_price = $quantity * $amount;
            $stripe_final_amount = $final_price;
            $stripe_final_amount = number_format((float)$stripe_final_amount, 2, '.', '');
            $stripe_amount_text = $stripe_pay_def_txt.' '.$stripe_currency_sym_def_txt.$stripe_final_amount;

            //paypal data and paypal form data
            $response[ 'enabled_use_paypal' ]  = $enabled_use_paypal;
            $response[ 'enabled_use_stripe' ]  = $enabled_use_stripe;
            $response[ 'paypal_url' ]          = $paypal_url;
            $response[ 'paypal_bus_email' ]    = $paypal_bus_email;
            $response[ 'payment_gateway' ]     = $payment_gateway;
            $response[ 'suc_url' ]             = $suc_url;
            $response[ 'can_url' ]             = $can_url;
            $html  = '<form action="'.$paypal_url.'" id="cf7wpay_paypal" method="post" target="_top">';
            $html .= "<input type='hidden' name='business' value='".$paypal_bus_email."'>";

            $x = 1;
            if(!empty($paypal_amount)) {
                $item_descriptionn = "Demo Testing";

                if(!empty($item_descriptionn)) {
                    $item_description = $item_descriptionn;
                } else {
                    $item_description = 'Payment Using CF7';
                }
                
                $html .= "<input type='hidden' name='item_name_1' value='".$item_description."'>";

            } else {
                if(!empty($table_array)) {
                    foreach ($table_array as $description) {
                        if(is_array($data[$description])) {
                            if(!empty($data[$description])) {
                                foreach ( $data[$description] as $desc) {
                                    $item_description = $desc;
                                    if(!empty($item_description)) {
                                            $html .= "<input type='hidden' name='item_name_".$x."' value='".$item_description."'> ";
                                    } else {
                                          $html .= "<input type='hidden' name='item_name_".$x."' value='Payment Using CF7'> ";
                                    }
                                }
                            }
                        } else {
                            if(!empty($data[$description])) {
                                $html .= "<input type='hidden' name='item_name_".$x."' value='".$data[$description]."'> ";
                            } else {
                                $html .= "<input type='hidden' name='item_name_".$x."' value='Payment Using CF7'> ";
                            }
                        }

                        $x++;
                    }
                }
            }

            $x = 1;
            if(!empty($paypal_amount)) {
                $html .= "<input type='hidden' name='amount_1' value='".$amount_papl."'>";   
            } else {
                if(!empty($table_price_array)) {
                    foreach ($table_price_array as $key => $value) {
                        if(is_array($data[$value])) {
                            if(!empty($data[$value])) {
                                foreach ($data[$value] as $keyy => $valuerr) {
                                    
                                    $pieces = explode("--", $valuerr);
                                    if(!empty($pieces[1])) {
                                        $amountaa = $pieces[1];
                                    } else {
                                        $amountaa = $pieces[0];
                                    }

                                    $html .= "<input type='hidden' name='amount_".$x."' value='".$amountaa."'>"; 
                                }
                            }
                        } else {
                            $html .= "<input type='hidden' name='amount_".$x."' value='".$data[$value]."'>"; 
                        }

                        $x++;
                    }
                }
            }

            $y = 1;
            if(!empty($paypal_amount)) {
                $html .= "<input type='hidden' name='quantity_1' value='".$quantity_papl."'>";
            } else {
                if(!empty($table_qunty_array)) {
                    foreach ($table_qunty_array as $quantityy) {
                        if(is_array($data[$quantityy])) {
                            if(!empty($data[$quantityy])) {
                                foreach ($data[$quantityy] as $qny) {
                                    $quantity = $qny;
                                    $html .= "<input type='hidden' name='quantity_".$y."' value='".$quantity."'>";
                                }
                            }
                        } else {
                            $html .= "<input type='hidden' name='quantity_".$y."' value='".$data[$quantityy]."'>";
                        }

                        $y++;
                    }
                }
            }
            
            $html .= "<input type='hidden' name='item_number' value='".$item_id_sku."'> ";
            $html .="<input type='hidden' name='discount_amount_cart' value='".$discount_rate."'>";
            $html .= "<input type='hidden' name='no_shipping' value='1'>";
            $html .= "<input type='hidden' name='currency_code' value='".$currency."'> ";
            $html .= "<input type='hidden' name='notify_url' value='".admin_url( 'admin-ajax.php' )."?action=paypal_callback'>";
            $html .= "<input type='hidden' name='cancel_return' value='".$can_url."'>";
            $html .= "<input type='hidden' name='return' value='".$suc_url."'>";
            $html .= "<input type='hidden' name='tax_cart' value='".$tax_rates."'>";
            $html .= "<input type='hidden' name='cmd' value='_cart'>";
            $html .= "<input type='hidden' name='upload' value='1'>";
            $html .= "<input type='hidden' name='custom' value='".$insert_id."'>";
            $html .= "</form>";

            $response[ 'paypal_form' ] = $html;

            //stripe data and stripe form data
            $result = '';

            if($enabled_stripe_Sandbox == "on") {
                $result .= "<a href='https://stripe.com/docs/testing#cards' target='_blank' class='cf7wpay_sandbox'>sandbox mode</a>";
            }

            $result .= "<div class='cf7wpay_stripe'>";
                $result .= "<form method='post' id='cf7wpay-payment-form'>";
                    $result .= "<div class='cf7wpay_body'>";
                        $result .= "<div class='cf7wpay_row'>";
                            $result .= "<div class='cf7wpay_details_input'>";
                                $result .= "<label for='cf7wpay_stripe_credit_card_number'>"; $result .= $stripe_card_number_def_txt; $result .= "</label>";
                                $result .= "<div id='cf7wpay_stripe_credit_card_number'></div>";
                            $result .= "</div>";
                            $result .= "<div class='cf7wpay_details_input'>";
                                $result .= "<label for='cf7wpay_stripe_credit_card_csv'>"; $result .= $stripe_card_code_csv_def_txt; $result .= "</label>";
                                $result .= "<div id='cf7wpay_stripe_credit_card_csv'></div>";
                            $result .= "</div>";
                        $result .= "</div>";
                        $result .= "<div class='cf7wpay_row'>";
                            $result .= "<div class='cf7wpay_details_input'>";
                                $result .= "<label for='cf7wpay_stripe_credit_card_expiration'>"; $result .= $stripe_expiration_mmyy_def_txt; $result .= "</label>";
                                $result .= "<div id='cf7wpay_stripe_credit_card_expiration''></div>";
                            $result .= "</div>";
                            $result .= "<div class='cf7wpay_details_input'>";
                                $result .= "<label for='cf7wpay_stripe_credit_card_zip'>"; $result .= $stripe_billing_zip_post_code_def_txt; $result .= "</label>";
                                $result .= "<div id='cf7wpay_stripe_credit_card_zip'></div>";
                            $result .= "</div>";
                        $result .= "</div>";
                        $result .= "<div id='card-errors' role='alert'></div>";
                    $result .= "<br/>&nbsp;<input id='stripe-submit' value='".$stripe_amount_text."' type='submit'>";
                    $result .= "<div>";
                $result .= "</form>";
            $result .= "<div>";
            $response[ 'stripe_form' ] = $result;
            $response[ 'stripe_pubkey' ] = $stripe_pub_key;
            $response[ 'stripe_seckey' ] = $stripe_secret_key;
            $response[ 'stripe_email' ] =  $custmr_email;
            $response[ 'stripe_suc_url' ] =  $stripe_suc_url;
            $response[ 'stripe_procs_pay_txt' ] =  $stripe_procs_pay_def_txt;
            $response[ 'stripe_amount_text' ] =  $stripe_amount_text;
            $response[ 'stripe_pay_fail_text' ] =  $stripe_pay_fail_def_txt;
            $response[ 'stripe_pay_amount' ] =  $stripe_final_amount;
            $response[ 'stripe_insert_id' ] = $stripe_insert_id;

            return $response;
        }


        function cf7wpay_footer() {
            ?>
            <script>
                document.addEventListener( 'wpcf7mailsent', function( event ) {

                    

                    var enabled_use_paypal  = event.detail.apiResponse.enabled_use_paypal;
                    var enabled_use_stripe  = event.detail.apiResponse.enabled_use_stripe;
                    var payment_gateway     = event.detail.apiResponse.payment_gateway;
                    var stripe_email        = event.detail.apiResponse.stripe_email;
                    var stripe_suc_url      = event.detail.apiResponse.stripe_suc_url;
                    var stripe_procs_pay_txt = event.detail.apiResponse.stripe_procs_pay_txt;
                    var stripe_amount_text = event.detail.apiResponse.stripe_amount_text;
                    var stripe_pay_fail_text = event.detail.apiResponse.stripe_pay_fail_text;
                    var stripe_pay_amount = event.detail.apiResponse.stripe_pay_amount;
                    var stripe_insert_id = event.detail.apiResponse.stripe_insert_id;
                   if((event.detail.unitTag) ){
                     var cf7wpay_id_long     = event.detail.unitTag;
                   }else{
                     var cf7wpay_id_long     = event.detail.id;
                   }
                     console.log(cf7wpay_id_long);
                    var cf7wpay_id          = event.detail.contactFormId;

                    var cf7wpay_formid      = cf7wpay_id;

                    if(payment_gateway == 'paypal') {
                        if(enabled_use_paypal == "on") {
                            var paypal_form = event.detail.apiResponse.paypal_form;
                            jQuery('body').append(paypal_form);
                            setTimeout(function() {
                                jQuery( "#cf7wpay_paypal" ).submit();
                            }, 2000);
                        }
                    }

                    if(payment_gateway == 'stripe') {
                        if(enabled_use_stripe == "on") {
                            var stripe_form = event.detail.apiResponse.stripe_form;
                            setTimeout(function() {
                                jQuery('#'+cf7wpay_id_long).html(stripe_form);
                                if (jQuery('.cf7wpay_stripe').length ) {

                                    var stripe = Stripe(event.detail.apiResponse.stripe_pubkey);
                                    var elements = stripe.elements();

                                    var elementClasses = {
                                        base:       'cf7wpay_details_input',
                                        focus:      'focus',
                                        empty:      'empty',
                                        invalid:    'invalid',
                                    };

                                    var cardNumber = elements.create('cardNumber', {
                                        classes:    elementClasses,
                                        placeholder:  "\u2022\u2022\u2022\u2022 \u2022\u2022\u2022\u2022 \u2022\u2022\u2022\u2022 \u2022\u2022\u2022\u2022",
                                    });
                                    cardNumber.mount('#cf7wpay_stripe_credit_card_number');

                                    var cardExpiry = elements.create('cardExpiry', {
                                        classes: elementClasses,
                                        placeholder:  "\u2022\u2022 / \u2022\u2022",
                                    });
                                    cardExpiry.mount('#cf7wpay_stripe_credit_card_expiration');

                                    var cardCvc = elements.create('cardCvc', {
                                        classes: elementClasses,
                                        placeholder:  "\u2022\u2022\u2022",
                                    });
                                    cardCvc.mount('#cf7wpay_stripe_credit_card_csv');

                                    var cardPostalCode = elements.create('postalCode', {
                                        classes: elementClasses,
                                        placeholder:  "\u2022\u2022\u2022\u2022\u2022",
                                    });
                                    cardPostalCode.mount('#cf7wpay_stripe_credit_card_zip');

                                    // Handle real-time validation errors from the card Element.
                                    cardNumber.addEventListener('change', function(event) {

                                        var displayError = document.getElementById('card-errors');

                                        if (event.error) {
                                            displayError.textContent = event.error.message;
                                        } else {
                                            displayError.textContent = '';
                                        }

                                    });

                                    cardExpiry.addEventListener('change', function(event) {

                                        var displayError = document.getElementById('card-errors');

                                        if (event.error) {
                                            displayError.textContent = event.error.message;
                                        } else {
                                            displayError.textContent = '';
                                        }

                                    });

                                    cardCvc.addEventListener('change', function(event) {

                                        var displayError = document.getElementById('card-errors');

                                        if (event.error) {
                                            displayError.textContent = event.error.message;
                                        } else {
                                            displayError.textContent = '';
                                        }

                                    });

                                    cardPostalCode.addEventListener('change', function(event) {

                                        var displayError = document.getElementById('card-errors');

                                        if (event.error) {
                                            displayError.textContent = event.error.message;
                                        } else {
                                            displayError.textContent = '';
                                        }

                                    });

                                    
                                    // action when contact form 7 form is submitted
                                    var cf7wpay_form = document.getElementById('cf7wpay-payment-form');

                                    cf7wpay_form.addEventListener('submit', function(event) {
                                
                                        var cf7wpay_id_long       = jQuery('.cf7wpay_stripe').closest('.wpcf7').attr("id");
                                        var cf7wpay_formid        = cf7wpay_id_long.split('f').pop().split('-').shift();
                                        var cf7wpay_email         = stripe_email;
                                        var cf7wpay_stripe_return = stripe_suc_url;
                                        
                                        jQuery('#stripe-submit').attr("disabled", "disabled");
                                        jQuery('#stripe-submit').val(stripe_procs_pay_txt);

                                        event.preventDefault();

                                        stripe.createToken(cardNumber).then(function(result) { 
                                            // console.log(result);
                                            if (result.error) {
                                                var errorElement = document.getElementById('card-errors');
                                                errorElement.textContent = result.error.message;

                                                jQuery('#stripe-submit').removeAttr("disabled");
                                                jQuery('#stripe-submit').val(stripe_amount_text);
                                            } else {
                                                var cf7wpay_data = {
                                                    'action':           'cf7wpay_stripe_charge',
                                                    'token':            result.token,
                                                    'cf7wpay-security': '<?php echo wp_create_nonce( "cf7wpay-ajax-nonce" ); ?>',
                                                    'id':               cf7wpay_formid,
                                                    'email':            cf7wpay_email,
                                                    'pay_amount':       stripe_pay_amount,
                                                    'stripe_insert_id': stripe_insert_id
                                                };
                                                
                                                jQuery.ajax({
                                                    type: "POST",
                                                    data: cf7wpay_data,
                                                    dataType: "json",
                                                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                                                    xhrFields: {
                                                        withCredentials: true
                                                    },
                                                    success: function (result) {
                                                        if (result.response == 'completed') {
                                                            if (cf7wpay_stripe_return) {
                                                                window.location.href = cf7wpay_stripe_return;
                                                            } else {
                                                                jQuery('#'+cf7wpay_id_long).html(result.html_success);
                                                            }
                                                        } else {
                                                            jQuery('#card-errors').html(stripe_pay_fail_text);
                                                            jQuery('#stripe-submit').removeAttr("disabled");
                                                            jQuery('#stripe-submit').val(stripe_amount_text);
                                                        }
                                                    }
                                                });
                                            }
                                        });
                                    });
                                };
                            }, 1500);
                        }
                    }
                }, false );
            </script>
            <?php
        }


        function cf7wpay_paypal_callback() {
        
            $ipn_response = !empty($_POST) ? $_POST : false;

            if (!$ipn_response) {
                wp_die( "Empty PayPal IPN Request", "PayPal IPN", array( 'response' => 200 ) );
                return;
            }

            if(CF7WPAY_USE_SANDBOX == true) {
                $paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
            } else {
                $paypal_url = "https://www.paypal.com/cgi-bin/webscr";
            }

            $validate_ipn = array('cmd' => '_notify-validate');
            $validate_ipn += stripslashes_deep($ipn_response);
            
            //Send back post vars to paypal
            $params = array(
                'body' => $validate_ipn,
                'sslverify' => false,
                'timeout' => 60,
                'httpversion' => '1.1',
                'compress' => false,
                'decompress' => false,
                'user-agent' => 'WP PayPal/' . CF7WPAY_PAYPAL_VERSION
            );
            $response = wp_remote_post($paypal_url, $params);

            $ipn_verified = false;
            if (!is_wp_error($response) && $response['response']['code'] >= 200 && $response['response']['code'] < 300 && strstr($response['body'], 'VERIFIED')) {
                header( 'HTTP/1.1 200 OK' );
                $ipn_verified = true;
                // print_r($ipn_response);
                // exit;

                $item_name        = sanitize_text_field( $ipn_response['item_name'] );
                $item_number      = sanitize_text_field( $ipn_response['item_number'] );
                $payment_status   = sanitize_text_field( $ipn_response['payment_status'] );
                $payment_amount   = sanitize_text_field( $ipn_response['mc_gross'] );
                $payment_currency = sanitize_text_field( $ipn_response['mc_currency'] );
                $txn_id           = sanitize_text_field( $ipn_response['txn_id'] );
                $receiver_email   = sanitize_text_field( $ipn_response['receiver_email'] );
                $payer_email      = sanitize_text_field( $ipn_response['payer_email'] );
                $form_id          = sanitize_text_field( $ipn_response['custom'] );

                update_post_meta($form_id,CF7WPAYPREFIX.'item_name',$item_name);
                update_post_meta($form_id,CF7WPAYPREFIX.'item_name_1',$item_name_1);
                update_post_meta($form_id,CF7WPAYPREFIX.'item_number',$item_number);
                update_post_meta($form_id,CF7WPAYPREFIX.'payment_status',$payment_status);
                update_post_meta($form_id,CF7WPAYPREFIX.'payment_amount',$payment_amount);
                update_post_meta($form_id,CF7WPAYPREFIX.'payment_currency',$payment_currency);
                update_post_meta($form_id,CF7WPAYPREFIX.'txn_id',$txn_id);
                update_post_meta($form_id,CF7WPAYPREFIX.'receiver_email',$receiver_email);
                update_post_meta($form_id,CF7WPAYPREFIX.'payer_email',$payer_email);
            }
        }


        // stripe charge ajax call
        function cf7wpay_stripe_charge() {

            if ( isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] != 'POST' && isset($_POST['stripeToken']) ) {
                return;
            }

            //security verification
            if ( ! check_ajax_referer( 'cf7wpay-ajax-nonce', 'cf7wpay-security', false ) ) {    
                wp_send_json_error( 'Invalid security token sent.' );
                wp_die();
            }

            $token = sanitize_text_field($_POST['token']['id']);

            //form id
            $id = sanitize_text_field($_POST['id']);

            $stripe_key = '';
            $stripe_mode = get_post_meta( $id, CF7WPAYPREFIX.'enabled_stripe_Sandbox', true );

            if($stripe_mode == "on") {
                $stripe_key = get_post_meta( $id, CF7WPAYPREFIX.'stripe_test_secret_key', true );
            } else {
                $stripe_key = get_post_meta( $id, CF7WPAYPREFIX.'stripe_live_secret_key', true );
            }

            $currency = get_post_meta( $id, CF7WPAYPREFIX.'stripe_currency', true );

            if (empty($currency)) { $currency = "USD"; }

            $desc = "Demo Testing";

            if(empty($desc)) {
                $desc = 'Payment Using CF7';
            }

            $sku = "SKU_DEMO";

            $amount = sanitize_text_field($_POST['pay_amount']);

            if ($currency != 'JPY') {
                // convert amount to cents
                $amount = $amount * 100;
            } else {
                $amount = (int)$amount;
            }

            $email = sanitize_text_field($_POST['email']);
            
            if (empty($email)) {
                $email = '';
            }

            // default status
            $status = '';

            // class
            \Stripe\Stripe::setApiKey($stripe_key);

            // Create a charge: this will charge the user's card
            try {

                
                $customer = \Stripe\Customer::create(array(
                    "source"                => $token,
                    "email"                 => $email
                    // "address" => ["city" => 'Sydney', "country" => 'Australia', "line1" => "line1", "line2" => "", "postal_code" => "2000", "state" => "New South Wales"], 
                    // "description"   => 'sadasdsa',
                    // "name"  => 'sadsd' 
                ));
                

                $charge = \Stripe\Charge::create(array(
                    "amount"                => $amount, // Amount in cents
                    "currency"              => $currency,
                    "description"           => $desc,
                    "metadata"              => array("ID/SKU" => $sku),
                    "customer"              => $customer->id,
                ));

                $txn_id = sanitize_text_field($charge->id);
                
                $status = 'completed';
                
                $stripe_response = $charge->jsonSerialize();

            } catch(\Stripe\Error\Card $e) {
                // Since it's a decline, \Stripe\Error\Card will be caught
                
                $body = $e->getJsonBody();
                $err  = $body['error'];
                $reason = $err['message'];

            } catch (\Stripe\Error\RateLimit $e) {
                // Too many requests made to the API too quickly
                $body = $e->getJsonBody();
                $err  = $body['error'];
                $reason = $err['message'];


            } catch (\Stripe\Error\InvalidRequest $e) {
                // Invalid parameters were supplied to Stripe's API

                $body = $e->getJsonBody();
                $err  = $body['error'];
                $reason = $err['message'];


            } catch (\Stripe\Error\Authentication $e) {
                // Authentication with Stripe's API failed
                // (maybe you changed API keys recently)

                $body = $e->getJsonBody();
                $err  = $body['error'];
                $reason = $err['message'];


            } catch (\Stripe\Error\ApiConnection $e) {
                // Network communication with Stripe failed

                $body = $e->getJsonBody();
                $err  = $body['error'];
                $reason = $err['message'];


            } catch (\Stripe\Error\Base $e) {
                // Display a very generic error to the user, and maybe send
                // yourself an email

                $body = $e->getJsonBody();
                $err  = $body['error'];
                $reason = $err['message'];


            } catch (Exception $e) {
                // Something else happened, completely unrelated to Stripe

                $body = $e->getJsonBody();
                $err  = $body['error'];
                $reason = $err['message'];

            }


            // transaction failed
            if ($status != 'completed') {
                $status = 'failed';
                $txn_id = '';


            }

            $stripe_status_def_txt ="Status";
            if($stripe_status_def_txt != '') {
                $stripe_status_txt = $stripe_status_def_txt;
            } else {
                $stripe_status_txt = 'Status';
            }

            $stripe_order_def_txt = "Order";
            if($stripe_order_def_txt != '') {
                $stripe_order_txt = $stripe_order_def_txt;
            } else {
                $stripe_order_txt = 'Order';
            }

            $stripe_pay_suc_def_txt     = "Payment Successful";
            if($stripe_pay_suc_def_txt != '') {
                $stripe_pay_succ_txt = $stripe_pay_suc_def_txt;
            } else {
                $stripe_pay_succ_txt = 'Payment Successful';
            }

            $html_success = "
                <table>
                <tr><td>".$stripe_status_txt.": </td><td>".$stripe_pay_succ_txt."</td></tr>
                <tr><td>".$stripe_order_txt." #: </td><td>".$txn_id."</td></tr>
                </table>
            ";

            $stripe_insert_id = sanitize_text_field($_POST['stripe_insert_id']);
            $stripe_amount = sanitize_text_field($_POST['pay_amount']);

            update_post_meta($stripe_insert_id, CF7WPAYPREFIX.'item_name', $desc);
            update_post_meta($stripe_insert_id, CF7WPAYPREFIX.'item_number', $sku);
            update_post_meta($stripe_insert_id, CF7WPAYPREFIX.'payment_status', $status);
            update_post_meta($stripe_insert_id, CF7WPAYPREFIX.'payment_amount', $stripe_amount);
            update_post_meta($stripe_insert_id, CF7WPAYPREFIX.'payment_currency', $currency);
            update_post_meta($stripe_insert_id, CF7WPAYPREFIX.'txn_id', $txn_id);

            $response = array(
                'response'          =>    $status,
                'html_success'      =>    $html_success,
                'json_response'     =>    $stripe_response
            );

            echo json_encode($response);
            wp_die();
        }


        function init() {
            add_filter( 'wpcf7_editor_panels', array( $this, 'cf7wpay_editor_panels'), 10, 1 ); 
            add_action( 'wpcf7_after_save', array( $this, 'cf7wpay_after_save'), 10, 1 ); 
            add_action( 'wpcf7_before_send_mail', array( $this, 'save_application_form'));
            add_filter( 'wpcf7_ajax_json_echo', array( $this, 'cf7wpay_ajax_json_echo'), 20, 2 );
            add_action( 'wp_footer', array($this, 'cf7wpay_footer' ));
            add_action( 'wp_ajax_paypal_callback', array($this, 'cf7wpay_paypal_callback' ));
            add_action( 'wp_ajax_nopriv_paypal_callback', array($this, 'cf7wpay_paypal_callback' ));
            add_action('wp_ajax_cf7wpay_stripe_charge', array( $this, 'cf7wpay_stripe_charge'));
            add_action('wp_ajax_nopriv_cf7wpay_stripe_charge', array($this, 'cf7wpay_stripe_charge'));
        }

        public static function instance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
                self::$instance->init();
            }
            return self::$instance;
        }
    }
    cfywpay_cf7_panel::instance();
}

?>