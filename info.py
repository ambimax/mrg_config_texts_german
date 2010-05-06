# encoding: utf-8


# =============================================================================
# package info
# =============================================================================
NAME = 'symmetrics_config_texts_german'

TAGS = ('magento', 'module', 'symmetrics', 'config', 'german', 'germanconfig',
        'texts', 'mrg', 'php')

LICENSE = 'AFL 3.0'

HOMEPAGE = 'http://www.symmetrics.de'

INSTALL_PATH = ''


# =============================================================================
# responsibilities
# =============================================================================
TEAM_LEADER = {
    'Torsten Walluhn': 'tw@symmetrics.de',
}

MAINTAINER = {
    'Eugen Gitin': 'eg@symmetrics.de',
    'Eric Reiche': 'er@symmetrics.de',
}

AUTHORS = {
    'Eugen Gitin': 'eg@symmetrics.de',
    'Eric Reiche': 'er@symmetrics.de',
}

# =============================================================================
# additional infos
# =============================================================================
INFO = 'Standard- und Mustertexte für deutsche Shops'

SUMMARY = '''
    Standard- und Mustertexte für deutsche Shops
'''

NOTES = '''
'''

# =============================================================================
# relations
# =============================================================================
REQUIRES = [
    {'magento': '*', 'magento_enterprise': '*'},
    {'mc_module_locale_mage_community_de_de': '*'},
    {'symmetrics_config_german': '*'},
]

EXCLUDES = {}

prepend_path = 'app/locale/en_US/template/email/'
DEPENDS_ON_FILES = (
    prepend_path + 'account_new.html',
    prepend_path + 'account_new_confirmation.html',
    prepend_path + 'account_new_confirmed.html',
    prepend_path + 'admin_password_new.html',
    prepend_path + 'amazonpayments_asp_notification_error.html',
    prepend_path + 'contact_form.html',
    prepend_path + 'currency_update_warning.html',
    prepend_path + 'log_clean_warning.html',
    prepend_path + 'newsletter_subscr_confirm.html',
    prepend_path + 'newsletter_subscr_success.html',
    prepend_path + 'newsletter_unsub_success.html',
    prepend_path + 'password_new.html',
    prepend_path + 'payment_failed.html',
    prepend_path + 'product_alert_cron_error.html',
    prepend_path + 'product_price_alert.html',
    prepend_path + 'product_share.html',
    prepend_path + 'product_stock_alert.html',
    prepend_path + 'sitemap_generate_warning.html',
    prepend_path + 'wishlist_share.html',
    prepend_path + 'sales/creditmemo_new.html',
    prepend_path + 'sales/creditmemo_new_guest.html',
    prepend_path + 'sales/creditmemo_update.html',
    prepend_path + 'sales/creditmemo_update_guest.html',
    prepend_path + 'sales/invoice_new.html',
    prepend_path + 'sales/invoice_new_guest.html',
    prepend_path + 'sales/invoice_update.html',
    prepend_path + 'sales/invoice_update_guest.html',
    prepend_path + 'sales/order_new.html',
    prepend_path + 'sales/order_new_guest.html',
    prepend_path + 'sales/order_update.html',
    prepend_path + 'sales/order_update_guest.html',
    prepend_path + 'sales/shipment_new.html',
    prepend_path + 'sales/shipment_new_guest.html',
    prepend_path + 'sales/shipment_update.html',
    prepend_path + 'sales/shipment_update_guest.html',
)

PEAR_KEY = ''

COMPATIBLE_WITH = {
    'magento': ['1.4.0.0'],
    'magento_enterprise': ['1.8.0.0'],
}
