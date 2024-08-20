const bar = document.getElementById('bar');
const close = document.getElementById('close');
const nav = document.getElementById('navbar');

if (bar) {
  bar.addEventListener('click', () => {
    nav.classList.add('active');
  })
}
if (close) {
  close.addEventListener('click', () => {
    nav.classList.remove('active');
  })
}

//var num = document.getElementById('addqty');
var setn = document.getElementById('setqty');
var amt = document.getElementById('amount');

let count = 1;
let hanan = 1400;

setn.onclick = function(){
  count++;
  total = hanan * count;
  amt = document.replaceChild(total, '1400')
}


