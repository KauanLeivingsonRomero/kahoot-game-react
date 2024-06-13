let chatRoomCheckbox = document.querySelector('#chatRoom')
let quizRoomCheckbox = document.querySelector('#quizRoom')
let qeaRoomCheckbox = document.querySelector('#qeaRoom')
let containerEmbedChatRoom = document.querySelector('#containerEmbedChatRoom')
let containerSelectQuizRoom = document.querySelector('#containerSelectQuizRoom')
let containerSelectQeaRoom = document.querySelector('#containerSelectQeaRoom')

const roomsController = () => {
    if (chatRoomCheckbox.checked === true) { containerEmbedChatRoom.classList.remove('d-none') } else { containerEmbedChatRoom.classList.add('d-none') }
    if (quizRoomCheckbox.checked === true) { containerSelectQuizRoom.classList.remove('d-none') } else { containerSelectQuizRoom.classList.add('d-none') }
    if (qeaRoomCheckbox.checked === true) { containerSelectQeaRoom.classList.remove('d-none') } else { containerSelectQeaRoom.classList.add('d-none') }
}