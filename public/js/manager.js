// 仮パスワード発行
function createTempPassword() {
    const originString = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    const length = 8;
    let password = "";
    for(let i=0; i<length; i++){
      password += originString.charAt(Math.floor(Math.random() * originString.length));
    }
    document.getElementById("password").value = password;
}