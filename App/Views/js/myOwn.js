$(document).ready(function () {

    // Toggling Nearest Comment Form

    // $(".comments-list").toggle();
    // $(".toggle-comments").click(function () {
    //     $(this).closest(".ui-block").find(".comments-list").toggle("slow");
    // });

    // // Post Date On Mouse Enter/Leave
    // $(".post__date > .published").mouseover(function () {
    //     var temp = $(this).attr("datetime");
    //     $(this).attr("datetime", $(this).text());
    //     $(this).text(temp);
    // }).mouseleave(function () {
    //     var temp = $(this).attr("datetime");
    //     $(this).attr("datetime", $(this).text());
    //     $(this).text(temp);
    // });

    // // Submitting Comments
    // $('.submit-comments').click(function (e) {
    //     e.preventDefault();
    //     var commentForm = $(this).closest('.comment-form');
    //     $.ajax({
    //         type: 'POST',
    //         url: '/addcomment',
    //         dataType: 'JSON',
    //         data: commentForm.serialize(),
    //         success: function (msg) {
    //             $(commentForm).find('textarea').val('');
    //             notyalert(msg.type, msg.body);
    //             location.reload();
    //         },
    //         error: function () {
    //             notyalert("error", "An Error Occurred");

    //         }
    //     })
    // });

    // // //Refreshing Comments
    // // function refreshComment() {
    // //     var url = $(location).attr('pathname');
    // //     if (url.indexOf("timeline") > -1) {
    // //         var oldComment = $(".comments-list:first").html();
    // //         $.ajax({
    // //             type: 'GET',
    // //             url: '',
    // //             dataType: 'html',
    // //             success: function (data) {
    // //                 var newComment = $(data).find(".comments-list:first").html();
    // //                 console.log("OldChat" + oldComment);
    // //                 console.log(newComment);
    // //                 if ($.trim(oldComment) != $.trim(newComment)) {
    // //                     $(".comments-list:first").html(newComment);
    // //                 }
    // //                 setTimeout(refreshComment, 5 * 1000);
    // //             }
    // //         })
    // //     }
    // // }
    // // refreshComment();

    // // Replying to Chat
    // $('.submit-message').click(function (e) {
    //     e.preventDefault();
    //     var messageForm = $(this).closest('form');
    //     $.ajax({
    //         type: 'POST',
    //         url: '/addmessage',
    //         dataType: 'JSON',
    //         data: messageForm.serialize(),
    //         success: function (msg) {
    //             $(messageForm).find('textarea').val('');
    //         },
    //         error: function () {
    //             notyalert("error", "An Error Occurred");

    //         }
    //     })
    // });

    // //Refreshing Chat
    // function refreshChat() {
    //     var url = $(location).attr('pathname');
    //     if (url.indexOf("messages") > -1) {
    //         var previousChat = $('.milanMessageBox').html();
    //         $.ajax({
    //             type: 'GET',
    //             url: '',
    //             dataType: 'html',
    //             success: function (data) {
    //                 var newChat = $(data).find(".milanMessageBox").html();
    //                 console.log("OldChat" + previousChat);
    //                 console.log(newChat);
    //                 if ($.trim(previousChat) != $.trim(newChat)) {
    //                     $(".milanMessageBox").html(newChat);
    //                     $(".mCustomScrollbar").scrollTop($(".mCustomScrollbar").prop("scrollHeight")*100);
    //                     $(".mCustomScrollbar").perfectScrollbar('update');
    //                 }
    //             }
    //         })
    //         setTimeout(refreshChat, 5 * 1000);
    //     }
    // }
    // refreshChat();
    // $(".mCustomScrollbar").scrollTop($(".mCustomScrollbar").prop("scrollHeight")*100);
    // $(".mCustomScrollbar").perfectScrollbar('update');

    // // Changing Password

    // $('.btnChangePassword').click(function (e) {
    //     var frm = $(this).closest('.changePasswordForm');
    //     e.preventDefault();
    //     $.ajax({
    //         type: 'POST',
    //         url: '/changepassword',
    //         dataType: 'JSON',
    //         data: frm.closest('.changePasswordForm').serialize(),
    //         success: function (msg) {
    //             notyalert(msg.type, msg.body);
    //             resetFormElements(frm);
    //         },
    //         error: function () {
    //             notyalert("error", "An Error Occurred");
    //             resetFormElements(frm);
    //         }
    //     })
    // });

    $('#summernote').summernote({ toolbar: [
        // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
      ]});
    $('#selector').select2();
    // // Attahcing  Cover photo uploader
    $("#addfile").click(function(e) {
        e.preventDefault();
        $(this).closest('form').find('input[type="file"]').trigger('click');
    });
    $("#addPhotoInput").click(function(e) {
        e.preventDefault();
        $(this).closest('form').find('input[type="file"]').trigger('click');
    });

    // $(".header-form").find('input[type="file"]').change(function (e) {
    //     $.ajax({
    //         url: 'http://milan.pk/returnheaderimage',
    //         type: 'POST',
    //         data: new FormData($(this).closest("form")[0]),
    //         dataType: 'JSON',
    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //         error: function (msg) {
    //             notyalert("error", "An Error Occurred In Uploading Header Cover !");
    //         },
    //         success: function (msg) {
    //             if (msg.type == "success") {
    //                 $(".selectedfile").attr("src", msg.body);
    //                 $(".selectedfile").removeClass('d-none').addClass('img-thumbnail img-responsive');
    //                 $(".crop-upload-header").removeClass('d-none');
    //                 $(".selectedfile").imgAreaSelect({
    //                     imageWidth: 768,
    //                     maxWidth: 1920,
    //                     maxHeight: 640,
    //                     aspectRatio: '27:9',
    //                     onSelectEnd: function (img, selection) {
    //                         $('input[name="x1"]').val(selection.x1);
    //                         $('input[name="y1"]').val(selection.y1);
    //                         $('input[name="w"]').val(selection.width);
    //                         $('input[name="h"]').val(selection.height);

    //                     }
    //                 })
    //             } else {
    //                 notyalert(msg.type, msg.body);
    //             }
    //         }
    //     });
    // });

    // $('.cropuploadlabel').click(function () {
    //     $.ajax({
    //         url: 'http://milan.pk/setheaderimage',
    //         type: 'POST',
    //         data: $('.header-crop').serialize(),
    //         dataType: 'JSON',
    //         error: function (msg) {
    //             notyalert("error", "An Error Occurred In Saving Header Cover !");
    //         },
    //         success: function (msg) {
    //             notyalert(msg.type, msg.body);
    //             location.reload();
    //         }
    //     });
    // });

    // // Profile Upload

    // var $searchSelectize = $(".profile-form").find('input[type="file"]').change(function () {
    //     $.ajax({
    //         url: 'http://milan.pk/returnprofileimage',
    //         type: 'POST',
    //         data: new FormData($(".profile-form")[0]),
    //         dataType: 'JSON',
    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //         error: function (msg) {
    //             notyalert("error", "An Error Occurred In Uploading Profile Pic !");
    //         },
    //         success: function (msg) {
    //             if (msg.type == "success") {
    //                 $(".selectedfileprofile").attr("src", msg.body);
    //                 $(".selectedfileprofile").removeClass('d-none').addClass('img-thumbnail img-responsive');
    //                 $(".crop-upload-profile").removeClass('d-none');
    //                 $(".selectedfileprofile").imgAreaSelect({
    //                     imgWidth: 120,
    //                     maxWidth: 400,
    //                     maxHeight: 400,
    //                     aspectRatio: '1:1',
    //                     onSelectEnd: function (img, selection) {
    //                         $('input[name="x1"]').val(selection.x1);
    //                         $('input[name="y1"]').val(selection.y1);
    //                         $('input[name="w"]').val(selection.width);
    //                         $('input[name="h"]').val(selection.height);
    //                     }
    //                 })
    //             } else {
    //                 notyalert(msg.type, msg.body);
    //             }
    //         }
    //     });
    // });

    // $('.cropuploadprofilelabel').click(function () {
    //     $.ajax({
    //         url: 'http://milan.pk/setprofileimage',
    //         type: 'POST',
    //         data: $('.profile-crop').serialize(),
    //         dataType: 'JSON',
    //         error: function (msg) {
    //             notyalert("error", "An Error Occurred In Saving Header Cover !");
    //         },
    //         success: function (msg) {
    //             notyalert(msg.type, msg.body);
    //             location.reload();

    //         }
    //     });
    // });

    // // User Search
    // $('.js-user-search').selectize({
    //     valueField: 'username',
    //     labelField: 'fullname',
    //     searchField: ['username'],
    //     highlight: true,
    //     closeAfterSelect: false,
    //     hideSelected: true,
    //     mode: 'single',
    //     create: true,
    //     render: {
    //         option_create: function (data, escape) {
    //             return '<div class="create">Search for <strong>' + escape(data.input) + '... </strong>&hellip;</div>';
    //         },
    //         option: function (item, escape) {
    //             return '<div class="inline-items">' +
    //                 (item.profilepic ? '<div class="author-thumb"><img height="42" width="42" src="/app/data/images/users/' + escape(item.profilepic) + '.jpg" alt="avatar"></div>' : '') +
    //                 '<div class="notification-event">' +
    //                 (item.fullname ? '<span class="h6 notification-friend"></a>' + escape(item.fullname) + '</span>' : '') +
    //                 (item.city ? '<span class="chat-message-item">' + escape(item.city) + ',' + escape(item.country) + '</span>' : '') +
    //                 '</div>' +
    //                 (item.createdat ? '<span class="notification-icon">' + escape(item.createdat) + '</span>' : '') +
    //                 '</div>';
    //         },
    //     },
    //     load: function (query, callback) {
    //         if (!query.length) return callback();
    //         $.ajax({
    //             url: 'http://milan.pk/searchapi/' + encodeURIComponent(query),
    //             type: 'GET',
    //             dataType: "json",
    //             error: function () {
    //                 callback();
    //             },
    //             success: function (res) {
    //                 callback(res.users.slice(0, 10));
    //             }
    //         });
    //     },
    //     onDropdownOpen: function () {
    //         $('.selectize-dropdown-content').on('mousedown', 'div[data-selectable]', function (event) {
    //             var myform = $(this).closest("form");
    //             setTimeout(function () {
    //                 myform.submit();
    //             }, 1);
    //         });
    //     }
    // });


    function resetFormElements(frm) {
        $(frm).find(':input').each(function () {
            switch (this.type) {
                case 'password':
                case 'select-multiple':
                case 'select-one':
                case 'text':
                case 'textarea':
                    $(this).val('');
                    break;
                case 'checkbox':
                case 'radio':
                    this.checked = false;
            }
        });
    }

    function notyalert(typ, txt) {
        return new Noty({
            theme: 'metroui',
            type: typ,
            text: txt,
            timeout: 3000,
            progressBar: true,
            layout: 'bottomLeft',
            closeWith: ['click', 'button'],
            animation: {
                open: function (promise) {
                    var n = this;
                    new Bounce()
                        .translate({
                            from: {
                                x: 450,
                                y: 0
                            },
                            to: {
                                x: 0,
                                y: 0
                            },
                            easing: "bounce",
                            duration: 1000,
                            bounces: 4,
                            stiffness: 3
                        })
                        .scale({
                            from: {
                                x: 1.2,
                                y: 1
                            },
                            to: {
                                x: 1,
                                y: 1
                            },
                            easing: "bounce",
                            duration: 1000,
                            delay: 100,
                            bounces: 4,
                            stiffness: 1
                        })
                        .scale({
                            from: {
                                x: 1,
                                y: 1.2
                            },
                            to: {
                                x: 1,
                                y: 1
                            },
                            easing: "bounce",
                            duration: 1000,
                            delay: 100,
                            bounces: 6,
                            stiffness: 1
                        })
                        .applyTo(n.barDom, {
                            onComplete: function () {
                                promise(function (resolve) {
                                    resolve();
                                })
                            }
                        });
                },
                close: function (promise) {
                    var n = this;
                    new Bounce()
                        .translate({
                            from: {
                                x: 0,
                                y: 0
                            },
                            to: {
                                x: 450,
                                y: 0
                            },
                            easing: "bounce",
                            duration: 500,
                            bounces: 4,
                            stiffness: 1
                        })
                        .applyTo(n.barDom, {
                            onComplete: function () {
                                promise(function (resolve) {
                                    resolve();
                                })
                            }
                        });
                }
            }
        }).show();
    }

});