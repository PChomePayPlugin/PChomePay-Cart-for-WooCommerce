<?php
/**
 * Created by PhpStorm.
 * User: Jerry
 * Date: 2017/11/13
 * Time: 上午10:05
 */

defined('ABSPATH') || exit;

/**
 * Settings for PayPal Gateway.
 */


return array(
    'enabled' => array(
        'title' => __('Enable/Disable', 'woocommerce'),
        'type' => 'checkbox',
        'label' => __('Enable', 'woocommerce'),
        'default' => 'no'
    ),
    'title' => array(
        'title' => __('Title', 'woocommerce'),
        'type' => 'text',
        'description' => __('This controls the title which the user sees during checkout.', 'woocommerce'),
        'default' => __('PChomePay', 'woocommerce'),
        'desc_tip' => true,
    ),
    'description' => array(
        'title' => __('Description', 'woocommerce'),
        'type' => 'textarea',
        'description' => __('This controls the description which the user sees during checkout.', 'woocommerce'),
        'default' => __('透過 PChomePay支付連 進行付款。', 'woocommerce'),
    ),
    'app_id' => array(
        'title' => __('正式環境 APP ID', 'woocommerce'),
        'type' => 'text',
        'description' => __('須先向 PChomePay支付連 申請金流開通後，才可取得此金鑰', 'woocommerce'),
        'default' => '',
        'custom_attributes' => array(
            'required' => 'required'
        )
    ),
    'secret' => array(
        'title' => __('正式環境 SECRET', 'woocommerce'),
        'type' => 'text',
        'default' => '',
        'custom_attributes' => array(
            'required' => 'required'
        )
    ),
    'test_mode' => array(
        'title' => __('測試模式', 'woocommerce'),
        'label' => __('Enable', 'woocommerce'),
        'type' => 'checkbox',
        'description' => __('當勾選時，啟用 Sandbox 環境進行測試', 'woocommerce'),
        'default' => 'no'
    ),
    'sandbox_app_id' => array(
        'title' => __('測試環境 APP ID', 'woocommerce'),
        'type' => 'text',
        'description' => __('須先向 PChomePay支付連 申請金流開通後，才可取得此金鑰', 'woocommerce'),
        'default' => '',
        'custom_attributes' => array(
            'required' => 'required'
        )
    ),
    'sandbox_secret' => array(
        'title' => __('測試環境 SECRET', 'woocommerce'),
        'type' => 'text',
        'default' => '',
        'custom_attributes' => array(
            'required' => 'required'
        )
    ),
    'debug' => array(
        'title'       => __( 'Debug log', 'woocommerce' ),
        'type'        => 'checkbox',
        'label'       => __( 'Enable logging', 'woocommerce' ),
        'default'     => '',
        'description' => sprintf(
            __('當勾選時，將系統事件記錄在日誌中 <a href="%1$s" target="_blank">%2$s</a>', 'woocommerce'),
            esc_url(admin_url('admin.php?page=wc-status&tab=logs')),
            esc_html('WooCommerce Logs Page')
        ),
    ),
    'payment_methods' => array(
        'title' => __('付款方式', 'woocommerce'),
        'type' => 'multiselect',
        'description' => __('可以透過 cmd / ctrl 和滑鼠左鍵選擇多種付款方式<br><br>不同付款方式，支援的訂單金額上下限略有不同，我們將依訂單金額動態提供可支援的付款方式給使用者', 'woocommerce'),
        'options' => array(
            'CARD' => __('信用卡'),
            'ATM' => __('ATM'),
            'EACH' => __('銀行支付'),
            'IPL7' => __('7-11超商取貨'),
            'IPPI' => __('拍錢包'),
        )
    ),
    'card_installment' => array(
        'title' => __('信用卡分期', 'woocommerce'),
        'type' => 'multiselect',
        'description' => __('可以透過 cmd / ctrl 和滑鼠左鍵選擇多種分期方式<br><br>信用卡分期不適用於金額低於30元之訂單。', 'woocommerce'),
        'options' => array(
            'CRD_0' => __('一次付清', 'woocommerce'),
            'CRD_3' => __('3 期', 'woocommerce'),
            'CRD_6' => __('6 期', 'woocommerce'),
            'CRD_12' => __('12 期', 'woocommerce'),
            'CRD_18' => __('18 期', 'woocommerce'),
            'CRD_24' => __('24 期', 'woocommerce'),
        )
    ),
    'atm_expiredate' => array(
        'title' => __('ATM 虛擬帳號繳費期限', 'woocommerce'),
        'type' => 'select',
        'description' => __("請輸入 ATM 虛擬帳號繳費期限 (1~5 天)，預設 5 天。", 'woocommerce'),
        'default' => 5,
        'options' => array(
            '1' => __('1 天', 'woocommerce'),
            '2' => __('2 天', 'woocommerce'),
            '3' => __('3 天', 'woocommerce'),
            '4' => __('4 天', 'woocommerce'),
            '5' => __('5 天', 'woocommerce'),
        )
    ),
    'customize_order_received_text' => array(
        'title' => __('訂單成立後顯示訊息', 'woocommerce'),
        'type' => 'textarea',
        'description' => __('訂單成立顯示訊息。', 'woocommerce'),
        'default' => __('', 'woocommerce')
    )
);