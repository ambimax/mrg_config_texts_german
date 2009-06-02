----------------------------------------------------
Description
----------------------------------------------------

This module installs Static Blocks with text examples
and translated and modified E-Mail templates.

ACHTUNG! Das Modul überschreibt den Block 
footer_links.

Das Modul erstellt Blöcke mit Beispieltexten und 
installiert deutsche E-Mail Templates. Alle Webshops,
die in Deutschland betrieben werden, müssen bestimmte
Voraussetzungen erfüllen und unerschiedliche Informationen 
für den Verbraucher beinhalten. So muss der Verbraucher 
über z.B. Versandkosten, Bezahlmethoden, Bestellprozess usw.
explizit im Shop informiert werden. Um die Arbeit für 
den Shopbetreiber zu erleichern, installiert das Modul 
alle benötigten Texte, die u.A. auch vom Modul
Symmetrics_ConfigGerman, Symmetrics_Agreement usw. 
verwendet werden. 

Es werden auch rechtskonforme E-Mail E-Mail Templates
installiert, die AGBs und Widerrufsbelehrung beinhalten.
Die Templates sind alle in Deutsch übersetzt.

Symmetrics_ConfigGermanTexts erstellt u.A. Blöcke
für AGBs und Widerrufsbelehrung, die überall auf der 
Webseite verwendet werden können. Das erleichert die 
Arbeit erheblich, wenn die Texte ausgetauscht oder 
angepasst werden müssem. An Beispiel der AGB:

Sie ändern den eigentlichen AGB-Text in CMS -> Static
Blocks und die Änderungen erscheinen in 
Bestellbedingungen am Ende des Checkout-Prozesses
(Voraussetzung ist, dass das Modul Symmetrics_Agreement
installiert ist), auf der Seite "AGB" und in allen
E-Mail Templates.

Features:

- Erstellt Seiten für:

    - 404 Seite nicht gefunden
    - Impressum
    - Zahlungsarten
    - Datenschutz
    - Lieferung
    - Bestellvorgang

- Erstellt zentrale Blöcke für AGBs und Widerrufsrecht

- Erstellt untere Link-Leiste (inkl. leere AGB- und 
Widerrufsrecht-Links)

- Ersetzt standard E-Mail Templates mit rechtskonformen
und übersetzten E-Mail Templates inkl. AGB und 
Widerrufsbelehrung

- Alle Texte sind vor der Installation zentral über config.xml
veränderbar

----------------------------------------------------
Funktonalität und Besonderheiten
----------------------------------------------------

ACHTUNG! Das Modul überschreibt die Konfiguration von
E-Mail Templates. Die E-Mail Templates werden aber nicht 
ersetzt. Es werden neue E-Mail Templates hinzugefügt und 
die Konfiguration so angepasst, dass diese E-Mail 
Templates benutzt werden. 

WICHTIG! Die Daten aus config.xml werden nur einer 
Neuinstallation des Moduls in die Datenbank
geschrieben. Alle weitere Änderungen in config.xml
werden ignoriert. Alle Änderungen, die nach der
Installation gemacht werden, müssen über die Admin-
Oberfläche erfolgen.

Das Modul Symmetrics_ConfigGermanTexts arbeitet eng
mit dem Modul Symmetrics_Agreement zusammen. Es ist
empfehlenswert das Modul Symmetrics_Agreement ebenfalls
zu installieren. Symmetrics_ConfigGermanTexts erstellt
Blöcke und Seiten, die von Symmetrics_Agreement benutzt
werden.

Es besteht auch eine Verbindung zu dem Modul
Symmetrics_Impressum, welcher die Impressuminformationen
liefert. Auf der CMS-Seite Impressum und in AGBs finden
Sie die Programmaufrufe von diesem Modul. Es werden 
auch Beispieltexte für Symmetrics_Impressum installiert.
Sichtbar werden diese aber nur, wenn das Modul 
Symmetrics_Impressum installiert ist.

Das Modul installiert auch Beispieltexte für andere 
Symmetrics Konfigurations-Module, wie z.B. 
Symmetrics_InvoicePdf und Symmetrics_InvoicePdf.