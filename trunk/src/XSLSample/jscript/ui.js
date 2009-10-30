var lookupTable = new Array();
lookupTable['ie'] = "(Alt+%s)";
lookupTable['ff'] = "(Shift+Alt+%s)";
lookupTable['chrome'] = "(Alt+%s)";

function in_array(needle, haystack)
{
    var returnValue = false;
    if (haystack.length <= 0)
        returnValue = false;
    
    for (var i = 0; i < haystack.length; i++)
    {
        if (needle == haystack[i])
            returnValue = true;
    }
    
    return returnValue;
}

/**
 * function to process the access key links when the page is loaded
 */
function onLoad()
{
    var index = "ff";
    if (browser.isIE)
        index = "ie";
    if (browser.isChrome)
        index = "chrome";
    
    var linkCollection;
    if (document.getElementsByName('accessLinks'))
    {
        linkCollection = document.getElementsByName('accessLinks');
        
        for (var i = 0; i < linkCollection.length; i++)
        {
            linkCollection[i].innerHTML += " " + lookupTable[index].replace("%s", linkCollection[i].getAttribute('accesskey'));
        }
    }
}

function getEvent(event)
{
    var evt;
    if (browser.isIE)
        evt = window.event;
    else
        evt = event;
    return event;
}

/**
 * Browser detection object. When created only have to call the
 * members of the object to get wether the page is IE or some other type
 */
 
 function Browser()
 {
    this.isIE;
    this.isNS;
    this.isChrome;
    this.ua;
    
    var ua = this.ua = navigator.userAgent;
    var s = "";
    
    s = "MSIE";
    if (ua.indexOf(s) >= 0)
    {
        this.isIE = true;
        this.isNS = !this.isIE;
        return;
    }
    
    s = "Netscape6/";
    if (ua.indexOf(s) >= 0)
    {
        this.isIE = false;
        this.isNS = !this.isIE;
        return;
    }
    
    s = "Chrome/";
    if (ua.indexOf(s) >= 0)
    {
        this.isIE = false;
        this.isNS = this.isIE;
        this.isChrome = !this.isIE;
        return;
    }
    
    s = "Gecko";
    if (ua.indexOf(s) >= 0)
    {
        this.isIE = false;
        this.isNS = this.isIE;
        this.isChrome = this.isIE;
        return;
    }
 }
 
 var browser = new Browser();