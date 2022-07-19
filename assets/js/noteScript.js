/**
 * Global Declarations
 */

/**
 * HTML Element Declarations
 * 
 * @type {HTML Element}
 */

const note = document.querySelector(".note");
const noteCursor = document.querySelector(".noteCursor");
// const keySound = document.querySelector(".keySound");
const popupLogin = document.querySelector(".popup--login");
// const popupRegister = document.querySelector(".popup--register");

/**
 * String Declarations
 * 
 * @type {String}
 */
// const characters = "абвгдежзийѝклмнопрстуфхцчшщьъюяabcdefghijklmnopqrstuvwxyz1234567890`\'\"\\~!@#$%^&*()-=_+[]{};:.<>,|?/№€§ї▄▐►╡♠☺◘♦";

/**
 * Array Declarations
 * 
 * @type {Array<String>}
 */
// const splitCharacters = characters.split("");

note.textContent = localStorage.getItem("note");
note.append(noteCursor);

/**
 * Window Event Listener - Page Load
 * 
 * @param {String} load - The event type to listen for
 * @param {Function({Object} evt)} The handler to be called when the event is fired
 * @fires window#load
 */
window.addEventListener("load", function() {
	noteCursor.scrollIntoView();
});

/**
 * Window Event Listener - Key Down
 * 
 * @param {String} keydown - The event type to listen for
 * @param {Function({Object} evt)} The handler to be called when the event is fired
 * @fires window#keydown
 */
// note.addEventListener("click", function(evt) {

// 	if(evt.target === note) {

// 		window.addEventListener("keydown", function(evt) {
// 		//Print pressed key
// 		// console.log(evt.key);
// 		if(!popupLogin.classList.contains("is-active") && !popupRegister.classList.contains("is-active")) {

// 			for(const char of splitCharacters) {
// 				if(char === evt.key.toLowerCase()) {
// 					note.textContent += evt.key;
// 				}
// 			}
// 			if(evt.key === "Backspace") {
// 				note.textContent = note.textContent.substr(0, note.textContent.length - 1);
// 			}
// 			else if(evt.code === "Space") {
// 				note.textContent += " ";
// 			}
// 			else if (evt.key === "Enter") {
// 				note.textContent += "\n";
// 			}
// 			else if(evt.code === "Tab") {
// 				note.textContent += "\t";
// 			}
// 			else if(evt.key === "Shift") {
// 				evt.key.toUpperCase();
// 			}
// 			note.append(noteCursor);

// 			noteCursor.scrollIntoView();
			
// 			localStorage.setItem("note", note.textContent);
// 		}
// 		});

// 		/**
// 		 * Window Event Listener - Key Up
// 		 * 
// 		 * @param {String} keyup - The event type to listen for
// 		 * @param {Function({Object} evt)} The handler to be called when the event is fired
// 		 * @fires window#keyup
// 		 */
// 		window.addEventListener("keyup", function(evt) {
// 			if(!popupLogin.classList.contains("is-active") && !popupRegister.classList.contains("is-active")) {
// 				// const keySoundAudio = new Audio(keySound.src);
// 				// keySoundAudio.play();

// 				//Play key sound
// 				new Audio(keySound.src).play();
// 			}
// 		});
// 	}
// });




