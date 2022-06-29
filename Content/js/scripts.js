const validateEmail = (email) => {
  return String(email)
    .toLowerCase()
    .match(
      /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
};
 $(document).ready(function (){
    $("#login").on('click', function() {
      var username = $("#username").val();
      var password = $("#password").val();
      if (username == "" || password == "")
        alert('Please check your inputs');
      $.ajax(
        {
          method: 'POST',
          url:'/dailyvir/users/login',
          data:{
            login: 1,
            usernamePHP: username,
            passwordPHP: password
          },
          success: function (response){
            if(response)
              window.location.href = "/dailyvir/";
          },
          dataType: 'text'
        }
      );
    });
    $("#logout").on('click', function() {
      $.ajax(
        {
          method: 'POST',
          url:'/dailyvir/users/view',
          data:{
            logout: 1,
          },
          success: function (response){
            if(response)
              window.location.href = "/dailyvir/";
          },
          dataType: 'text'
        }
      );
    });
    $("#favourite").on('click', function() {
      var v = document.getElementById('id_video');
      var id_video = v.getAttribute('class');
      var t = document.getElementById('title');
      var title = t.getAttribute('class');
      $.ajax(
        {
          method: 'POST',
          url:'/dailyvir/videos/view/'+id_video,
          data:{
            favourite: 1,
            id_videoPHP: id_video,
            titlePHP: title
          },
          success: function (response){
            if(response)
              window.location.href = "/dailyvir/videos/view/"+id_video;
          },
          dataType: 'text'
        }
      );
    });
    $("#unfavourite").on('click', function() {
      var v = document.getElementById('id_video');
      var id_video = v.getAttribute('class');
      $.ajax(
        {
          method: 'POST',
          url:'/dailyvir/videos/view/'+id_video,
          data:{
            unfavourite: 1,
            id_videoPHP: id_video
          },
          success: function (response){
            if(response)
              window.location.href = "/dailyvir/videos/view/"+id_video;
          },
          dataType: 'text'
        }
      );
    });
    $("#uploadUrl").on('click', function() {
      var url = $("#url").val();
      var titleUrl = $("#titleUrl").val();
      var descriptionUrl = $("#descriptionUrl").val();
      var categoryUrl = $("#categoryUrl").val();
      $.ajax(
        {
          url:'/dailyvir/videos/create',
          method: 'POST',
          data:{
            create: 1,
            urlPHP: url,
            titleUrlPHP: titleUrl,
            descriptionUrlPHP: descriptionUrl,
            categoryUrlPHP: categoryUrl
          },
          success: function (response){
            if(response)
              window.location.href = "/dailyvir/users/studio";
          },
          dataType: 'text'
        }
      );
    });
    $("#signup").on('click', function() {
        var username = $("#username").val();
        var password = $("#password").val();
        var email = $("#email").val();
        var country = $("#country").val();
        var gender = $("#gender").val();

        if (username == "" || password == "" || email == "" || country == "" || gender == "")
          alert('Please check your inputs');
        else
        {
          if (!validateEmail(email)){
            alert("Invalid email format");
          }
          else
          {
            console.log(username);
            $.ajax(
              {
                url:'/dailyvir/users/signup',
                method: 'POST',
                data:{
                  signup: 1,
                  usernamePHP: username,
                  passwordPHP: password,
                  emailPHP: email,
                  countryPHP: country,
                  genderPHP: gender
                },
                success: function (response){
                  if(response)
                    window.location.href = "/dailyvir/";
                },
                dataType: 'text'
              }
            );
          }
        }
      });
      $("#export").on('click', function() {
        $.ajax(
          {
            url:'/dailyvir/users/view',
            method: 'POST',
            data:{
              export: 1,
            }
          }
        );
      });
      $("#commentPost").on('click', function() {
        var comment = $("#commentText").val();
        var v = document.getElementById('id_video');
        var id_video = v.getAttribute('class');
        $.ajax(
          {
            url:'/dailyvir/videos/view/'+id_video,
            method: 'POST',
            data:{
              comment: 1,
              commentPHP: comment,
              id_videoPHP: id_video
            },
            success: function (response){
              if(response)
                window.location.href = "/dailyvir/videos/view/".concat("",id_video);
            },
            dataType: 'text'
          }
        );
      });
      $(".deletePost").on('click', function() {
        var v = document.getElementById('id_video');
        var id_video = v.getAttribute('class');
        var id_comment = this.getAttribute('id');
        $.ajax(
          {
            url:'/dailyvir/videos/view/'+id_video,
            method: 'POST',
            data:{
              remove: 1,
              id_commentPHP: id_comment
            },
            success: function (response){
              if(response)
                window.location.href = "/dailyvir/videos/view/".concat("",id_video);
            },
            dataType: 'text'
          }
        );
      });
      $("#deleteVideo").on('click', function() {
        var v = document.getElementById('id_video');
        var id_video = v.getAttribute('class');
        $.ajax(
          {
            url:'/dailyvir/videos/view/'+id_video,
            method: 'POST',
            data:{
              delete: 1,
              id_videoPHP: id_video
            },
            success: function (response){
              if(response)
                window.location.href = "/dailyvir/";
            },
            dataType: 'text'
          }
        );
      });
      $("#changeEmail").on('click', function() {
        var newEmail = $("#newEmail").val();
        $.ajax(
          {
            url:'/dailyvir/users/view',
            method: 'POST',
            data:{
              changeEmail: 1,
              newEmailPHP: newEmail
            }
          }
        );
      });
      $("#changePassword").on('click', function() {
        var newPassword = $("#newPassword").val();
        $.ajax(
          {
            url:'/dailyvir/users/view',
            method: 'POST',
            data:{
              changePassword: 1,
              newPasswordPHP: newPassword
            }
          }
        );
      });
      $("#searchSubmit").on('click', function() {
        var searchText = $("#searchText").val();
        var result = searchText.replace(/ /g,"777777");
        console.log(result);
        window.location.href = "/dailyvir/videos/search/"+result;
      });
  });
  const acc = document.getElementsByClassName("accordion");

  acc[0].addEventListener("click", function () {
      this.classList.toggle("active");
      const panel = this.nextElementSibling;
      if (panel.style.display === "grid") {
          panel.style.display = "none";
      } else {
          panel.style.display = "grid";
      }
  });

  acc[1].addEventListener("click", function () {
      this.classList.toggle("active");
      const panel = this.nextElementSibling;
      if (panel.style.display === "block") {
          panel.style.display = "none";
      } else {
          panel.style.display = "block";
      }
  });