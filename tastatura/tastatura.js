const characterB =["c","e","t","a","d","x","m"];
const characterI = ["c","e","t","a","d","x","m","1","2","7","0","=",".",";","[","/"]
const characterA = ["c","e","t","a","d","x","m","1","2","7","0","=",".",";","[","/","!","@","#","^","%","?","*"];

let words = document.getElementById('text');
let btnB = document.getElementById("beginner");
let btnI = document.getElementById("intermediate");
let btnA = document.getElementById("advanced");
let btnR = document.getElementById("refresh");

let timer;


function randomB() {
  	words.innerHTML = "";
	let wordArray = [];
	for ( let i = 0; i < 60; i++ ) {
		var random = Math.floor(Math.random()*characterB.length);
		wordArray.push(characterB[random].split(""));
	}

	for (var i = 0; i < wordArray.length; i++) {
		var span = document.createElement("span");
		span.classList.add("span");
		span.innerHTML = wordArray[i];
		words.appendChild(span);
	}
	spans = document.querySelectorAll(".span");
}

function randomI() {
  	words.innerHTML = "";
  	let wordArray = [];
	for ( let i = 0; i < 80; i++ ) {
		var random = Math.floor(Math.random()*characterI.length);
		wordArray.push(characterI[random].split(""));
	}
	for (var i = 0; i < wordArray.length; i++) { 
		var span = document.createElement("span");
		span.classList.add("span");
		span.innerHTML = wordArray[i];
		words.appendChild(span);
	}
	spans = document.querySelectorAll(".span");
}

function randomA() {
  	words.innerHTML = "";
  	let wordArray = [];
	for ( let i = 0; i < 100; i++ ) {
		var random = Math.floor(Math.random()*characterA.length);
		wordArray.push(characterA[random].split(""));
	}
	for (var i = 0; i < wordArray.length; i++) { 
		var span = document.createElement("span");
		span.classList.add("span");
		span.innerHTML = wordArray[i];
		words.appendChild(span);
	}
	spans = document.querySelectorAll(".span");
}

btnB.addEventListener("click", function(e){
	randomB();
	btnB.disabled = true;	
	btnI.disabled = true;	
	btnA.disabled = true;	
	time();
});

btnI.addEventListener("click", function(e){
	randomI();
	time();
	btnB.disabled = true;	
	btnI.disabled = true;	
	btnA.disabled = true;	
});

btnA.addEventListener("click", function(e){
	randomA();
	time();
	btnB.disabled = true;	
	btnI.disabled = true;	
	btnA.disabled = true;	
});

btnR.addEventListener("click", function(e){
	timer.stop();
	btnB.disabled = false;	
	btnI.disabled = false;	
	btnA.disabled = false;
	document.getElementById("time").innerHTML =  "00:00:00";
	document.getElementById("score").innerHTML = "0";
	document.getElementById("text").innerHTML="";
	document.addEventListener("keydown", typing, true);
});


function time()
{
	timer = new Timer();
	timer.start();

	timer.addEventListener('secondsUpdated', function(e) {
			document.getElementById("time").innerHTML = timer.getTimeValues().toString();
});
}

function actualCharacter(isShiftKey, characterCode) 
{
    if (characterCode === 27 || characterCode === 8 || characterCode === 9 || characterCode === 20 || characterCode === 16 || characterCode === 17 || characterCode === 91|| characterCode === 13|| characterCode === 92|| characterCode === 18) 
	{
        return false;
    }
	if (typeof isShiftKey != "boolean" || typeof characterCode != "number") 
	{
        return false;
	}
    var characterMap = [];
	var characterMap2 =[];
    characterMap[192] = "~";
    characterMap[49] = "!";
    characterMap[50] = "@";
    characterMap[51] = "#";
    characterMap[52] = "$";
    characterMap[53] = "%";
    characterMap[54] = "^";
    characterMap[55] = "&";
    characterMap[56] = "*";
    characterMap[57] = "(";
    characterMap[48] = ")";
	characterMap[189] ="_";
    characterMap[187] = "+";
    characterMap[219] = "{";
    characterMap[221] = "}";
    characterMap[220] = "|";
    characterMap[186] = ":";
    characterMap[222] = "\"";
    characterMap[188] = "<";
    characterMap[190] = ">";
    characterMap[191] = "?";
	characterMap2[192] = "`";
    characterMap2[49] = "1";
    characterMap2[50] = "2";
    characterMap2[51] = "3";
    characterMap2[52] = "4";
    characterMap2[53] = "5";
    characterMap2[54] = "6";
    characterMap2[55] = "7";
    characterMap2[56] = "8";
    characterMap2[57] = "9";
    characterMap2[48] = "0";
	characterMap2[189] ="-";
    characterMap2[187] = "=";
	characterMap2[219] = "[";
    characterMap2[221] = "]";
    characterMap2[220] = "\\";
    characterMap2[186] = ";";
    characterMap2[222] = "\"";
    characterMap2[188] = ",";
    characterMap2[190] = ".";
    characterMap2[191] = "/";
    var character = "";
    if (isShiftKey) 
	{
        if (characterCode >= 65 && characterCode <= 90) 
		{
            character = String.fromCharCode(characterCode);
        } 
		else 
		{
            character = characterMap[characterCode];
        }
    }
	else 
	{
		if (characterCode >= 65 && characterCode <= 90) 
		{
            character = String.fromCharCode(characterCode).toLowerCase();
        } 
		else 
		{
            character = characterMap2[characterCode];
        }
    }
    return character;
}

function typing(e) {
	keyCode = e.keyCode;
	typed = actualCharacter(e.shiftKey,keyCode);
	if(keyCode != '16') 
	{
		for (var i = 0; i < spans.length; i++) {
			if(spans[i].classList.contains("corect") || spans[i].classList.contains("gresit")) {
				continue;
			} else if(spans[i].innerHTML === typed){
					spans[i].classList.add("corect");
					break;
				
			} else {
					spans[i].classList.add("gresit");
					break;	
			}
			typed="";
		}
	}
	var checker = 0;
	var corect = 0;
		for (var j = 0; j < spans.length; j++) { 
				if (spans[j].className === "span corect" || spans[j].className === "span gresit") {
					checker++;
				}
				if (spans[j].className === "span corect"){
					corect++;
				}	
		}
			if (checker === spans.length) { 
		
				document.removeEventListener("keydown", typing, false);
				document.getElementById("score").innerHTML= (corect*100/spans.length).toFixed(2)+ "%";
				timer.stop();
				document.getElementById("timer").value = document.getElementById('time').innerHTML;
				document.getElementById("scor").value = document.getElementById('score').innerHTML;
			}
			

}

document.addEventListener("keydown", function(e){
	 var name = document.getElementById(e.code);
	 name.style.boxShadow = "0 5px gray";
	 name.style.transform = "translateY(4px)";
	 name.style.border = "none";
	 name.style.outline = "none";
});
document.addEventListener("keyup", function(e){
	var name = document.getElementById(e.code);
	name.style.boxShadow = "5px 5px 10px black";
	name.style.transform = "none";
});
document.addEventListener("keydown", typing, false);

