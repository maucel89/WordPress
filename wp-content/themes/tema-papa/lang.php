<?php
function _m($s){
    $translate = array(
        'Altri hanno scritto anche:'        =>  'Andere haben auch geschrieben:',
        'Cerca nel sito'                    =>  'Finde in Seite',
        'Cognome'                           =>  'Nachname',
        'Commento'                          =>  'Kommentar',
        'Inserisci commento'                =>  'Abschicken',
        'L\'indirizzo email non verrà '.
            'pubblicato.'                   =>  'Deine E-Mail-Adresse wird nicht veröffentlicht.',
        'Lascia qui la tua valutazione '.
            'sul servizio guida:'           =>  'Sagen Sie mir Ihre Meinung zu meiner Führung:',
        'Nome'                              =>  'Vorname',
        'Nessuna valutazione è stata '.
            'ancora inserita...'            =>  'Noch keine Bewertung erhalten...',
        'Sito Web'                          =>  'Web Site',
        '/prenota-il-tuo-servizio/'         =>  '/de/reservierungen/'
    );
    return ((get_bloginfo('language')!='it-IT')?$translate[$s]:$s);
}