let onOffQuizSwitch = document.querySelector('#onOffQuizSwitch')
let labelonOffQuizSwitch = document.querySelector('#labelonOffQuizSwitch')

const toggleLabelOnOffQuiz = () => {
    if ( onOffQuizSwitch.checked !== true ) { labelonOffQuizSwitch.textContent = "Ativar quiz" } else { labelonOffQuizSwitch.textContent = "Desativar quiz" }
}