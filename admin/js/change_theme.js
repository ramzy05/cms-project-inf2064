
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

console.log(theme_radio)
let btn_add = document.getElementById('add_btn');
let btn_update = document.getElementById('update_btn');

btn_update.addEventListener('click',function(){
  let url = window.location.href;
  url = url.slice(0,url.lastIndexOf('?'));

  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(){
  
  }
  xhr.open("POST",  url)
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("logo=ramses")
  //xhr.send("nom_mairie="+form_inputs['nom_mairie'].value+"&msg_welc="+form_inputs['msg_welc'].value+"&logo=ramses")
})
//form_inputs['logo'].value