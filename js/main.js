$('.klik').on('click', 'img', function(){
    $('#logovanje').slideToggle();
}),
$('.reg').on('click', function(){
    $('#regi').slideDown();
}),
$('.close').on('click', function(){
 $(this).parent('#logovanje').slideUp();
}),

$('.zatvori').on('click', function(){
    $('.registruj').slideUp();
})

function validate(){
    var datumP = document.getElementById('datumZaProvjeru').value;
    var datumRGEX = /^([1-9]|([012][0-9])|(3[01]))\/([0]{0,1}[1-9]|1[012])\/\d\d\d\d\s-\s([0-1]?[0-9]|2?[0-3]):([0-5]\d)$/;
    if (datumRGEX.test(datumP) == false) {
        alert("Datum mora biti formata DD/MM/GGGG - HH:MM");
        //$('#submit').attr('disabeled', 'disabeled');
        return false;
    }
    else {
        return true;
    }

}

