<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

  @yield('css')
 
</head>
<body>
   @yield('content')
  <script src="{{ asset('frontend/js/jquery-1.12.4.min.js') }}"></script>
  <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
  <script>

    setTimeout(function() {
        $('#alert').fadeOut('fast');
    }, 6000);


    // <style>
    //   .btn-left{
    //     position: absolute;
    //     transition: .5s all;
    //     left: 0px;
    //     right: unset;
    //     margin-bottom: 30px;
    //   }

    //   .btn-right{
    //     position: absolute;
    //     transition: .5s all;
    //     right: 0px;
    //     left: unset;
    //     margin-bottom: 30px;
    //   }

    //   </style>
    // const button = document.getElementById('validatorBtn');
    // button.addEventListener('mouseover', function () {
    //   if(!isFormValid()){
    //     if (button.classList.contains('btn-right')) {
    //         button.classList.remove('btn-right');
    //         button.classList.add('btn-left');
    //       }else if(button.classList.contains('btn-left')){
    //         button.classList.remove('btn-left');
    //         button.classList.add('btn-right');
    //       }else{
    //         button.classList.add('btn-left');
    //       }
    //     }
    //   });

    // function isFormValid() {
    //       let isValid = true;
    //       $('#registerForm').find('input').each(function() {
    //           if ($(this).val() === '') {
    //               isValid = false;
    //               return false; 
    //           }
    //       });
    //       return isValid;
    //   }


    const button = document.getElementById('validatorBtn');

      button.addEventListener('mouseover', function () {
        const form = document.querySelector('form'); 
        if (!isFormValid(form)) {
          button.disabled = true;
        }else{
          button.disabled = false;
        }
      });
      function isFormValid(formElement) {
        let isValid = true;
        $(formElement).find('input').each(function () {
          if ($(this).val() === '') {
            isValid = false;
            return false;
          }
        });

        return isValid;
    }

  </script>
  @yield('scripts');
</body>
</html>
