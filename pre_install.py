import os
import sys
import string
import logging
import time
from xml.etree.ElementTree import parse

from symmetrics_saasrepo_installer import base, shortcuts


config = None # will be filled by main() with the current config dict
package_dir = os.path.dirname(os.path.abspath(__file__))
logger = logging.getLogger('symmetrics_config_german.pre_install')


def main(config_module, info_py):
    '''Is being called by the installer'''
    global config
    config = config_module
    
    customer = config['customer']
    magento = config['magento']
    
    data = dict(
        shop_name=magento['shop_name'],
        company_name=customer['company_name'],
        company_sub=customer['company_sub'],
        zip=customer['zip'],
        street=customer['street'],
        city=customer['city'],
        phone=customer['phone'],
        fax=customer['fax'],
        email=customer['email'],
        homepage=customer['homepage'],
        tax_number=customer['tax_number'],
        sales_tax_id_number=customer['sales_tax_id_number'],
        commercial_register=customer['commercial_register'],
        tax_office=customer['tax_office'],
        holder_names=customer['holder_name'],
        hrb=customer['hrb'],
        bank_account=customer['bank_account'],
        bank_id_code=customer['bank_id_code'],
        bank_name=customer['bank_name'],
        bank_swift=customer['bank_swift'],
        bank_iban=customer['bank_iban'],
        bank_account_owner=customer['bank_account_owner'],
        invoice_maturity=magento['invoice_maturity'],
        invoice_note=magento['invoice_note'],
        invoice_customer_prefix=magento['invoice_customer_prefix'],
    )
    
    for key, val in data.iteritems():
        if not isinstance(val, basestring):
            data[key] = str(val)
    
    filename = os.path.join(package_dir, 'build', 'app', 'code', 'local',
                            'Symmetrics', 'ConfigGermanTexts', 'etc',
                            'config.xml')
    tree = parse(filename)
    elements = tree.findall('default/config_german_texts/impressum/*')
    
    for element in elements:
        if data.has_key(element.tag):
            element.text = data[element.tag]
    
    tree.write(filename, 'UTF-8')
