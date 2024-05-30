




$(document).ready(function () {

    document.getElementById('logout_btn').addEventListener('click', function() {
        Swal.fire({
            title: 'Alert!',
            text: 'Are You Sure Want to Logout',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Okay'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "logout";
            } 
          });

    });






});
