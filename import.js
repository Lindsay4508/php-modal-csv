function traitementFiles()
{
 var buttonSend= document.getElementById('send');
 var myfiles= document.getElementById('monFichier');
 var  confirm= document.getElementById('confirmer');

buttonSend.addEventListener('click', function open(){

    if(typeof myfiles.showModal==="function"){
        myfiles.showModal();
    }
     
    else{
        console.error("impossible d'affichier la boite de dialogue")
    }
});

}

traitementFiles();

