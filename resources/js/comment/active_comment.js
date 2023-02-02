
$(document).ready(function(){
    $('.btn_active').click(function (){
        let data = {
            'comment_id': $(this).data('comment_id')
        }
        $.ajax({
            type: 'post',
            url: 'http://localhost:8000/api/comment/active',
            data:  data,
            success: (response)=>{
                location.reload();
            }
        })
    });
});
