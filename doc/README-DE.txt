----------------------------------------------------
Installation
----------------------------------------------------

ACHTUNG! Das Modul ueberschreibt den Block 
footer_links.

1. Ordner Symmetrics/ConfigGermanTexts nach 
app/code/local oder app/code/community kopieren.

2. Datei app/etc/modules/Symmetrics_ConfigGermanTexts.xml
nach app/etc/modules kopieren.

3. Ordner app/locale/de_DE/german_config_texts/ nach
app/locale/de_DE/german_config_texts/ kopieren.

4. ConfigGermanTexts/etc/config.xml oeffnen und 
Beispieltexte im Bereich <impressum> durch eigene Daten 
ersetzen. Ebenfalls ist es empfehlenswert die HTML-
Dateien mit Beispielinhalten zu ueberpruefen, ob die
Texte mit der gewuenschten Shopkonfiguration
uebereinstimmen. Alle Beispieltexte sind in HTML-Dateien
unter app/locale/de_DE/german_config/texts/ ausgelagert.

Alle Daten koennen spaeter ueber die Admin-Oberflaeche im 
Bereich "CMS -> Static Blocks" geaendert werden.

<config>
    <default>
        <config_german_texts>
            ...
            <blocks>
                <default>
                    ...
                    <sym_agb>
                        
                        <!-- Schaltet den Block ein oder aus (1,0) -->
                        <active>1</active>
                        
                        <!-- Konfiguration des Links im Footer -->
                        <footerlink>
                            <default>
                            
                                <!-- Link-Titel -->
                                <title>AGB</title>
                                
                                <!-- Link-Ziel -->
                                <link>agb</link>
                                
                            </default>
                        </footerlink>
                        
                        <!-- Blockinhalt -->
                        <text>[Pfad zu der Template-Datei]</text>
                    </sym_agb>
                    ...
                </default>
            </blocks>
            ...
            <emails>
                <default>
                    ...
	                <new_adminpassword>
                        
                        <!-- Schaltet das Template ein oder aus -->
	                    <active>1</active>
                        
                        <!-- Templateinhalt  -->                        
	                    <text>[Pfad zu der Template-Datei]</text>
                    </new_adminpassword>
                    ...
                </default>
            </emails>
            ...
        </config_german_texts>
    </default>
</config>

5. Cache loeschen

6. Frontend aufrufen

7. Fertig!

----------------------------------------------------
Beschreibung
----------------------------------------------------

Das Modul erstellt Bloecke mit Beispieltexten und 
installiert deutsche E-Mail Templates. Alle Webshops,
die in Deutschland betrieben werden, muessen bestimmte
Voraussetzungen erfuellen und unterschiedliche Informationen 
fuer den Verbraucher beinhalten. So muss der Verbraucher 
ueber z.B. Versandkosten, Bezahlmethoden, Bestellprozess usw.
explizit im Shop informiert werden. Um die Arbeit fuer 
den Shopbetreiber zu erleichern, installiert das Modul 
alle benoetigten Texte, die u.A. auch vom Modul
Symmetrics_ConfigGerman, Symmetrics_Agreement usw. 
verwendet werden. 

Es werden auch rechtskonforme E-Mail E-Mail Templates
installiert, die AGBs und Widerrufsbelehrung beinhalten.
Die Templates sind alle in Deutsch uebersetzt.

Symmetrics_ConfigGermanTexts erstellt u.A. Bloecke
fuer AGBs und Widerrufsbelehrung, die ueberall auf der 
Webseite verwendet werden koennen. Das erleichtert die 
Arbeit erheblich, wenn die Texte ausgetauscht oder 
angepasst werden muessen, da die relevanten Stellen nun alle zentralisiert werden, ebenso greift die Zentralisiertung bis auf die Emailtemplates, die die Textaenderungen ebenso bekommen wuerden. Am Beispiel der AGB:

Sie aendern den eigentlichen AGB-Text in CMS -> Static
Blocks und die Aenderungen erscheinen in 
Bestellbedingungen am Ende des Checkout-Prozesses
(Voraussetzung ist, dass das Modul Symmetrics_Agreement
installiert ist), auf der Seite "AGB" und in allen
E-Mail Templates.

Features:

- Erstellt Seiten fuer:

    - 404 Seite nicht gefunden
    - Impressum
    - Widerruf
    - AGB
    - Zahlungsarten
    - Datenschutz
    - Lieferung
    - Bestellvorgang

- Erstellt zentrale Bloecke fuer AGBs und Widerrufsrecht

- Erstellt untere Link-Leiste (inkl. leere AGB- und 
Widerrufsrecht-Links)

- Ersetzt standard E-Mail Templates mit rechtskonformen
und uebersetzten E-Mail Templates inkl. AGB und 
Widerrufsbelehrung

- Alle Texte sind vor der Installation zentral ueber 
HTML-Dateien veraenderbar

----------------------------------------------------
Funktonalitaet und Besonderheiten
----------------------------------------------------

ACHTUNG! Das Modul ueberschreibt die Konfiguration von
E-Mail Templates. Die E-Mail Templates werden aber nicht 
ersetzt. Es werden neue E-Mail Templates hinzugefuegt und 
die Konfiguration so angepasst, dass diese E-Mail 
Templates benutzt werden.

WICHTIG! Die Daten aus config.xml werden nur einer 
Neuinstallation des Moduls in die Datenbank
geschrieben. Alle weitere Aenderungen in config.xml
werden ignoriert. Alle Aenderungen, die nach der
Installation gemacht werden, muessen ueber die Admin-
Oberflaeche erfolgen.

Das Modul Symmetrics_ConfigGermanTexts arbeitet eng
mit dem Modul Symmetrics_Agreement zusammen. Es ist
empfehlenswert das Modul Symmetrics_Agreement ebenfalls
zu installieren. Symmetrics_ConfigGermanTexts erstellt
Bloecke und Seiten, die von Symmetrics_Agreement benutzt
werden.

Es besteht auch eine Verbindung zu dem Modul
Symmetrics_Impressum, welches die Impressuminformationen
liefert. Auf der CMS-Seite Impressum und in AGBs finden
Sie die Programmaufrufe von diesem Modul. Es werden 
auch Beispieltexte fuer Symmetrics_Impressum installiert.
Sichtbar werden diese aber nur, wenn das Modul 
Symmetrics_Impressum installiert ist.

Das Modul installiert auch Beispieltexte fuer andere 
Symmetrics Konfigurations-Module, wie z.B. 
Symmetrics_InvoicePdf und Symmetrics_InvoicePdf.