$(document).ready(function(){
    $('.deletebtn').click(function(evt){
        var name=$(this).data("name");
        var form=$(this).closest("form");
        evt.preventDefault();
        swal({
            title:`คุณต้องการลบข้อมูลของ ${name} ?`,
            icon :"warning",
            buttons:true,
            dangerMode:true
        }).then((willDelete)=>{
            if(willDelete){
                form.submit();
            }
        });
    });
});