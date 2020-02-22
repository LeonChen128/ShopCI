
$(document).ready(function() {
  $('#check-name').click(function() {
    if (!$('#name').val() == "") {
      $.ajax({
      type: "POST",
      url: "http://127.0.0.1/ShopCI/product/ajaxCheckName",
      datatype: "JSON",
      data: {
        name: $('#name').val()
      },
      success: function(data) {
        if(data.name) {
          $('#result-name').html('此名稱已存在');
        } else {
          $('#result-name').html('此名稱可使用');
        }
      },
      error: function(XHR) {
        alert('發生錯誤：' + jqXHR.status)
      }
      })
    } else {
      $('#result-name').html('請輸入一個名稱');
    }
  })
})

function checkRegister() {
  var name       = document.getElementById('name').value;
  var account    = document.getElementById('account').value;
  var password   = document.getElementById('password').value;  
  var repassword = document.getElementById('repassword').value;

  if (name.trim() == '') {
    window.alert('請輸入名稱');
    return false;
  }

  if (name.trim().length > 10) {
    window.alert('名稱字數須小於10');
    return false;
  }

  if (account.trim() == '') {
    window.alert('請輸入帳號');
    return false;
  }

  if (account.trim().length > 12) {
    window.alert('帳號字數須小於12');
    return false;
  }

  if (password.trim() == '') {
    window.alert('請輸入密碼');
    return false;
  }

  if (password.trim().length > 12) {
    window.alert('密碼字數須小於12');
    return false;
  }

  if (password.trim() !== repassword.trim()) {
    window.alert('密碼確認錯誤');
    return false;
  }
}