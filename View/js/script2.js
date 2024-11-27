//pour éviter un envoie vide du formulaire


function validateForm(event) {
    // Empêche l'envoi par défaut
    event.preventDefault(); 
    
    // Sélectionne le formulaire et les champs de saisie
    const form = document.getElementById('dynamic-form'); // Remplacez 'myForm' par l'ID de votre formulaire
    const inputs = form.querySelectorAll('input, textarea'); // Sélectionnez les champs à valider
    
    // Vérifie si un champ est vide
    for (let input of inputs) {
        if (input.value.trim() === '') {
            alert('Veuillez remplir tous les champs.');
            return false; // Arrête la fonction si un champ est vide
        }
    }
    
    // Si tous les champs sont remplis, le formulaire est soumis
    form.submit();
}
// Ajoute un écouteur d'événements au formulaire
document.getElementById('dynamic-form').addEventListener('submit', validateForm);

document.getElementById('prénom').addEventListener('keyup', function () {
    const prenom = this.value;
    var prenomError = document.getElementById('prenomError');
    const prenomRegex=/^[a-zA-Z]+$/;
  
    if (!prenomRegex.test(prenom)) {
        prenomError.textContent = "Votre prénom n'est pas valide.";
        prenomError.classList.remove('success');
        prenomleError.classList.add('error');
    } else {
        prenomError.textContent = 'Votre prénom est valide';
        prenomError.classList.remove('error');
        prenomError.classList.add('success');
    }
  });
  document.getElementById('nom').addEventListener('keyup', function () {
    const nom = this.value;
    var nomError = document.getElementById('nomError');
    const nomRegex=/^[a-zA-Z]+$/;
  
    if (!nomRegex.test(nom)) {
        nomError.textContent = "Votre nom n'est pas valide.";
        nomError.classList.remove('success');
        nomError.classList.add('error');
    } else {
        nomError.textContent = 'Votre nom est valide';
        nomError.classList.remove('error');
        nomError.classList.add('success');
    }
  });

//controle de saisie de l'input email
  document.getElementById('email').addEventListener('keyup', function () {
    const email = this.value;
    var emailError = document.getElementById('emailError');
    const emailRegex=/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  
    if (!emailRegex.test(email)) {
        emailError.textContent = "Votre e-mail n'est pas valide.";
        emailError.classList.remove('success');
        emailError.classList.add('error');
    } else {
        emailError.textContent = 'Votre email est valide';
        emailError.classList.remove('error');
        emailError.classList.add('success');
    }
  });
  //controle de saisie du numéro de téléphone

  document.getElementById('tel').addEventListener('keyup', function () {
    const number = this.value;
    var numberError = document.getElementById('numberError');
    const idRegex=/^[0-9]{8}$/;
  
    if (!idRegex.test(number)) {
        numberError.textContent = "Votre numéro n'est pas valide.";
        numberError.classList.remove('success');
        numberError.classList.add('error');
    } else {
        numberError.textContent = "Votre numéro est valide";
        numberError.classList.remove('error');
        numberError.classList.add('success');
    }
  });
 document.getElementById('parcours').addEventListener('keyup', function () {
    const niveau = this.value;
    var niveauError = document.getElementById('parcoursError');
    const niveauRegex=/^(?=.*b)(?=.*a)(?=.*c).*[\d]+$/;
  
    if (!niveauRegex.test(niveau)) {
        niveauError.textContent = "  pas valide,il est sous la forme bac+.";
        niveauError.classList.remove('success');
        niveauError.classList.add('error');
    } else {
        niveauError.textContent = "validé";
        niveauError.classList.remove('error');
        niveauError.classList.add('success');
    }
  });
  /*document.getElementById('demande').addEventListener('keyup', function () {
    const demande = this.value;
    var demandeError = document.getElementById('demandeError');
    const demandeRegex=/^[a-zA-Z\s]+$/;
  
    if (!demandeRegex.test(demande)) {
        demandeError.textContent = "pas validé.";
        demandeError.classList.remove('success');
        demandeError.classList.add('error');
    } else {
        demandeError.textContent = "validé";
        demandeError.classList.remove('error');
        demandeError.classList.add('success');
    }
  });
  document.getElementById('domaineM').addEventListener('keyup', function () {
    const subject = this.value;
    var subjectError = document.getElementById('subjectError');
    const subjectRegex=/^[a-zA-Z\s]+$/;
  
    if (!subjectRegex.test(subject)) {
        subjectError.textContent = "pas validé.";
        subjectError.classList.remove('success');
        subjectError.classList.add('error');
    } else {
        subjectError.textContent = "validé";
        subjectError.classList.remove('error');
        subjectError.classList.add('success');
    }
  });
  document.getElementById('CV').addEventListener('keyup', function () {
    const cv = this.value;
    var cvError = document.getElementById('cvError');
    const cvRegex=/^(https?:\/\/)?([a-zA-Z0-9-]+\.[a-zA-Z]{2,})(\/[a-zA-Z0-9-._~:/?#[\]@!$&'()*+,;%=]*)?(\.pdf|\.docx|\.odt|\.txt)$/;
  
    if (!cvRegex.test(cv)) {
        cvError.textContent = "pas validé.";
        cvError.classList.remove('success');
        cvError.classList.add('error');
    } else {
        cvError.textContent = "validé";
        cvError.classList.remove('error');
        cvError.classList.add('success');
    }
  });*/
  document.getElementById('mdp2').addEventListener('keyup', function () {
    const mdp = this.value;
    var mdpError = document.getElementById('mdpError');
    const mdpRegex=/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*()_+{}\[\]:;"'<>,.?/\\|`~]).{6,}$/;
  
    if (!mdpRegex.test(mdp)) {
        mdpError.textContent = "votre mot de passe doit etre de longuer minimale 6 et doit contenir des lettres , des nombres et des symboles";
        mdpError.classList.remove('success');
        mdpError.classList.add('error');
    } else {
        mdpError.textContent = "valide ";
        mdpError.classList.remove('error');
        mdpError.classList.add('success');
    }
  });

  //pour confirmer la mot de passe doit etre identique au mot de passe précédente
 
 /*document.getElementById('mdp1').addEventListener('keyup', function () {
    const mdp1 = this.value;
    var mdp1Error = document.getElementById('mdp1Error');
    const mdppre=document.getElementById('mdp2');
  
    if (mdp1!=mdppre) {
        mdp1Error.textContent = "Les mots de passe ne sont pas identiques ";
        mdp1Error.classList.remove('success');
        mdp1Error.classList.add('error');
    } else {
        mdp1Error.textContent = "valide ";
        mdp1Error.classList.remove('error');
        mdp1Error.classList.add('success');
    }
  });*/