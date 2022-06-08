
function changeTheme(theme) {
  if(theme.checked){

    let url = window.location.href;
    url = url.slice(0,url.lastIndexOf('index'))+'change_theme.php';
    console.log(url)
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(response){
      if (this.readyState == 4 && this.status == 200) {
        console.log('tout est ok: '+this.responseText)
      }
    }
    xhr.open("POST",  url)
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("theme="+theme.value)
    
  }
}