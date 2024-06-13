let onOffUserSwitch = document.querySelector('#onOffUserSwitch')
let labelOnOffUserSwitch = document.querySelector('#labelOnOffUserSwitch')

const toggleLabelOnOffUser = () => {
    if ( onOffUserSwitch.checked !== true ) { labelOnOffUserSwitch.textContent = "Bloquear usuário" } else { labelOnOffUserSwitch.textContent = "Desbloquear usuário" }
}