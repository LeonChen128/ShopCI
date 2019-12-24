
function checkMessage() {
  var message = document.getElementById('message').value;

  if (message.trim() == '') {
    window.alert('留言不可空白');
    return false;
  }
}