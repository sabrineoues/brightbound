function validateForm(event) {
    // Empêche l'envoi par défaut
    event.preventDefault(); 
    // Sélectionne le formulaire et les champs de saisie
    const form = document.getElementById('sign-in'); // Remplacez 'myForm' par l'ID de votre formulaire
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
document.getElementById('sign-in').addEventListener('submit', validateForm);





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
  
  document.getElementById('mdp').addEventListener('keyup', function () {
    const password = this.value;
    const passwordError = document.getElementById('passwordError');
    const passwordRegex = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*()_+{}\[\]:;"'<>,.?/\\|`~]).{6,}$/;
  
    if (!passwordRegex.test(password)) {
        passwordError.textContent = "Le mot de passe n'est pas valide.";
        passwordError.classList.remove('success');
        passwordError.classList.add('error');
    } else {
        passwordError.textContent = 'Le mot de passe est validé.';
        passwordError.classList.remove('error');
        passwordError.classList.add('success');
    }
  });