
function checkFile() {
  var file = document.getElementById('uploadFile').value;

  if (file == '') {
    window.alert('請上傳一張照片');
    return false;
  }

}