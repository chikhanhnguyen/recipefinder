/* ----------------------------

	CustomValidation prototype

	- Keeps track of the list of invalidity messages for this input
	- Keeps track of what validity checks need to be performed for this input
	- Performs the validity checks and sends feedback to the front end

---------------------------- */

function CustomValidation(input) {
	this.invalidities = [];
	this.validityChecks = [];

	//add reference to the input node
	this.inputNode = input;

	//trigger method to attach the listener
	this.registerListener();
}

CustomValidation.prototype = {
	addInvalidity: function(message) {
		this.invalidities.push(message);
	},
	getInvalidities: function() {
		return this.invalidities.join('. \n');
	},
	checkValidity: function(input) {
		for ( var i = 0; i < this.validityChecks.length; i++ ) {

			var isInvalid = this.validityChecks[i].isInvalid(input);
			if (isInvalid) {
				this.addInvalidity(this.validityChecks[i].invalidityMessage);
			}

			var requirementElement = this.validityChecks[i].element;

			if (requirementElement) {
				if (isInvalid) {
					requirementElement.classList.add('invalid');
					requirementElement.classList.remove('valid');
				} else {
					requirementElement.classList.remove('invalid');
					requirementElement.classList.add('valid');
				}

			} // end if requirementElement
		} // end for
	},
	checkInput: function() { // checkInput now encapsulated

		this.inputNode.CustomValidation.invalidities = [];
		this.checkValidity(this.inputNode);

		if ( this.inputNode.CustomValidation.invalidities.length === 0 && this.inputNode.value !== '' ) {
			this.inputNode.setCustomValidity('');
		} else {
			var message = this.inputNode.CustomValidation.getInvalidities();
			this.inputNode.setCustomValidity(message);
		}
	},
	registerListener: function() { //register the listener here

		var CustomValidation = this;

		this.inputNode.addEventListener('keyup', function() {
			CustomValidation.checkInput();
		});


	}

};



/* ----------------------------

	Validity Checks

	The arrays of validity checks for each input
	Comprised of three things
		1. isInvalid() - the function to determine if the input fulfills a particular requirement
		2. invalidityMessage - the error message to display if the field is invalid
		3. element - The element that states the requirement

---------------------------- */

