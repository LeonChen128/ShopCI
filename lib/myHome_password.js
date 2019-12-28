
function ckeckResetPassword() {
  var oldPassword = document.getElementById('oldPassword').value;
  var newPassword = document.getElementById('newPassword').value;
  var rePassword  = document.getElementById('rePassword').value;

  if (oldPassword.trim() == '') {
    window.alert('密碼欄位不可空白');
    return false;
  }

  if (newPassword == '') {
    window.alert('新密碼欄位不可空白');
    return false;
  }

  if (newPassword.length > 12) {
    window.alert('新密碼設定字數須小於12');
    return false;
  }

  if (newPassword != rePassword) {
    window.alert('新密碼確認錯誤');
    return false;
  }

}