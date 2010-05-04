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

_email_template = 'app/locale/en_US/template/email/'
DEPENDS_ON_FILES = (
    _email_template + 'account_new.html',
    _email_template + 'account_new_confirmation.html',
    _email_template + 'account_new_confirmed.html',
    _email_template + 'admin_password_new.html',
    _email_template + 'amazonpayments_asp_notification_error.html',
    _email_template + 'contact_form.html',
    _email_template + 'currency_update_warning.html',
    _email_template + 'log_clean_warning.html',
    _email_template + 'newsletter_subscr_confirm.html',
    _email_template + 'newsletter_subscr_success.html',
    _email_template + 'newsletter_unsub_success.html',
    _email_template + 'password_new.html',
    _email_template + 'payment_failed.html',
    _email_template + 'product_alert_cron_error.html',
    _email_template + 'product_price_alert.html',
    _email_template + 'product_share.html',
    _email_template + 'product_stock_alert.html',
    _email_template + 'sitemap_generate_warning.html',
    _email_template + 'wishlist_share.html',
    _email_template + 'sales/creditmemo_new.html',
    _email_template + 'sales/creditmemo_new_guest.html',
    _email_template + 'sales/creditmemo_update.html',
    _email_template + 'sales/creditmemo_update_guest.html',
    _email_template + 'sales/invoice_new.html',
    _email_template + 'sales/invoice_new_guest.html',
    _email_template + 'sales/invoice_update.html',
    _email_template + 'sales/invoice_update_guest.html',
    _email_template + 'sales/order_new.html',
    _email_template + 'sales/order_new_guest.html',
    _email_template + 'sales/order_update.html',
    _email_template + 'sales/order_update_guest.html',
    _email_template + 'sales/shipment_new.html',
    _email_template + 'sales/shipment_new_guest.html',
    _email_template + 'sales/shipment_update.html',
    _email_template + 'sales/shipment_update_guest.html',
)

PEAR_KEY = ''

COMPATIBLE_WITH = {
    'magento': ['1.4.0.0'],
    'magento_enterprise': ['1.7.0.0'],
}