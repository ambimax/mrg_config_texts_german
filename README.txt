----------------------------------------------------
Installation
----------------------------------------------------

ACHTUNG! Das Modul überschreibt den Block 
footer_links.

1. Ordner Symmetrics/ConfigGermanTexts nach 
app/code/local oder app/code/community kopieren.

2. ConfigGermanTexts/etc/config.xml öffnen und 
Beispieltexte durch eigene Daten ersetzen. Diese 
Daten können später über die Admin-Oberfläche im 
Bereich "CMS -> Static Blocks" geändert werden.

Zusätzlich können in diesem Schritt die Texte
konfiguriert werden.

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
                        
                        <!-- Blockinhalt
                        Bitte beachten Sie, dass im Text 
                        keine ' vorkommen. -->
                        <text>
                            AGB
                        </text>
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
                        
                        <!-- Templateinhalt 
                        Bitte beachten Sie, dass im Text 
                        keine ' vorkommen. -->                        
	                    <text>
                            TEXT
                        </text>
                    </new_adminpassword>
                    ...
                </default>
            </emails>
            ...
        </config_german_texts>
    </default>
</config>

3. Cache löschen

4. Frontend aufrufen

5. Fertig!

----------------------------------------------------
Beschreibung
----------------------------------------------------

Das Modul erstellt Blöcke mit Beispieltexten und 
installiert deutsche E-Mail Templates. Alle Webshops,
die in Deutschland betrieben werden, müssen bestimmte
Voraussetzungen erfüllen und Informationen für den 
Verbraucher beinhalten. So muss der Verbraucher über
z.B. Versandkosten, Bezahlmethoden, Bestellprozess usw.
explizit im Shop informiert werden. Um die Arbeit für 
den Shopbetreiber zu erleichern, installiert das Modul 
alle benötigten Texte, die u.A. auch vom Modul
Symmetrics_ConfigGerman, Symmetrics_Agreement usw. 
verwendet werden. 

Es werden auch rechtskonforme E-Mail E-Mail Templates
installiert, die AGBs und Widerrufsbelehrung beinhalten.

Symmetrics_ConfigGermanTexts erstellt u.A. Blöcke
für AGBs und Widerrufsbelehrung, die überall auf der 
Webseite verwendet werden können. Das erleichert die 
Arbeit erheblich, wenn die Texte ausgetauscht oder 
angepasst werden müss. Man braucht die Texte nur in
CMS -> Static Blocks zu verändern und die Änderung
überall übernommen, wo dieser Block aufgerufen wird.

Features:

- Erstellt Seiten für:

    - 404 Seite nicht gefunden
    - Impressum
    - Zahlungsarten
    - Datenschutz
    - Lieferung
    - Bestellvorgang

- Erstellt zentrale Blöcke für AGBs und Widerrufsrecht

- Ersetzt standard E-Mail Templates mit rechtskonformen
und übersetzten E-Mail Templates inkl. AGB und 
Widerrufsbelehrung

- Alle Texte sind vor der Installation zentral über config.xml
veränderbar

----------------------------------------------------
Funktonalität und Besonderheiten
----------------------------------------------------

ACHTUNG! Das Modul überschreibt die Konfiguration von
E-Mail Templates. Die E-Mail Templates selbst werden 
aber nicht ersetzt. Es werden neue E-Mail Templates 
hinzugefügt und die Konfiguration so angepasst, dass
diese E-Mail Template benutzt werden. 

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
Symmetrics_InvoicePdf.