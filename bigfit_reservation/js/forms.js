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

function profileformhash(form, oldpwd, newpass, confpass) {
    // Ueberpruefe, ob jedes Feld einen Wert hat
    if (oldpwd.value == ''         || 
    	newpass.value == ''         || 
        confpass.value == '') {
 
        alert('Alle Felder m¸ssen ausgef¸llt sein.');
        return false;
    }
 
    // Ueberpruefe, dass das Passwort lang genug ist (min 6 Zeichen)
    // Die Ueberpruefung wird unten noch einmal wiederholt, aber so kann man dem 
    // Benutzer mehr Anleitung geben
    if (newpass.value.length < 6) {
        alert('Das neue Passwort muss mindestens 6 Zeichen lang sein.');
        form.confpass.value = '';
        form.newpass.focus();
        return false;
    }
 
    // Mindestens eine Ziffer, ein Kleinbuchstabe und ein Grossbuchstabe
    // Mindestens sechs Zeichen 
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/; 
    if (!re.test(newpass.value)) {
        alert('Das neue Passwort muss mindestens eine Zahl, einen Klein- und einen Groﬂbuchstaben enthalten.');
        form.confpass.value = '';
        form.newpass.focus();
        return false;
    }
 
    // Ueberpruefe die Passwoerter und bestaetige, dass sie gleich sind
    if (newpass.value != confpass.value) {
        alert('Die beiden Passwˆrter stimmen nicht ¸berein.');
        form.confpass.focus();
        return false;
    }
 
    // Erstelle neue Felder fuer die gehashten Passwoerter.
    var op = document.createElement("input");
    var np = document.createElement("input");
    var cp = document.createElement("input");
 
    // Fuege die Felder dem Formular hinzu. 
    form.appendChild(op);
    op.name = "op";
    op.type = "hidden";
    op.value = hex_sha512(oldpwd.value);
    form.appendChild(np);
    np.name = "np";
    np.type = "hidden";
    np.value = hex_sha512(newpass.value);
    form.appendChild(cp);
    cp.name = "cp";
    cp.type = "hidden";
    cp.value = hex_sha512(confpass.value);
 
    // Sorge dafuer, dass kein Text-Passwort geschickt wird. 
    oldpwd.value = "";
    newpass.value = "";
    confpass.value = "";
 
    // Reiche das Formular ein. 
    form.submit();
    return true;
}