function showanh(event){
        var reader=new FileReader();
        var image=document.getElementById("hinhsua")

        reader.onload=function(){
            if(reader.readyState == 2){
                image.src = reader.result;
            }
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    function showanh1(event){
        var reader=new FileReader();
        var image=document.getElementById("hinhthem")

        reader.onload=function(){
            if(reader.readyState == 2){
                image.src = reader.result;
            }
        }
        reader.readAsDataURL(event.target.files[0]);
    }