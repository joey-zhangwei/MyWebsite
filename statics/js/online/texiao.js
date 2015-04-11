function  qh(w){
for(i=1;i<8;i++){
document.getElementById("q"+i).style.background="none"
document.getElementById("q"+i).style.color="#868686"
}
document.getElementById("q"+w).style.background="url(images/huaguo.jpg)"
document.getElementById("q"+w).style.color="#fff"
}



function  xw(x){
for(i=1;i<3;i++){document.getElementById("content"+i).style.display="none"
document.getElementById("a"+i).style.background="none"
document.getElementById("a"+i).style.color="#84a435"
}
document.getElementById("content"+x).style.display=""
document.getElementById("a"+x).style.background="url(images/denglu.jpg)"
document.getElementById("a"+x).style.color="#fff"
}