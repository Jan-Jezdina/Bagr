<?php
defined('ABSPATH') or die('No script kiddies please!');
require_once(ABSPATH . 'wp-admin' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'upgrade.php');
global $wpdb;
$updateChecked = get_option($this->get_option_name('update-version-check'), 0);
$currentVersion = $this->version;
if ($updateChecked !== $currentVersion) {
$tableName = $this->get_tablename('reviews');
$columns = $wpdb->get_results('SHOW COLUMNS FROM `'. $tableName .'`', ARRAY_A);
$columns = array_column($columns, 'Field');

if (!in_array('highlight', $columns)) {
$wpdb->query('ALTER TABLE `'. $tableName .'` ADD highlight VARCHAR(11) NULL AFTER rating');
}

if (!in_array('reply', $columns)) {
$wpdb->query('ALTER TABLE `'. $tableName .'` ADD reply TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL AFTER date');
}
if (in_array('replied', $columns)) {
$wpdb->query('ALTER TABLE `'. $tableName .'` DROP replied');
}
if (!in_array('reviewId', $columns)) {
$wpdb->query('ALTER TABLE `'. $tableName .'` ADD reviewId TEXT NULL AFTER date');
}

if (!in_array('hidden', $columns)) {
$wpdb->query('ALTER TABLE `'. $tableName .'` ADD hidden TINYINT(1) NOT NULL DEFAULT 0 AFTER id');
}
if (get_option($this->get_option_name('review-content'))) {
$contentVersion = get_option($this->get_option_name('content-saved-to'));
if (!$contentVersion || $contentVersion != $currentVersion) {
update_option($this->get_option_name('content-saved-to'), $version, false);
delete_option($this->get_option_name('review-content'));
$this->noreg_save_css(true);
}
}
$oldRateUs = get_option('trustindex-'. $this->getShortName() .'-rate-us');
if ($oldRateUs) {
if ($oldRateUs === 'hide') {
$this->setNotificationParam('rate-us', 'hidden', true);
}
else {
$this->setNotificationParam('rate-us', 'active', true);
$this->setNotificationParam('rate-us', 'timestamp', $oldRateUs);
}
}
$oldNotificationEmail = get_option('trustindex-'. $this->getShortName() .'-review-download-notification-email');
if ($oldNotificationEmail) {
$this->setNotificationParam('review-download-finished', 'email', $oldNotificationEmail);
}
$usedOptions = [];
foreach ($this->get_option_names() as $optName) {
$usedOptions []= $this->get_option_name($optName);
}
$wpdb->query('DELETE FROM `'. $wpdb->options .'` WHERE option_name LIKE "trustindex-'. $this->getShortName() .'-%" AND option_name NOT IN ("'. implode('", "', $usedOptions) .'")');
$this->handleCssFile();
update_option($this->get_option_name('update-version-check'), $currentVersion);
update_option($this->get_option_name('version'), $currentVersion);
}
?>