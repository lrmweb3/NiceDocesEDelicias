
window.onload = function(){
    temporizador();
    tempHOME();
    tempLIVRO();
    tempAUTOR();
    tempONDECOMPRAR();
    tempCURIOSIDADES();
    tempLEITURARECOMENDADA();
    tempCONTATO();
}


//Temporizador do menu da pÃ¡gina Home
function temporizador(){
    setTimeout("mostrar()",10000);
}
function mostrar(){
    $("#menu").fadeIn("slow")
}
function ocultar(){
    $("#menu").fadeOut("slow")
}

//Temporizador do Background
function tempHOME(){
    setTimeout("home1()",500);
}
function home1() {
    $('#home').css('background-image', "url(img/home2.jpg)").fadeIn("slow");
    setTimeout("home2()",15000);
}
function home2() {
    $('#home').css('background-image', "url(img/home2.jpg)").fadeIn("slow");
    setTimeout("home1()",15000);
}


//Temporizador livro
function tempLIVRO(){
    setTimeout("livro1()",500);
}
function livro1() {
    $('#oLivro').css('background-image', "url(img/livro1.jpg)").fadeIn("slow");
    setTimeout("livro2()",15000);
}
function livro2() {
    $('#oLivro').css('background-image', "url(img/home1.jpg)").fadeIn("slow");
    setTimeout("livro3()",15000);
}
function livro3() {
    $('#oLivro').css('background-image', "url(img/home2.jpg)").fadeIn("slow");
    setTimeout("livro1()",15000);
}



//Temporizador Autor
function tempAUTOR(){
    setTimeout("autor1()",500);
}
function autor1() {
    $('#oAutor').css('background-image', "url(img/autor2.jpg)").fadeIn("slow");
    setTimeout("autor2()",15000);
}
function autor2() {
    $('#oAutor').css('background-image', "url(img/autor3.jpg)").fadeIn("slow");
    setTimeout("autor3()",15000);
}
function autor3() {
    $('#oAutor').css('background-image', "url(img/autor2.jpg)").fadeIn("slow");
    setTimeout("autor1()",15000);
}



//Temporizador Onde comprar
function tempONDECOMPRAR(){
    setTimeout("ondecomprar1()",500);
}
function ondecomprar1() {
    $('#comprarLivro').css('background-image', "url(img/livro1.jpg)").fadeIn("slow");
    setTimeout("ondecomprar2()",15000);
}
function ondecomprar2() {
    $('#comprarLivro').css('background-image', "url(img/contato2.jpg)").fadeIn("slow");
    setTimeout("ondecomprar3()",15000);
}
function ondecomprar3() {
    $('#comprarLivro').css('background-image', "url(img/curiosidades.jpg)").fadeIn("slow");
    setTimeout("ondecomprar1()",15000);
}



//Temporizador Curiosidades
function tempCURIOSIDADES(){
    setTimeout("curiosidades1()",500);
}
function curiosidades1() {
    $('#curiosidades').css('background-image', "url(img/curiosidades.jpg)").fadeIn("slow");
    setTimeout("curiosidades2()",15000);
}
function curiosidades2() {
    $('#curiosidades').css('background-image', "url(img/contato1.jpg)").fadeIn("slow");
    setTimeout("curiosidades3()",15000);
}
function curiosidades3() {
    $('#curiosidades').css('background-image', "url(img/home1.jpg)").fadeIn("slow");
    setTimeout("curiosidades1()",15000);
}



//Temporizador Leitura Recomendada
function tempLEITURARECOMENDADA(){
    setTimeout("Lrecomendada1()",500);
}
function tempLEITURARECOMENDADA() {
    $('#leituraRecomendada').css('background-image', "url(img/livro1.jpg)").fadeIn("slow");
}



//Temporizador Contato
function tempCONTATO(){
    setTimeout("contato1()",500);
}
function contato1() {
    $('#contato').css('background-image', "url(img/contato2.jpg)").fadeIn("slow");
    setTimeout("contato2()",15000);
}
function contato2() {
    $('#contato').css('background-image', "url(img/livro1.jpg)").fadeIn("slow");
    setTimeout("contato3()",15000);
}
function contato3() {
    $('#contato').css('background-image', "url(img/contato1.jpg) ").fadeIn("slow");
    setTimeout("contato1()",15000);
}