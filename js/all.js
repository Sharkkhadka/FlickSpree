$(document).ready(function() {

    // DROP DOWN CATEGORES
    $('#drop').click(function() {
        $('.drop-down-menu').toggle(100);
    });


    // AJAX SEARCHING IN HEADER 
    $('#search').on('keyup', function() {

        var searchTerm = $(this).val();

        if (searchTerm != '') {
            $.ajax({
                url: 'backend/search.php',
                type: 'POST',
                data: {
                    search: searchTerm
                },
                success: function(data) {
                    $('#search-result').html(data);
                }
            });
        } else {
            $('#search-result').html('');
        }

        $('body').click(function() {

            $('#search-result').html('');
        });
    });

    // user setting drop down
    $('#user-option').click(function(){
        $('#user-option-drop').toggle();
    });

    // category select box

    $("#category-dropdown").change(function(){
        var category = document.getElementById('category-dropdown').selectedIndex;
        var category_name = document.getElementsByTagName('option')[category].innerText;

        if(category == 0){
            $.ajax({
                url: 'backend/category_script.php',
                type: 'post',
                data: {
                    category_val: category
                },
                success: function(data){
                    $("#cat-list").html(data);
                    $("#cat-name").html(category_name);
                    console.log($("#cat-name").html(category_name));
                }
            });
        }
        else{

        
        $.ajax({
            url: 'backend/category_script.php',
            type: 'post',
            data: {
                category_val: category
            },
            success: function(data){
                $("#cat-list").html(data);
                $("#cat-name").html(category_name);
                console.log($("#cat-name").html(category_name));
            }
        });
    }
    });

    // video.php

    var vid = 2;
    // load videos
    $('#load-videos').on('click', function(){
        vid++;
        $.ajax({
            url: 'backend/load-video.php',
            type: 'POST',
            data: {
                load: vid
            },
            success: function(data){
                $('#new-videos').html(data);
            }
        });
    });


    // add comment
    $('#submit-comment').on('click', function(){
        var comment_box = $("#comment");
        var comment = comment_box.val();
        var video_id = $("#hidden-video-id").text();

        // console.log(comment);
        // console.log(video_id);
        
        if(comment != ''){
        $.ajax({
            url: 'backend/load-comment.php',
            type: 'POST',
            data: {
                comment: comment,
                video_id: video_id
            },
            success: function(data){
                if(data == 'Login_error'){
                    window.location = "login.php?id="+video_id;
                }
                if(data == 'insertion_unsuccessful'){
                    alert('comment not inserted');
                }
                else{
                    $('.comment-desc').html(data);
                    comment_box.val('');
                }
            }
        });
}else{
    alert('The comment cannot be empty');
}

    });

    // upload video and img ad_upload.php
    $("#form-video-upload").on('submit', function(e){
        e.preventDefault();
        let formData = new FormData(this);

        // alert('video');

        $.ajax({
            url: 'backend/upload-video.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(data){
                $("#video-container").html(data);
            }
        });
        
        $(document).on('click',"#remove-video", function(){
                let path = $('#remove-video').data('path');
            
                $.ajax({
                    url: 'backend/remove.php',
                    type: 'POST',
                    data: {
                        path: path
                    },
                    success: function(data){
                        if(data != ''){
                            $("#video-container").hide();
                            alert('unlinked');

                        }
                    }
                });
        });
    });

    $("#form-photo-upload").on('submit', function(e){
        e.preventDefault();
        let formData = new FormData(this);

        // alert('video');

        $.ajax({
            url: 'backend/upload-img.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(data){
                $("#thumbnail-container").html(data);
            }
        });

        $(document).on('click',"#remove-img", function(){
            let path = $('#remove-img').data('path');
        
            $.ajax({
                url: 'backend/remove.php',
                type: 'POST',
                data: {
                    path: path
                },
                success: function(data){
                    if(data != ''){
                        $("#thumbnail-container").hide();
                        alert('unlinked');
                    }
                }
            });
    });
    });

    // uploading video
    $("#upload-data").on('click', function(e){
        e.preventDefault();
        let title = $('#title').val();
        let desc = $('#desc').val();
        let date = $('#date').val();
        var category = document.getElementById('cat_select').selectedIndex;
        let videoName = $('#video').data("video-name");
        let photoName = $('#photo').data("photo-name");
        let status = 1;


        $.ajax({
            url: 'backend/upload-all.php',
            type: 'POST',
            data: {
                status: status,
                title: title,
                desc: desc,
                date: date,
                category: category,
                videoName: videoName,
                photoName: photoName
            },
            success: function(data){
                if(data == 'inserted successfully'){
                    window.location = 'ad_home.php';
                }
                else{
                    alert('data not inserted');
                }
            }
        });


    });


    // delete data
    $(document).on('click', "#delete-record", function(){
        
        if(confirm("Do you want to delete the record?")){
            var id = $(this).data('id');
            $.ajax({
                url: 'backend/ad_delete.php',
                type: 'POST',
                data: {
                    id: id
                },
                success: function(data){
                    if(data == 'success'){
                        window.location = 'ad_home.php';
                    }
                    else{
                        alert('cannot delete');
                    }
                }
            });
        }
        

    });

    // updating video
    $("#update_data").on('click', function(e){
        e.preventDefault();
        let id = $('#update-id').val();
        let title = $('#title').val();
        let desc = $('#desc').val();
        let date = $('#date').val();
        var category = document.getElementById('cat_select').selectedIndex;
        let videoName = $('#video').data("video-name");
        let videoId = $('#video').data("video-id");
        let photoName = $('#photo').data("photo-name");
        let status = 1;


        $.ajax({
            url: 'backend/update_all.php',
            type: 'POST',
            data: {
                Id: id,
                videoId: videoId,
                title: title,
                desc: desc,
                date: date,
                category: category,
                videoName: videoName,
                photoName: photoName
            },
            success: function(data){
                if(data == 'inserted successfully'){
                    window.location = 'ad_home.php';
                }
                else if(data == 'fields missing'){
                    alert('Fill all the fields');
                }
                else{
                    alert('data not inserted');
                }
            }
        });

    });

    // admin search
    $('#search-admin').on('keyup', function() {

        var searchTerm = $(this).val();

        if (searchTerm != '') {
            $.ajax({
                url: 'backend/search-admin.php',
                type: 'POST',
                data: {
                    search: searchTerm
                },
                success: function(data) {
                    $('#table').html(data);
                }
            });
        } 
        else {
            $('#search-admin').html('');
        }

        // $('body').click(function() {

        //     $('#search-result').html('');
        // });
    });
});