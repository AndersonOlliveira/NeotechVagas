



export function saveStorage(email){
   
    localStorage.setItem('id-adress', email);

}
export function pushStorage(){
    let emailStorage = localStorage.getItem('id-adress');
    if (emailStorage) document.getElementById('id-adress').value = emailStorage;

}

export function pushToken()
{
  
   return  document.querySelector('meta[name="csrf-token"]').getAttribute('content');

}
