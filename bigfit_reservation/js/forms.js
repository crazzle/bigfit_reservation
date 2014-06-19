function formhash(form, password) {
    // Erstelle ein neues Feld für das gehashte Passwort. 
    var p = document.createElement("input");
 
    // Füge es dem Formular hinzu. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
 
    // Sorge dafür, dass kein Text-Passwort geschickt wird. 
    password.value = "";
 
    // Reiche das Formular ein. 
    form.submit();
}
 
function regformhash(form, vorname, nachname, email, password, conf) {
	var i = 0;
	
    // Überprüfe, ob jedes Feld einen Wert hat
    if (vorname.value == ''         || 
    	nachname.value == ''         || 
          email.value == ''     || 
          password.value == ''  || 
          conf.value == '') {
 
        alert('Alle Felder müssen ausgefüllt sein.');
        return false;
    }
 
    // Überprüfe, dass Passwort lang genug ist (min 6 Zeichen)
    // Die Überprüfung wird unten noch einmal wiederholt, aber so kann man dem 
    // Benutzer mehr Anleitung geben
    if (password.value.length < 6) {
        alert('Das Passwort muss mindestens 6 Zeichen lang sein.');
        form.password.focus();
        return false;
    }
 
    // Mindestens eine Ziffer, ein Kleinbuchstabe und ein Großbuchstabe
    // Mindestens sechs Zeichen 
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/; 
    if (!re.test(password.value)) {
        alert('Das Passwort muss mindestens eine Zahl, einen Klein- und einen Großbuchstaben enthalten.');
        return false;
    }
 
    // Überprüfe die Passwörter und bestätige, dass sie gleich sind
    if (password.value != conf.value) {
        alert('Die beiden Passwörter stimmten nicht überein.');
        form.password.focus();
        return false;
    }
 
    // Erstelle ein neues Feld für das gehashte Passwort.
    var p = document.createElement("input");
 
    // Füge es dem Formular hinzu. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
 
    // Sorge dafür, dass kein Text-Passwort geschickt wird. 
    password.value = "";
    conf.value = "";
 
    // Reiche das Formular ein. 
    form.submit();
    return true;
}

function profileformhash(form, , , email, password, conf) {
	var i = 0;
	
    // Überprüfe, ob jedes Feld einen Wert hat
    if (vorname.value == ''         || 
    	nachname.value == ''         || 
          email.value == ''     || 
          password.value == ''  || 
          conf.value == '') {
 
        alert('Alle Felder müssen ausgefüllt sein.');
        return false;
    }
 
    // Überprüfe, dass Passwort lang genug ist (min 6 Zeichen)
    // Die Überprüfung wird unten noch einmal wiederholt, aber so kann man dem 
    // Benutzer mehr Anleitung geben
    if (password.value.length < 6) {
        alert('Das Passwort muss mindestens 6 Zeichen lang sein.');
        form.password.focus();
        return false;
    }
 
    // Mindestens eine Ziffer, ein Kleinbuchstabe und ein Großbuchstabe
    // Mindestens sechs Zeichen 
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/; 
    if (!re.test(password.value)) {
        alert('Das Passwort muss mindestens eine Zahl, einen Klein- und einen Großbuchstaben enthalten.');
        return false;
    }
 
    // Überprüfe die Passwörter und bestätige, dass sie gleich sind
    if (password.value != conf.value) {
        alert('Die beiden Passwörter stimmten nicht überein.');
        form.password.focus();
        return false;
    }
 
    // Erstelle ein neues Feld für das gehashte Passwort.
    var p = document.createElement("input");
 
    // Füge es dem Formular hinzu. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
 
    // Sorge dafür, dass kein Text-Passwort geschickt wird. 
    password.value = "";
    conf.value = "";
 
    // Reiche das Formular ein. 
    form.submit();
    return true;
}