var nomValidityChecks = [
	{
		isInvalid: function(input) {
			return input.value.length < 2 || input.value.length > 35;
		},
		invalidityMessage: 'Cette entrée doit comporter au moins 2 caractères et au plus 35 caractères',
		element: document.querySelector('label[for="nom"] .input-requirements li:nth-child(1)')
	},
	{
		isInvalid: function(input) {
			var illegalCharacters = input.value.match(/[^a-zéèàA-Z-\-\ ' ]/g);
			return illegalCharacters ? true : false;
		},
		invalidityMessage: 'Seules les lettres sont autorisées',
		element: document.querySelector('label[for="nom"] .input-requirements li:nth-child(2)')
	}
];

var prenomValidityChecks = [
	{
		isInvalid: function(input) {
			return input.value.length < 2 || input.value.length > 35;
		},
		invalidityMessage: 'Cette entrée doit comporter au moins 2 caractères et au plus 35 caractères',
		element: document.querySelector('label[for="prenom"] .input-requirements li:nth-child(1)')
	},
	{
		isInvalid: function(input) {
			var illegalCharacters = input.value.match(/[^a-zéèàA-Z-\-\ ' ]/g);
			return illegalCharacters ? true : false;
		},
		invalidityMessage: 'Seules les lettres sont autorisées',
		element: document.querySelector('label[for="prenom"] .input-requirements li:nth-child(2)')
	}
];

var mailValidityChecks = [
	{
		isInvalid: function(input) {
			var matchCharacters = input.value.match(/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/g);
			return matchCharacters ? false : true;
		},
		invalidityMessage: 'Lentrée doit être un courrier valide',
		element: document.querySelector('label[for="mail"] .input-requirements li:nth-child(1)')
	}
];


var adrValidityChecks = [
	{
		isInvalid: function(input) {
			return input.value.length < 3;
		},
		invalidityMessage: 'Cette entrée doit comporter au moins 3 caractères',
		element: document.querySelector('label[for="adresse"] .input-requirements li:nth-child(1)')
	},
	{
		isInvalid: function(input) {
			var illegalCharacters = input.value.match(/[^a-zéèàA-Z0-9\s,'-]/g);
			return illegalCharacters ? true : false;
		},
		invalidityMessage: 'Seuls les lettres et les chiffres sont autorisés',
		element: document.querySelector('label[for="adresse"] .input-requirements li:nth-child(2)')
	}
];

var villeValidityChecks = [
	{
		isInvalid: function(input) {
			return input.value.length < 3;
		},
		invalidityMessage: 'Cette entrée doit comporter au moins 3 caractères',
		element: document.querySelector('label[for="ville"] .input-requirements li:nth-child(1)')
	},
	{
		isInvalid: function(input) {
			var illegalCharacters = input.value.match(/[^a-zéèàA-Z\s,'-]/g);
			return illegalCharacters ? true : false;
		},
		invalidityMessage: 'Seuls les lettres et les chiffres sont autorisés',
		element: document.querySelector('label[for="ville"] .input-requirements li:nth-child(2)')
	}
];

var cpValidityChecks = [
	{
		isInvalid: function(input) {
			return input.value.length != 5 || input.value.match(/[^0-9]/g);
		},
		invalidityMessage: 'Cette entrée doit comporter 5 chiffres',
		element: document.querySelector('label[for="cp"] .input-requirements li:nth-child(1)')
	}
];

var telValidityChecks = [
	{
		isInvalid: function(input) {
			return input.value.length != 10 || input.value.match(/[^0-9]/g);
		},
		invalidityMessage: 'Cette entrée doit comporter 10 chiffres',
		element: document.querySelector('label[for="tel"] .input-requirements li:nth-child(1)')
	}
];

var passwordValidityChecks = [
	{
		isInvalid: function(input) {
			return input.value.length < 8 | input.value.length > 100;
		},
		invalidityMessage: 'Cette entrée doit comporter entre 8 et 100 caractères',
		element: document.querySelector('label[for="password"] .input-requirements li:nth-child(1)')
	},
	{
		isInvalid: function(input) {
			return !input.value.match(/[0-9]/g);
		},
		invalidityMessage: 'Au moins 1 numéro est requis',
		element: document.querySelector('label[for="password"] .input-requirements li:nth-child(2)')
	},
	{
		isInvalid: function(input) {
			return !input.value.match(/[a-z]/g);
		},
		invalidityMessage: 'Au moins 1 lettre minuscule est requise',
		element: document.querySelector('label[for="password"] .input-requirements li:nth-child(3)')
	},
	{
		isInvalid: function(input) {
			return !input.value.match(/[A-Z]/g);
		},
		invalidityMessage: 'Au moins 1 lettre majuscule est requise',
		element: document.querySelector('label[for="password"] .input-requirements li:nth-child(4)')
	}
];

var passwordRepeatValidityChecks = [
	{
		isInvalid: function() {
			return passwordRepeatInput.value != passwordInput.value;
		},
		invalidityMessage: 'Ce mot de passe doit correspondre au premier'
	}
];

/* ----------------------------

	Setup CustomValidation

	Setup the CustomValidation prototype for each input
	Also sets which array of validity checks to use for that input

---------------------------- */
var nomInput = document.getElementById('nom');
var prenomInput = document.getElementById('prenom');
var cpInput = document.getElementById('cp');
var adrInput = document.getElementById('adresse');
var villeInput = document.getElementById('ville');
var telInput = document.getElementById('tel');
var mailInput = document.getElementById('mail');
var passwordInput = document.getElementById('password');
var passwordRepeatInput = document.getElementById('password_repeat');

nomInput.CustomValidation = new CustomValidation(nomInput);
nomInput.CustomValidation.validityChecks = nomValidityChecks;

prenomInput.CustomValidation = new CustomValidation(prenomInput);
prenomInput.CustomValidation.validityChecks = prenomValidityChecks;

cpInput.CustomValidation = new CustomValidation(cpInput);
cpInput.CustomValidation.validityChecks = cpValidityChecks;

adrInput.CustomValidation = new CustomValidation(adrInput);
adrInput.CustomValidation.validityChecks = adrValidityChecks;

villeInput.CustomValidation = new CustomValidation(villeInput);
villeInput.CustomValidation.validityChecks = villeValidityChecks;

telInput.CustomValidation = new CustomValidation(telInput);
telInput.CustomValidation.validityChecks = telValidityChecks;

prenomInput.CustomValidation = new CustomValidation(prenomInput);
prenomInput.CustomValidation.validityChecks = prenomValidityChecks;

mailInput.CustomValidation = new CustomValidation(mailInput);
mailInput.CustomValidation.validityChecks = mailValidityChecks;

passwordInput.CustomValidation = new CustomValidation(passwordInput);
passwordInput.CustomValidation.validityChecks = passwordValidityChecks;

passwordRepeatInput.CustomValidation = new CustomValidation(passwordRepeatInput);
passwordRepeatInput.CustomValidation.validityChecks = passwordRepeatValidityChecks;

/* ----------------------------

	Event Listeners

---------------------------- */

var inputs = document.querySelectorAll('input:not([type="submit"])');


var submit = document.querySelector('input[type="submit"');
var form = document.getElementById('registration');

function validate() {
	for (var i = 0; i < inputs.length; i++) {
		inputs[i].CustomValidation.checkInput();
	}
}

submit.addEventListener('click', validate);
form.addEventListener('submit', validate);
