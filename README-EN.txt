----------------------------------------------------
Description
----------------------------------------------------

This module installs Static Blocks with text examples 
and translated email templates as well. If you want
to start a webshop in Germany you have to abide by the 
German law. It says that all German webshops have to
provide sufficient information about the shop owner
and the whole order process.

Features:

- Creates example content:

    - Imprint (Impressum)
    - Payment information (Zahlungsarten)
    - Data privacy (Datenschutz)
    - Shipping (Lieferung)
    - Order process (Bestellprozess)
    
- Creates static blocks for agreement and revocation
for using it everywhere on the shop (for example in
emails)

- Replaces default email templates with translated 
and adds agreement and revocation to it

- All content can be changed comfortably over normal
HTML files

Symmetrics_ConfigGermanTexts works closly with 
Symmetrics_Agreement, Symmetrics_Impressum and other
Symmetrics configuration modules.

Other modules are providing the functionality and 
ConfigGermanTexts fills them with content and examples.

For example the module Symmetrics_Impressum provides
new {{blocks}} with shop owner information that can be 
used everywhere on the website. The page "Imprint" 
(Impressum) uses such block.

Installing other configuration modules is not required,
but strongly recommended. 