
const lookupButton = document.getElementById("lookup"); //Get the Button object and save to a variable
const lookupButton2 = document.getElementById("lookup2"); //Get the Button object and save to a variable
lookupButton.onclick = RespondClick; //function call to RespondClick when button is clicked
lookupButton2.onclick = RespondClick2; //function call to RespondClick when button is clicked
let sanitizedInput = ""; //declaration of sanitized input variable 
let input2 = "";

function encodeHTML(s) {      //helper function to sanitize user input (remove special character)
    return s.replace(/[^a-zA-Z '-]/g,'');
}
    
function RespondClick() {  // This function create new XMLHttpRequest object
    input2 = "&context=country";
    const searchInput = document.getElementById("search").value; //Save search Input as a variable
    sanitizedInput = encodeHTML(searchInput); // function call to sanitize function
    const xhr = new XMLHttpRequest (); 
    const url = '/world.php?country='; //Url to server
    xhr.onreadystatechange = dosomething;
    function dosomething (){
        if (xhr.readyState === 4){
            if(xhr.status === 200){                
                var response = xhr.responseText;
                document.getElementById("result").innerHTML=response;
            }else{
                console.log("File not found");
        }
    }
    }
    xhr.open('GET',url+sanitizedInput+input2,true);
    xhr.send(); 
}
function RespondClick2() {  // This function create new XMLHttpRequest object
    input2 = "&context=cities"
    const searchInput = document.getElementById("search").value; //Save search Input as a variable
    sanitizedInput = encodeHTML(searchInput); // function call to sanitize function
    const xhr = new XMLHttpRequest (); 
    const url = '/world.php?country='; //Url to server
    xhr.onreadystatechange = dosomething;
    function dosomething (){
        if (xhr.readyState === 4){
            if(xhr.status === 200){                
                var response = xhr.responseText;
                document.getElementById("result").innerHTML=response;
            }else{
                console.log("File not found");
        }
    }
}
xhr.open('GET',url+sanitizedInput+input2,true);
xhr.send();     
} 