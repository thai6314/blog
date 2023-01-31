$(document).ready(function () {
    getListComment();
})
function handleReply(){
    console.log('handle')
}
function renderCommentView(data) {
    let html = ``;
    data.forEach(element => {
        html += `
            <div class="border rounded p-3  mt-2" >
                <div class="d-flex align-items-center">
                    <img src="${ element.comment.user?.avatar }" width="50" height="50" class="border rounded">
                    <div class="d-flex flex-column justify-center ms-2">
                        <span class="fw-bold">${ element.comment.user?.first_name + ' ' + element.comment.user?.last_name }</span>
                        <span style="max-width: 800px">${ element.comment.comment }</span>
                    </div>
                </div>
                <div>
                    <div id="comment_child_${ element.comment.comment_id }">
                    </div>

                </div>
            </div>
            <div id="reply_comment_${ element.comment.comment_id }">
                <button class="reply btn btn-primary mt-2" data-reply_id="${ element.comment.comment_id }">Reply</button>
            </div>`
    })

    $('#list-comment').html(html);
    data.forEach(element => {
        if (element.comment.hasOwnProperty('comments_child')) {
            let commentChildHtml = ``;
            element.comment.comments_child.forEach(commentChild => {
                commentChildHtml +=
                    `<div class="d-flex align-items-center border rounded " style="margin-left: 15%; margin-top: 5px">
                        <img src="${ commentChild.user.avatar }" width="50" height="50" class="border rounded">
                        <div class="d-flex flex-column justify-center ms-2" >
                            <span class="fw-bold">${ commentChild.user.first_name + ' ' + commentChild.user.last_name }</span>
                            <span style="max-width: 800px">${ commentChild.comment }</span>
                        </div>
                    </div>`;
            });

            $('#comment_child_'+ element.comment.comment_id).append(commentChildHtml);
        }
    })

    $('.reply').click(function () {
        let comment_id = $(this).data('reply_id');
        let html =
            `<div style="width: 100%;" class="mt-2">
                <div class="col" >
                    <input type="text" id="textReply_${comment_id}" class="form-control " style="height: 50px" name="comment" required
                        placeholder="Enter comment..."/>
                </div>
                <button id="btnReply_${comment_id}" class="btn btn-primary w-100 mt-2" >Reply</button>
            </div>`;
        $('#reply_comment_' + comment_id).html(html);

        $('#btnReply_' + comment_id).click(function (){
            if ($('#textReply_'+ comment_id).val() !== '') {
                let replyData ={
                    'content': $('#textReply_'+ comment_id).val(),
                    'parent_id': comment_id
                }
                submitData(replyData);
                getListComment();
                $('#textReply_'+ comment_id).val('');
            }
        });
    });
}

function getListComment() {
    const url = new URL(window.location.href);
    let split_url = url.pathname.split('/');
    let post_id = split_url[split_url.length - 1];
    $.ajax({
        type: 'GET',
        url: 'http://localhost:8000/api/comment/list_comment/' + post_id,
        dataType: 'json',
        success: function (response) {
            renderCommentView(response.data)
        },
        error: function (error) {
            console.log(error);
        }
    });
}

$('#btnComment').click(function () {
    if ($('#txtComment').val() !== '') {
        let comment = {
            'content': $('#txtComment').val(),
            'parent_id': null
        }
        submitData(comment);
        getListComment();
        $('#txtComment').val('');
    }
});


function submitData(comment) {
    let data = {
        'user_id': $('#user_id').val(),
        'post_id': $('#post_id').val(),
        'parent_id': comment.parent_id,
        'comment': comment.content
    }
    $.ajax({
        type: 'POST',
        url: 'http://localhost:8000/api/comment/add',
        data: data,
        dataType: 'json',
        success: (reponse) => {
            console.log(reponse);
        },
        error: (error) => {
            console.log(error);
        }
    });
}



