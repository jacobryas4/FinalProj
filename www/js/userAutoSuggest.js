var xmlHttp;
var num = 0;
var activeTitle = -1;
var searchBox, suggestionBox;


// create XMLHttpRequest 
function createXMLHttpRequest() {
    
    if(window.ActiveXObject) {
        
        return new ActiveXObject("Microsoft.XMLHTTP");
        
    } else if ( window.XMLHttpRequest) {
        
        return new XMLHttpRequest();
        
    } else {
        
        alert("Error creating the XMLHttpRequest object.");
        return false;
        
    }
    
}

// on page load
window.onload = function () {
    
    // create XMLHttpRequest
    xmlHttp = createXMLHttpRequest();
    
    // get elements
    searchBox = document.getElementById('searchBoxuser');
    suggestionBox = document.getElementById('suggestionDivuser');
    
    
};

window.onclick = function() {
    suggestionBox.style.display = "none";
}

// send XMLHttp request
function suggest(query) {
    // if no query, clear box
    if (query === "") {
        suggestionBox.innerHTML = "";
        return;
    }
    console.log(query);
    // open request to the server
    xmlHttp.open("GET", base_url + "/user/suggest/" + query, true);
    
    // handle response
    xmlHttp.onreadystatechange = function() {
        
        if (xmlHttp.readyState === 4 && xmlHttp.status === 200) {
             console.log(xmlHttp.responseText);
            // extract the JSON 
            var titles = JSON.parse(xmlHttp.responseText);
           
            displaySuggestions(titles);
            
        }
        
    };
    
    xmlHttp.send(null);
}

// populate suggestion box 
function displaySuggestions(suggestions) {
    num = suggestions.length;
    
    active = -1;
    if (num === 0) {
        suggestionBox.style.display = 'none';
        return false;
    }
    
    var divContent = "";
    
    // retrieve suggestions from JSON
    for (var i = 0; i < num; i++) {
        divContent += "<span id=s_" + i + " onclick='clickSuggestion(this)'>" + suggestions[i] + "</span>";
    }
    
    // display spans
    suggestionBox.innerHTML = divContent;
    suggestionBox.style.display = "block";
    
}

function handleKeyUp(e) {
    // get the key event
    e = (!e) ? window.event : e;
    
    if (e.keyCode !== 38 && e.keyCode !== 40) {
        suggest(e.target.value);
        
        return;
    }
    
    // if the up arrow key is pressed
    if (e.keyCode === 38 && activeTitle > 0) {
        activeTitleObj.style.backgroundColor = "#FFF";
        activeTitle--;
        activeTitleObj = document.getElementById("s_" + activeTitle);
        activeTitleObj.style.backgroundColor = "#F5DEB3";
        searchBoxObj.value = activeTitleObj.innerHTML;
        
        return;
    }
    
    // if down arrow key is pressed
    if(e.keyCode === 40 && activeTitle < numTitles - 1) {
        
        if(typeof(activeTitleObj) != "undefined") {
            activeTitleObj.style.backgroundColor = "#FFF";
           
        }
        
        activeTitle++;
        activeTitleObj = document.getElementById("s_" + activeTitle);
        activeTitleObj.style.backgroundColor = "#F5DEB3";
        searchBoxObj.value = activeTitleObj.innerHTML;
        
    }   
}

function clickSuggestion (s) {
    searchBox.value = s.innerHTML;
    suggestionBox.style.display = "none";
}
