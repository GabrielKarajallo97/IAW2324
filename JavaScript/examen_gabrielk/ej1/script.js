let messages = [];

function postMessage() {
  const messageInput = document.getElementById('messageInput');
  const message = messageInput.value.trim();

  if (message !== '') {
    messages.push(message);
    displayMessages();
    messageInput.value = '';
  }
}

function deleteMessage(index) {
  messages.splice(index, 1);
  displayMessages();
}

function displayMessages() {
  const messageList = document.getElementById('messageList');
  messageList.innerHTML = '';


  messages.forEach((message, index) => {
    const listItem = document.createElement('li');
    listItem.className = 'message';

    const deleteIcon = document.createElement('span');
    deleteIcon.className = 'deleteIcon';
    deleteIcon.innerHTML = '🗑';
    deleteIcon.addEventListener('click', () => deleteMessage(index));

    listItem.innerHTML = `${message}`;
    listItem.appendChild(deleteIcon);

    messageList.appendChild(listItem);
  });
}

//guardar los mensajes en localstorage
localStorage.setItem();

//borrar mensajes
function deleteList() {
  localStorage.removeItem('#messageList');
}