* DOCUMENTATION

** INSTALLATION
Extract the contents of this archive into your Magento directory.
! The module overwrites footer_links block!

** USAGE
The module creates blocks with examples of texts and 
installs German e-mail templates. All the web shops
running in Germany should meet certain
 requirements and should contain different information 
for the consumer. Thus the consumer should be informed for ex. about shipment costs, payment methods, order processes etc. explicitly in the shop.
To make the work for the shop owner  easier, the module installs
all the required texts, which among others are also used by 
Symmetrics_ConfigGerman, Symmetrics_Agreement etc. modules.


Also legally compliant e-mail templates are installed, which contain Terms and Conditions along with revocation instructions. 
All the templates are translated into German. 

Symmetrics_ConfigGermanTexts creates along with other things blocks 
for the Terms and Conditions and revocation instructions, which can be used anywhere on the web page. This simplifies things considerably as the text would only need some changes or adjustments due to the facat that relevant placements are being centralized. This centralization also covers e-mail templates where text alterations will also be applied.
On the example of the Terms and Conditions: 

You change the actual text of Terms and Conditions in CMS-> Static
blocks and changes appear in 
Order Conditions at the end of the checkout process
(the requirement is, that the module Symmetrics_Agreement
is installed), on Terms and Conditions page and in all
 e-mail templates. 
ATTENTION! The module overwrites the e-mail templates configuration.
However, the e-mail templates are not replaced. New e-mail templates are added and 
the configuration is adjusted so that these new e-mail templates are used.
 
IMPORTANT! Data from config.xml will only be written to the database after the reinstallation of the module. All the further changes are ignored. All the changes after the installation should be made via the admin interface.


 The module Symmetrics_ConfigGermanTexts works closely 
with the module Symmetrics_Agreement. It is
 recommended to also install the module Symmetrics_Agreement.
Symmetrics_ConfigGermanTexts creates 
blocks and pages which are used by Symmetrics_Agreement.
 

There is also a connection to the module
Symmetrics_Imprint, which delivers impressum information.
On the CMS page Impressum Information and in Terms and Conditions
 you can find program requests of this module. Text examples are also installed for Symmetrics_Imprint.
However, it is visible only if the module Symmetrics_Imprint is installed. 

The module also installs text examples for other 
Symmetrics configuration modules, as for example 
Symmetrics_InvoicePdf and Symmetrics_InvoicePdf.

** FUNCTIONALITY
*** A: Creates pages for:
        Page not found
        Impressum
        Payment methods
        Data protection
        Delivery
        Order process

*** B: Creates central blocks for Terms and Conditions and revocation right
        mrg_business_terms-> Terms and Conditions
        mrg_revocation-> revocation instruction

*** C: Creates a bottom link bar (incl. empty Terms and Conditions and  
        revocation right links)

*** D: Replaces standard e-mail templates with legally compliant
        and translated e-mail templates incl. Terms and Conditions and 
        revocation instruction.

*** E: All the texts prior to installation are centrally alterable via HTML files
        (app / locale / de_DE)
        
*** F Translates some missing or not legally compliant
        strings. These are visible under
        app/locale/de_DE/Symmetrics_ConfigGermanTexts.csv

** TECHNICAL 
The whole functionality of the module is to be found in a migration script
 coupled with the setup model.

**  PROBLEMS
  No problems known.

* TESTCASES
** BASIC
*** A: Check whether the pages were appropriately created.
*** B: Check whether the blocks were appropriately created.
*** C: Check whether the bottom link bar was appropriately created 
        and all the links are functioning.
*** D: Check whether the emails were appropriately created.
        Go to the backend under "System"-> "Transactions-Emails".
        Click "Preview" for every email. If you see an empty page,
        this means that an error has occured.
*** E: Change the files before installation and check,
        whether the texts are applied.
*** F: Check whether all the strings are correctly translated.
