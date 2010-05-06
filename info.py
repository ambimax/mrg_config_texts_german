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

prepend_path = lambda template: 'app/locale/en_US/template/email/' + template
DEPENDS_ON_FILES = tuple((
    prepend_path(template)
    for template in (
    'account_new.html',
    'account_new_confirmation.html',
    'account_new_confirmed.html',
    'admin_password_new.html',
    'amazonpayments_asp_notification_error.html',
    'contact_form.html',
    'currency_update_warning.html',
    'log_clean_warning.html',
    'newsletter_subscr_confirm.html',
    'newsletter_subscr_success.html',
    'newsletter_unsub_success.html',
    'password_new.html',
    'payment_failed.html',
    'product_alert_cron_error.html',
    'product_price_alert.html',
    'product_share.html',
    'product_stock_alert.html',
    'sitemap_generate_warning.html',
    'wishlist_share.html',
    'sales/creditmemo_new.html',
    'sales/creditmemo_new_guest.html',
    'sales/creditmemo_update.html',
    'sales/creditmemo_update_guest.html',
    'sales/invoice_new.html',
    'sales/invoice_new_guest.html',
    'sales/invoice_update.html',
    'sales/invoice_update_guest.html',
    'sales/order_new.html',
    'sales/order_new_guest.html',
    'sales/order_update.html',
    'sales/order_update_guest.html',
    'sales/shipment_new.html',
    'sales/shipment_new_guest.html',
    'sales/shipment_update.html',
    'sales/shipment_update_guest.html',
)))

PEAR_KEY = ''

COMPATIBLE_WITH = {
    'magento': ['1.4.0.0'],
    'magento_enterprise': ['1.8.0.0'],
}
