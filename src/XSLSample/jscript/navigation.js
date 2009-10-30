function goHome(loc)
{
    window.location.href = loc.href;
}

function goToHomework(loc)
{
    window.location.href = loc.href;
}

function goToLocation(loc)
{
    if (browser.isIE)
        window.location.href = loc.href;
}