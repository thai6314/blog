let current_post_id;
let current_user_id;
$(document).ready(function(){
    getListComment();

})
function renderCommentView(data){
    current_post_id = data.post_id;
    let html = ``;
    data.forEach(element =>{
        html += `
            <div class="border rounded p-3 d-flex align-items-center mt-2" >
                <img src="${element.user?.avatar}" width="50" height="50" class="border rounded">
                <div class="d-flex flex-column justify-center ms-2">
                    <span class="fw-bold">${element.user?.first_name + ' ' + element.user?.last_name}</span>
                    <span>${element.comment}</span>
                </div>
            </div>`
    })
    $('#list-comment').append(html);
}
 function getListComment(){
    const url = new URL(window.location.href);
    let split_url = url.pathname.split('/');
    let post_id = split_url[split_url.length - 1];
    $.ajax({
        type: 'GET',
        url: 'http://localhost:8000/api/list_comment/' + post_id,
        dataType: 'json',
        success: function(response){
            renderCommentView(response.data)
        },
        error: function (error) {
            console.log(error);
        }
    });
    current_post_id = post_id;
}
    $('#btnComment').click(function(){
        console.log($('#txtComment').val())
        let data = {
            'post_id': current_post_id,
            'comment': $('#txtComment').val()
        }
        $.ajax({
            type: 'POST',
            url: 'http://localhost:8000/api/comment/add',
            data: data,
            dataType: 'json',
            success: (reponse)=>{
                console.log(reponse);
            }
        });
    });
