const a = document.getElementById("l_1");
const a1 = document.getElementById("l_2");

const b = document.querySelector(".dsp");
const p = document.querySelector(".p")

const form1 = document.getElementById("f_1");
const form2 = document.getElementById("f_2");

const input_search = document.getElementById("ipt_srch");
if(a!= null){
  a.addEventListener("click",function(){
    form1.style.display="block";
    form2.style.display="none";

    a.style.display="none";
    a1.style.display="none";
    b.classList.toggle("hidden");
});
a1.addEventListener("click",function(){
  form2.style.display="block";
  form1.style.display="none";

  a.style.display="none";
  a1.style.display="none";
  b.classList.toggle("hidden");
})
b.addEventListener("click",function(){
  a.style.display="block";
  a1.style.display="block";
  form1.style.display="none";
  form2.style.display="none";
  b.classList.toggle("hidden");
  p.innerHTML = "";
})
}


