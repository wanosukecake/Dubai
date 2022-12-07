document.addEventListener('DOMContentLoaded', function() {
  // 仮パスワード発行
  $('.js-temp_password').click(function() {
    const originString = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    const length = 8;
    let password = "";
    for(let i=0; i<length; i++){
      password += originString.charAt(Math.floor(Math.random() * originString.length));
    }
    document.getElementById("password").value = password;
  });
});