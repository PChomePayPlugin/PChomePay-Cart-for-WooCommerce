# *PChomePay for WooCommerce*

## 目錄
- [1. 簡介](#簡介)
- [2. 支援版本](#支援版本)
- [3. 安裝啟用](#安裝啟用)
- [4. 設定](#設定)
- [5. 注意事項](#注意事項)
- [6. 其他](#其他)
- [7. 版本紀錄](#版本紀錄)


## 簡介
使用此插件可以迅速將 [PChomePay](https://www.pchomepay.com.tw/) 的付款功能，加至 WooCommerce 之外掛上，提供用戶在結帳時可以選擇 PChomePay 提供的付款工具來完成付款。

## 支援版本
| Wordpress  | WooCommerce | PHP |
| :---------: | :----------: | :----------: |
| 6.4.2 | 8.4.0 | 8.2 |

## 安裝啟用
### 1.  解壓縮套件檔
下載檔案 `PChomePay-Cart-for-WooCommerce.zip`。

### 2. 上傳模組
1. 在 WordPress 後台，選擇 `外掛 (Plugins)` 功能。
2. 點擊 `安裝外掛 (Add New)` 按鈕，進入安裝外掛頁面。
3. 點擊 `上傳外掛 (Upload Plugin)` 按鈕，並選擇指定的套件檔案。
4. 點擊 `立即安裝 (Install Now)` 按鈕。

### 3. 啟用模組
安裝完成後，畫面會顯示是否安裝成功，若安裝成功會出現 `啟用外掛(Active Plugin)` 的按鈕，按下 `啟用外掛(Active Plugin)` 後即可開始使用模組。

## 設定
### 1. PChomePay 模組設定
1. 在 WordPress 後台，找到 WooCommerce 選單下的 `設定 (Settings)` 功能。
2. 選擇 `付款 (Payments)` 標籤
	1. 找到 `PChomePay支付連` 並點擊 `管理 (Manage)` 按鈕進入設定頁。
	2. 將串接金鑰依序填入。
	3. 選擇需要的付款方式、信用卡分期及 ATM 付款期限…等，再按下 `儲存設定 (Save changes)` 按鈕。
	4. 點擊返回按鈕，回到 `付款 (Payments)` 標籤頁面。

### 2. 拍錢包模組設定
1. 在 WordPress 後台，找到 WooCommerce 選單下的 `設定 (Settings)` 功能。
2. 選擇 `付款 (Payments)` 標籤。
3. 找到 `PChomePay PI-拍錢包` 並將啟用開關切成 `啟用 (Enabled)` 狀態。

## 注意事項
1.  此套件必須安裝於 `Wordpress (6.4.2)` 及 `WooCommerce (8.4.0)` 的版本，切勿升到較新的 Wordpress 及 WooCommerce 版本後才安裝套件。
2.  在使用該插件時，必須先取得 PChomePay 會員帳號之金流開通串接碼。
3.  當啟用測試模式時，將以測試環境 APP ID 和 SECRET 進行測試。此外，測試環境無商戶後台可供查詢，僅能透過 Woo 後台來查詢並檢視訂單。
4.  不可與其他金流服務商提供之模組一同使用。
5.  若調整 `PChomePay支付連` 的設定後，需再次啟用 `PChomePay PI-拍錢包` 付款模組。
6.  當用戶在 PChomePay 付款頁面未付款完成跳離時
	1. 用戶無法再次透過「我的帳號」的「訂單」再次進行付款。
	2. 若欲購買之商品相同，需先至「我的帳號」的「訂單」將原訂單取消，才可再次將商品加入購物車重新結帳付款。
7. 如果在技術串接上遇到問題，可以聯繫我們的  [PChomPay 技術服務信箱](mailto:tech_support@pchomepay.com.tw)，我們會儘快提供必要的協助。


## 其他
在 WooCommerce 模組中 `處理中 (Processing)` 狀態，表示用戶已付款完成，等待商戶出貨的狀態；若商戶將商品寄出後，可自行將訂單設為 `完成 (Completed)` 以利管理所有已出貨或待出貨訂單。

若您有自己的訂單管理方式，需要自動化將訂單從 `處理中 (Processing)` 設置為 `完成 (Completed)`，可以透過以下方式來實現。
1. 使用其他免費或付費插件，設定自動化腳本實現。
2. 透過修改 `functions.php` 來實現，以下將教學如何使用此方法。

**在進行任何更改之前，請確保備份您的網站，以防止資料遺失！**
1.  登入 WordPress 後台。
2.  選擇 `工具 (Tools) ` 選單，點擊 `佈景檔案主題編輯器 (Theme File Editor)`。
3. 在右側 `佈景主題檔案 (Theme Files)` 區塊，點擊 `佈景主題函式庫 Theme Functions (functions.php)`。
4. 在程式底部新增以下程式，並按下 `更新檔案 (Update File)` 按鈕來儲存。
	``` php=
	function auto_complete_order($order_id) {
		if (!$order_id) {
			return;
		}

		$order = wc_get_order($order_id);

		// 確認訂單付款狀態
		if ($order && $order->is_paid()) {
			// 更新訂單狀態為完成
			$order->update_status('completed');
		}
	}
	```

## 版本紀錄
### 2.0.4
2025-12-03
* 移除 eACH 付款方式。
### 2.0.3
2025-07-23
* 移除顧客端 Email 通知信件內文，超商取貨訂單之列印交寄單功能連結。
### 2.0.2
2025-07-01
* 修正插件設定的標題及描述不會正常套用至結帳頁的問題。
* 修正訂單失敗或逾期時沒有同步更新 WooCommerce 訂單的問題。
* 在 WooCommerce `訂單備註 (Order Note)` 擴充列印交寄單功能。
### 2.0.1
2025-04-21
* 修正不停用插件導致 `WooCommerce` 之資料夾被更名的問題。
* 調整 正式環境和測試環境 APP ID 和 SECRET 的輸入框。
### 2.0.0
2024-09-11
* 支援較新 Wordpress 及 WooCommerce 版本。
* 信用卡分期支援 18 / 24 期。
* 依據結帳之金額，動態提供可使用之付款方式給會員。
### 1.0.0
2020-06-10
* 初版。
