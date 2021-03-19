var httpoj = createHttpRequest();

function createHttpRequest() {

    if(window.ActiveXObject){
        try {
            // MSXML2
            return new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                // MSXML
                return new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e2) {
                return null;
            } 
        }

    } else if(window.XMLHttpRequest){
        return new XMLHttpRequest();
    } else {
        return null;
    }
}

