 var image1=new Image(); 
     image1.src="public/img/social.jpg";
     var image2=new Image();
     image2.src="public/img/a1.jpg";
     var image3=new Image();
     image3.src="public/img/a2.jpg";
     var image4=new Image();
     image4.src="public/img/a3.jpg";

 function check(form)
     {
        if(form.Email.value=="muhammadahmada188@gmail.com" && form.password.value=="123456"){
            window.open('d:/page2.html')
     }
        else{
            alert("Error Password or Username")     
     }
     }   

var step=1
     function slideit()
     {
       document.images.slide.src=eval("image"+step+".src")
       if(step<4)
                 step++
       else
                 step=1
       setTimeout("slideit()",2500)
     }