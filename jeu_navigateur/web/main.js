function ajaxPost( url, data, callback ) {
    let req = new XMLHttpRequest();
    req.open( 'POST', url );
    req.setRequestHeader( 'Content-Type', 'application/x-www-form-urlencoded');
    req.addEventListener("load", function () {
        if (req.status >= 200 && req.status < 400) {
            callback(req.responseText);
        } else {
            console.error(req.status + " " + req.statusText + " " + url);
        }
    });
    req.addEventListener("error", function () {
        console.error("Erreur réseau avec l'URL " + url);
    });
    req.send( data );
}

function selectInvoke(){
}

function selectAssaillant(){
}

function selectTarget(){
}


window.addEventListener( 'load', function(){
    //sur les cartes main, rendre clicable et appeler invokeId 
    //sur les cartes conmbat, rendre clicable, stocker l'id, rendre clicable les cibles et au clic appeler attack
    //charger les pays
    ajaxPost( 'chained_list_model.php', '', setCountrys );
    document.querySelector( '.carteMain' ).addEventListener( 'click', selectInvoke);
    document.querySelector( 'carteCombat' ).addEventListener( 'click', selectAssaillant);
});
