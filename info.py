# encoding: utf-8


# =============================================================================
# package info
# =============================================================================
NAME = 'symmetrics_config_texts_german'

TAGS = ('magento', 'module', 'symmetrics', 'config', 'german', 'germanconfig', 'texts')

LICENSE = 'AFL 3.0'

HOMEPAGE = 'http://www.symmetrics.de'

INSTALL_PATH = ''


# =============================================================================
# responsibilities
# =============================================================================
TEAM_LEADER = {
    'Sergej Braznikov': 'sb@symmetrics.de'
}

MAINTAINER = {
    'Eugen Gitin': 'eg@symmetrics.de'
}

AUTHORS = {
    'Eugen Gitin': 'eg@symmetrics.de'
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
REQUIRES = {
    'magento': '*',
    'mc_module_locale_mage_community_de_de': '*',
}

EXCLUDES = {
}

DEPENDS_ON_FILES = (
    'app/locale/en_US/template/email/account_new.html',
    'app/locale/en_US/template/email/account_new_confirmation.html',
    'app/locale/en_US/template/email/account_new_confirmed.html',
    'app/locale/en_US/template/email/admin_password_new.html',
    'app/locale/en_US/template/email/amazonpayments_asp_notification_error.html',
    'app/locale/en_US/template/email/contact_form.html',
    'app/locale/en_US/template/email/currency_update_warning.html',
    'app/locale/en_US/template/email/log_clean_warning.html',
    'app/locale/en_US/template/email/newsletter_subscr_confirm.html',
    'app/locale/en_US/template/email/newsletter_subscr_success.html',
    'app/locale/en_US/template/email/newsletter_unsub_success.html',
    'app/locale/en_US/template/email/password_new.html',
    'app/locale/en_US/template/email/payment_failed.html',
    'app/locale/en_US/template/email/product_alert_cron_error.html',
    'app/locale/en_US/template/email/product_price_alert.html',
    'app/locale/en_US/template/email/product_share.html',
    'app/locale/en_US/template/email/product_stock_alert.html',
    'app/locale/en_US/template/email/sitemap_generate_warning.html',
    'app/locale/en_US/template/email/wishlist_share.html',
    'app/locale/en_US/template/email/sales/creditmemo_new.html',
    'app/locale/en_US/template/email/sales/creditmemo_new_guest.html',
    'app/locale/en_US/template/email/sales/creditmemo_update.html',
    'app/locale/en_US/template/email/sales/creditmemo_update_guest.html',
    'app/locale/en_US/template/email/sales/invoice_new.html',
    'app/locale/en_US/template/email/sales/invoice_new_guest.html',
    'app/locale/en_US/template/email/sales/invoice_update.html',
    'app/locale/en_US/template/email/sales/invoice_update_guest.html',
    'app/locale/en_US/template/email/sales/order_new.html',
    'app/locale/en_US/template/email/sales/order_new_guest.html',
    'app/locale/en_US/template/email/sales/order_update.html',
    'app/locale/en_US/template/email/sales/order_update_guest.html',
    'app/locale/en_US/template/email/sales/shipment_new.html',
    'app/locale/en_US/template/email/sales/shipment_new_guest.html',
    'app/locale/en_US/template/email/sales/shipment_update.html',
    'app/locale/en_US/template/email/sales/shipment_update_guest.html'
)

PEAR_KEY = ''

COMPATIBLE_WITH = {
    'magento': '1.3.2.1',
}
