


// create XMLHttpRequest 
function createXMLHttpRequest() {
    
    if(window.ActiveXObject) {
        
        return new ActiveXObject("Microsoft.XMLHTTP");
        
    } else if ( window.XMLHttpRequest) {
        
        return new XMLHTTPRequest();
        
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
    searchBox = document.getElementById('searchBox');
    suggestionBox = document.getElementById('suggestionDiv');
    
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
    
    // open request to the server
    xmlHttp.open("GET", base_url + "/admin/search?" + query, true);
    
    // handle response
    xmlHttp.onreadystatechange = function() {
        
        //line 51
        
    }
}


