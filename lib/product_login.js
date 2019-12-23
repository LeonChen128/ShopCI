
function checkLogin() {
  var account  = document.getElementById('account').value;
  var password = document.getElementById('password').value;

  if (account.trim() == '') {
    window.alert('請輸入帳號');
    return false;
  }

  if (password.trim() == '') {
    window.alert('請輸入密碼');
    return false;
  } 
}