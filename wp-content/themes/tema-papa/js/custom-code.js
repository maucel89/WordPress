//FUNZIONE PER FAR APPARIRE L'URL CORRETTO CON IL CLOACK DI ALTERVISTA
/*(function(){
	var DOMAIN = "www.guidasiracusa.info";
	
	var NEW_DOCUMENT = 0;
	if(this != parent && name == "XYZZY2"){
		parent.postMessage({type: NEW_DOCUMENT, title: document.title, pathquery: location.pathname+location.search}, "http://"+DOMAIN);
	}else{
		location.replace("//"+DOMAIN+location.pathname+location.search);
	}
})()*/


//VARIABILE PER FAR FUNZIONARE JQUERY SU WP
var $j = jQuery.noConflict();

//FACCIAMO SI CHE SU MOBILE VENGA IMPOSTA L'ESECUZIONE DEL SITO A BASSA LARGHEZZA
$j(function() {
    if(jQuery.browser.mobile)
        $j("body").addClass("xs");
});

//BARRA LATERALE
$j(function(){
    $j("#sidebar-menu li a").unwrap();
    $j("#sidebar-menu a").addClass("list-group-item");
    
});

//SELEZIONARE IL MENU ATTIVO
$j(function(){
    $j("li.current-menu-item").addClass("active");
    $j("li:has('li.active')").addClass("active");
});

//DROPDOWN MENU
$j(function(){
    $j(".nav ul.sub-menu").addClass("dropdown-menu");
    var a = $j(".nav ul.sub-menu").prev();
    a.addClass("dropdown-toggle");
    a.append(' <span class="caret"></span>');
    a.attr('href', '#');
    a.attr("data-toggle", "dropdown");
});

//ALERT LINK
$j(function(){
    $j("div.alert a").addClass("alert-link");
});

//STILE PULSANTI SUBMIT
$j(function(){
    $j("#submit, .comment-reply-link").addClass("btn btn-default");
});

//AVATAR COMMENTI
$j(function(){
    $j(".comment-author img.avatar").addClass("media-object img-thumbnail");
});

//ELIMINARE I PARAGRAFI NEGLI SLIDESHOW
$j(function(){
    $j(".carousel-inner p, .row > p, .row > br, .alert br, .col-lg-6 > br").remove();
    $j("p:empty").remove();
});

//BOTTONE FORM PRENOTAZIONE BLU
$j(function(){
    $j(".form-submit #submit").addClass("btn-primary");
});

//GRANDEZZA FORM RICERCA
$j(document).ready(function () {
    ToggleSmall();
});
$j(window).resize(function() {
    ToggleSmall();
});
function ToggleSmall() {
    var pageWidth = $j(window).width();
    if( (pageWidth >= 768) && (pageWidth < 992) ){
        //$j("#searchform div:first-child").css("background-color", "black");
        $j("#searchform div:first-child").removeClass("input-group-lg");
    }else $j("#searchform div:first-child").addClass("input-group-lg");
}