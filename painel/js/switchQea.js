let onOffQeaSwitch = document.querySelector('#onOffQeaSwitch')
let labelonOffQeaSwitch = document.querySelector('#labelonOffQeaSwitch')

const toggleLabelOnOffQea = () => {
    if ( onOffQeaSwitch.checked !== true ) { labelonOffQeaSwitch.textContent = "Ativar pesquisa" } else { labelonOffQeaSwitch.textContent = "Desativar pesquisa" }
}