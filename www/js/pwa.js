/* Instalador de service worker*/
if("serviceWorker" in navigator){
    console.log("El navegador admite el SW");
    if(navigator.serviceWorker.controller){
        console.log("El service worker existe, no se necesita registrarlo de nuevo");
    }else{
        console.log("Registrando SW");
        navigator.serviceWorker.register("pwa_sw.js", {
            scope: "./"
        }).then(function(reg){
            console.log("Service worker ha sido registrado");
        });
    }
}