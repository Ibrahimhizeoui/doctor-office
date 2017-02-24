$(document).ready(function(){
    // Condition d'affichage du bouton
	 $('.go_top').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });
	
$('#ac2').click(function(){
        $('#del').css('display','none');
		$('#act').fadeOut("slow");
		$('#del').fadeIn();
        return false;
    });
$('#ac3').click(function(){
        $('#stat').css('display','none');
		$('#act').fadeOut("slow");
		$('#stat').fadeIn();
        return false;
    });
$('#r1').click(function(){
        $('#act').css('display','none');
		$('#f1').fadeOut("slow");
		$('#act').fadeIn("slow");
		$('html, body').animate({scrollTop : 0},1000);

        return false;
    });

$('#r2').click(function(){
        $('#act').css('display','none');
		$('#del').fadeOut("slow").hide();
		$('#act').fadeIn("slow");
        return false;
    });
	
$('#r3').click(function(){
        $('#act').css('display','none');
		$('#stat').fadeOut("slow").hide();
		$('#act').fadeIn();
        return false;
    });
$('#r4').click(function(){
        $('#act').css('display','none');
		$('#payment').fadeOut("slow").hide();
		$('#act').fadeIn("slow");
        return false;
    });

$('#ac5').click(function(){
        $('#payment').css('display','none');
		$('#act').fadeOut("slow");
		$('#payment').fadeIn();
        return false;
    });
	

    // Evenement au clic
    $('.go1').click(function(){
		var toPosition =$("#aff").position().top;
		  $("body,html").animate ({
			  scrollTop: toPosition},800)
        return false;
    });
	$('.go2').click(function(){
		var toPosition =$("#contact").position().top;
		  $("body,html").animate ({
			  scrollTop: toPosition},800)
        return false;
    });
	$('.go3').click(function(){
		var toPosition =$("#payment").position().top;
		  $("body,html").animate ({
			  scrollTop: toPosition},800)
        return false;
    });

});
$(function(){
      setInterval(function(){
         $(".alert").fadeOut("slow");
		$('.alert').fadeIn();
        return false;}, 100);
   });





(function() { 
function desactive(){var tool= document.getElementsByTagName('span');
for (var i=0;i<tool.length;i++){
	if(tool[i].className=='tooltip')
	tool[i].style.display='none';
	}
}
function gettooltip(element) {
while (element = element.nextSibling) {
if (element.className === 'tooltip') {
return element;
}
}
return false;
}

var check = {};

check['sex'] = function() {
var sex = document.getElementsByName('sex'),
tooltipStyle = getTooltip(sex[1].parentNode).style;
if (sex[0].checked || sex[1].checked) {
tooltipStyle.display = 'none';
return true;
} else {
tooltipStyle.display = 'inline-block';
return false;
}
};

check['lastname']=function(id){
	var lastname=document.getElementsById(id);
	var tooltipStyle=gettooltip(lastname).style;
	if(name.value.length>2){
		lastname.className='correct';
		tooltipStyle.display='none';}
	else{
		name.className = 'incorrect';
        tooltipStyle.display = 'inline-block';}
	};
	
check['firstname']=check['lastname'];

check['age']=function(){
	var age=document.getElementById('age'),tooltipStyle=gettooltip(age).style;
	agevalue=parseInt(age);
	if(!isNaN(agevalue)&& agevalue >5 && agevalue <100){
		age.className='correct';
		tooltipStyle.display='none';}
	else{
		 age.className='incorrect';
		 tooltipStyle.display='inline-block';}
		
	 };

check['login']=function(){
	var login=document.getElementById('login'),tooltipStyle=gettooltip(login);
	if (login.value.length >= 4) {
login.className = 'correct';
tooltipStyle.display = 'none';
return true;
} else {
login.className = 'incorrect';
tooltipStyle.display = 'inline-block';
return false;
}};

check['pwd1'] = function() {
var pwd1 = document.getElementById('pwd1'),
tooltipStyle = getTooltip(pwd1).style;
if (pwd1.value.length >= 6) {
pwd1.className = 'correct';
tooltipStyle.display = 'none';
return true;
} else {
pwd1.className = 'incorrect';
tooltipStyle.display = 'inline-block';
return false;
}
};


check['pwd2'] = function() {
var pwd1 = document.getElementById('pwd1'),
pwd2 = document.getElementById('pwd2'),
tooltipStyle = getTooltip(pwd2).style;
if (pwd1.value == pwd2.value && pwd2.value != '') {
pwd2.className = 'correct';
tooltipStyle.display = 'none';
return true;
} else {
pwd2.className = 'incorrect';
tooltipStyle.display = 'inline-block';
return false;
}
};
check['country'] = function() {
var country = document.getElementById('country'),
tooltipStyle = getTooltip(country).style;
if (country.options[country.selectedIndex].value != 'none')
{
tooltipStyle.display = 'none';
return true;
} else {
tooltipStyle.display = 'inline-block';
return false;
}
};
(function() { // Utilisation d'une fonction anonyme pour éviter

var myForm = document.getElementById('myForm'),
inputs = document.getElementsByTagName('input'),
inputsLength = inputs.length;
for (var i = 0 ; i < inputsLength ; i++) {
if (inputs[i].type == 'text' || inputs[i].type =='password') {
inputs[i].onkeyup = function() {
check[this.id](this.id); // « this » représente

};

}
}
myForm.onsubmit = function() {
var result = true;
for (var i in check) {
result = check[i](i) && result;
}
if (result) {
alert('Le formulaire est bien rempli.');
}
return false;
};
myForm.onreset = function() {
for (var i = 0 ; i < inputsLength ; i++) {
if (inputs[i].type == 'text' || inputs[i].type ==
'password') {
inputs[i].className = '';
}
}
desactive();
};
})();
desactive();
})();