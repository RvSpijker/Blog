if (localStorage.theme == 'light') {
    document.getElementById("theme").style.display = 'none';
    document.documentElement.className = 'light';
} else {
    document.getElementById("theme2").style.display = 'none';
    document.documentElement.className = 'dark';
}

function FunctionTheme() {
    if (localStorage.theme == 'light') {
        localStorage.theme = 'dark';
        location.reload();
    } else {
        localStorage.theme = 'light';
        location.reload();
    }
}